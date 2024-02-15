<?php

namespace App\Containers\NewsSection\Category\Actions;

use Illuminate\Support\Str;
use Apiato\Core\Exceptions\IncorrectIdException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\NewsSection\Category\Models\Category;
use App\Containers\NewsSection\Category\Tasks\CreateCategoryTask;
use App\Containers\NewsSection\Category\UI\API\Requests\CreateCategoryRequest;

class CreateCategoryAction extends ParentAction
{
    public function __construct(
        private readonly CreateCategoryTask $createCategoryTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCategoryRequest $request): Category
    {
        $data = $request->sanitizeInput([
            'name',
            'slug' => Str::slug($request->name),
        ]);

        return $this->createCategoryTask->run($data);
    }
}
