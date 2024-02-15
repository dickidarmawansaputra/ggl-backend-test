<?php

namespace App\Containers\NewsSection\News\Actions;

use App\Containers\NewsSection\News\Models\News;
use App\Containers\NewsSection\News\Tasks\FindNewsByIdTask;
use App\Containers\NewsSection\News\UI\API\Requests\FindNewsByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindNewsByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindNewsByIdTask $findNewsByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindNewsByIdRequest $request): News
    {
        return $this->findNewsByIdTask->run($request->id);
    }
}
