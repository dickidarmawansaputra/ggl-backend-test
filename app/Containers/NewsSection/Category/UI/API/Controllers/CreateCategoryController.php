<?php

namespace App\Containers\NewsSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\Category\Actions\CreateCategoryAction;
use App\Containers\NewsSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Containers\NewsSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCategoryController extends ApiController
{
    public function __construct(
        private readonly CreateCategoryAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateCategoryRequest $request): JsonResponse
    {
        $category = $this->action->run($request);

        return $this->created($this->transform($category, CategoryTransformer::class));
    }
}
