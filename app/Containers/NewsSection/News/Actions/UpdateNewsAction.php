<?php

namespace App\Containers\NewsSection\News\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;
use App\Ship\Exceptions\NotFoundException;
use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\NewsSection\News\Models\News;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Containers\NewsSection\News\Tasks\UpdateNewsTask;
use App\Containers\NewsSection\News\UI\API\Requests\UpdateNewsRequest;

class UpdateNewsAction extends ParentAction
{
    public function __construct(
        private readonly UpdateNewsTask $updateNewsTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateNewsRequest $request): News
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

        foreach (explode(',', $data['categories']) as $key => $hashId) {
            $categoriesIdDecoded[$key] = Hashids::decode($hashId);
        }

        $data['categories'] = Arr::collapse($categoriesIdDecoded);

        return $this->updateNewsTask->run($data, $request->id);
    }
}
