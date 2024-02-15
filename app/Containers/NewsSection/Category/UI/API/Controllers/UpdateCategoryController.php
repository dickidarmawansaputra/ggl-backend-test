<?php

namespace App\Containers\NewsSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\Category\Actions\UpdateCategoryAction;
use App\Containers\NewsSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Containers\NewsSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCategoryController extends ApiController
{
    public function __construct(
        private readonly UpdateCategoryAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateCategoryRequest $request): array
    {
        $category = $this->action->run($request);

        return $this->transform($category, CategoryTransformer::class);
    }
}
