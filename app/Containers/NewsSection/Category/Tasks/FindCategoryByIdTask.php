<?php

namespace App\Containers\NewsSection\Category\Tasks;

use App\Containers\NewsSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\NewsSection\Category\Models\Category;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected readonly CategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Category
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
