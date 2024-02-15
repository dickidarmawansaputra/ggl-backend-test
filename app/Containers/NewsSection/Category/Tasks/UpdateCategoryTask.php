<?php

namespace App\Containers\NewsSection\Category\Tasks;

use App\Containers\NewsSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\NewsSection\Category\Models\Category;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCategoryTask extends ParentTask
{
    public function __construct(
        protected readonly CategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Category
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
