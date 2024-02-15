<?php

namespace App\Containers\NewsSection\News\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\News\Actions\CreateNewsAction;
use App\Containers\NewsSection\News\UI\API\Requests\CreateNewsRequest;
use App\Containers\NewsSection\News\UI\API\Transformers\NewsTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateNewsController extends ApiController
{
    public function __construct(
        private readonly CreateNewsAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateNewsRequest $request): JsonResponse
    {
        $news = $this->action->run($request);

        return $this->created($this->transform($news, NewsTransformer::class));
    }
}
