<?php

namespace App\Containers\NewsSection\News\Data\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Containers\NewsSection\News\Models\News;
use App\Containers\NewsSection\News\Enums\Status;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class NewsRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    public function createNews(array $data): News
    {
        $news = new News();
        $news->title = $data['title'];
        $news->slug = $data['slug'];
        $news->user_id = $data['user_id'];
        $news->thumbnail = $data['thumbnail'];
        $news->content = $data['content'];
        $news->publish_at = $data['publish_at'];
        $news->save();

        $news->categories()->sync($data['categories']);

        return $news;
    }

    public function findNewsById($id): News
    {
        $news = News::where('id', $id)->first();
        if (!$news->views) {
            DB::table('news_views')->insert(['news_id' => $id, 'views' => 1]);
        }

        DB::table('news_views')->where('news_id', $id)->increment('views');

        return $news;
    }

    public function updateNewsById(array $data, $id): News
    {
        $news = tap(News::where('id', $id))->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'user_id' => $data['user_id'],
            'thumbnail' => $data['thumbnail'],
            'content' => $data['content'],
            'publish_at' => $data['publish_at'],
        ])->first();

        $news->categories()->sync($data['categories']);

        return $news;
    }

    public function listNews(array $data): LengthAwarePaginator
    {
        $news = News::query()
            ->where('status', Status::PUBLISH)
            ->whereNotNull('publish_at')
            ->with('author')
            ->whereHas('categories', function (Builder $query) use ($data) {
                if (isset($data['filter'])) {
                    $query->whereIn('id', explode(',', $data['filter']));
                }
            })
            ->with('categories')
            ->with('views')
            ->select('id', 'title', 'slug', 'user_id', 'thumbnail', 'content', 'publish_at');

        if (isset($data['sortedByViews'])) {
            $news->join('news_views', 'news.id', 'news_views.news_id')->orderBy('news_views.views', 'desc');
        }

        if (isset($data['sortedByPublication'])) {
            $news->orderBY('publish_at', $data['sortedByPublication']);
        }

        return $news->paginate();
    }
}
