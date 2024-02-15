<?php

namespace App\Containers\NewsSection\Category\UI\API\Controllers;

use App\Containers\NewsSection\Category\Actions\DeleteCategoryAction;
use App\Containers\NewsSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCategoryController extends ApiController
{
    public function __construct(
        private readonly DeleteCategoryAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteCategoryRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
