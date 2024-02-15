<?php

namespace App\Containers\NewsSection\Category\Actions;

use Illuminate\Support\Str;
use App\Ship\Exceptions\NotFoundException;
use Apiato\Core\Exceptions\IncorrectIdException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Containers\NewsSection\Category\Models\Category;
use App\Containers\NewsSection\Category\Tasks\UpdateCategoryTask;
use App\Containers\NewsSection\Category\UI\API\Requests\UpdateCategoryRequest;

class UpdateCategoryAction extends ParentAction
{
    public function __construct(
        private readonly UpdateCategoryTask $updateCategoryTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCategoryRequest $request): Category
    {
        $data = $request->sanitizeInput([
            'name',
            'slug' => Str::slug($request->name),
        ]);

        return $this->updateCategoryTask->run($data, $request->id);
    }
}
