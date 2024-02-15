<?php

namespace App\Containers\NewsSection\News\Tasks;

use App\Containers\NewsSection\News\Data\Repositories\NewsRepository;
use App\Containers\NewsSection\News\Models\News;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateNewsTask extends ParentTask
{
    public function __construct(
        protected readonly NewsRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): News
    {
        try {
            return $this->repository->createNews($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
