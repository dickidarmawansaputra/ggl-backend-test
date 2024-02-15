<?php

namespace App\Containers\NewsSection\News\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\NewsSection\News\Data\Repositories\NewsRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNewsTask extends ParentTask
{
    public function __construct(
        protected readonly NewsRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(array $data): mixed
    {
        return $this->repository->listNews($data);
    }
}
