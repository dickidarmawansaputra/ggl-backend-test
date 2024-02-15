<?php

namespace App\Containers\NewsSection\News\Actions;

use App\Containers\NewsSection\News\Tasks\DeleteNewsTask;
use App\Containers\NewsSection\News\UI\API\Requests\DeleteNewsRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteNewsAction extends ParentAction
{
    public function __construct(
        private readonly DeleteNewsTask $deleteNewsTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteNewsRequest $request): int
    {
        return $this->deleteNewsTask->run($request->id);
    }
}
