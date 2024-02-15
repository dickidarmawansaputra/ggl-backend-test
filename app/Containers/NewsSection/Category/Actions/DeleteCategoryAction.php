<?php

namespace App\Containers\NewsSection\Category\Actions;

use App\Containers\NewsSection\Category\Tasks\DeleteCategoryTask;
use App\Containers\NewsSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCategoryAction extends ParentAction
{
    public function __construct(
        private readonly DeleteCategoryTask $deleteCategoryTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCategoryRequest $request): int
    {
        return $this->deleteCategoryTask->run($request->id);
    }
}
