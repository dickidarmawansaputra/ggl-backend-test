<?php

namespace App\Containers\NewsSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\NewsSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Containers\NewsSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCategoryByIdController extends ApiController
{
    public function __construct(
        private readonly FindCategoryByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindCategoryByIdRequest $request): array
    {
        $category = $this->action->run($request);

        return $this->transform($category, CategoryTransformer::class);
    }
}
