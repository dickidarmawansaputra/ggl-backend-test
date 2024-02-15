<?php

namespace App\Containers\NewsSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\Category\Actions\ListCategoriesAction;
use App\Containers\NewsSection\Category\UI\API\Requests\ListCategoriesRequest;
use App\Containers\NewsSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCategoriesController extends ApiController
{
    public function __construct(
        private readonly ListCategoriesAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListCategoriesRequest $request): array
    {
        $categories = $this->action->run($request);

        return $this->transform($categories, CategoryTransformer::class);
    }
}
