<?php

namespace App\Containers\NewsSection\News\Actions;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;
use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\NewsSection\News\Models\News;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\NewsSection\News\Tasks\CreateNewsTask;
use App\Containers\NewsSection\News\UI\API\Requests\CreateNewsRequest;

class CreateNewsAction extends ParentAction
{
    public function __construct(
        private readonly CreateNewsTask $createNewsTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateNewsRequest $request): News
    {
        $data = $request->sanitizeInput([
            'title',
            'slug' => Str::slug($request->title),
            'categories',
            'user_id',
            'thumbnail',
            'content',
            'publish_at',
        ]);

        if ($data['publish_at']) {
            $data['publish_at'] = Carbon::parse($data['publish_at'])->format('Y-m-d');
        }

        foreach (explode(',', $data['categories']) as $key => $hashId) {
            $categoriesIdDecoded[$key] = Hashids::decode($hashId);
        }

        $data['categories'] = Arr::collapse($categoriesIdDecoded);

        return $this->createNewsTask->run($data);
    }
}
