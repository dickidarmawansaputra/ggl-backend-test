<?php

namespace App\Containers\NewsSection\News\Tasks;

use App\Containers\NewsSection\News\Data\Repositories\NewsRepository;
use App\Containers\NewsSection\News\Models\News;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateNewsTask extends ParentTask
{
    public function __construct(
        protected readonly NewsRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): News
    {
        try {
            return $this->repository->updateNewsById($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
