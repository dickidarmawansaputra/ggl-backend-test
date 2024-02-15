<?php

namespace App\Containers\NewsSection\News\UI\API\Tests\Functional;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Containers\NewsSection\News\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\News\Data\Factories\NewsFactory;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;
use Vinkla\Hashids\Facades\Hashids;

/**
 * @group news
 * @group api
 */
class CreateNewsTest extends ApiTestCase
{
    protected string $endpoint = 'post@v1/news';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $news = NewsFactory::new()->createOne();
        $category = CategoryFactory::new()->createOne();
        $news['title'] = Str::uuid();
        $news['categories'] = Hashids::encode($category->id);
        DB::table('category_news')->insert(['news_id' => $news->id, 'category_id' => $category->id]);

        $response = $this->makeCall($news->toArray());

        $response->assertCreated();
    }
}
