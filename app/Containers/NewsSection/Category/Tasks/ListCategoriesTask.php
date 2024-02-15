<?php

namespace App\Containers\NewsSection\Category\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\NewsSection\Category\Data\Repositories\CategoryRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCategoriesTask extends ParentTask
{
    public function __construct(
        protected readonly CategoryRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
