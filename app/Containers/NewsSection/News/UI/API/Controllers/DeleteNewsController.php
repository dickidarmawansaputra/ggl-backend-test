<?php

namespace App\Containers\NewsSection\News\UI\API\Controllers;

use App\Containers\NewsSection\News\Actions\DeleteNewsAction;
use App\Containers\NewsSection\News\UI\API\Requests\DeleteNewsRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteNewsController extends ApiController
{
    public function __construct(
        private readonly DeleteNewsAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteNewsRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
