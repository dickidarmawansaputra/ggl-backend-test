<?php

namespace App\Containers\NewsSection\Category\Actions;

use App\Containers\NewsSection\Category\Models\Category;
use App\Containers\NewsSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\NewsSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCategoryByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindCategoryByIdTask $findCategoryByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindCategoryByIdRequest $request): Category
    {
        return $this->findCategoryByIdTask->run($request->id);
    }
}
