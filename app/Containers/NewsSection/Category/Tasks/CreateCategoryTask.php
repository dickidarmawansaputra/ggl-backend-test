<?php

namespace App\Containers\NewsSection\Category\Tasks;

use App\Containers\NewsSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\NewsSection\Category\Models\Category;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateCategoryTask extends ParentTask
{
    public function __construct(
        protected readonly CategoryRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Category
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
