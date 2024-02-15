<?php

namespace App\Containers\NewsSection\News\Tasks;

use App\Containers\NewsSection\News\Data\Repositories\NewsRepository;
use App\Containers\NewsSection\News\Models\News;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindNewsByIdTask extends ParentTask
{
    public function __construct(
        protected readonly NewsRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): News
    {
        try {
            return $this->repository->findNewsById($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
