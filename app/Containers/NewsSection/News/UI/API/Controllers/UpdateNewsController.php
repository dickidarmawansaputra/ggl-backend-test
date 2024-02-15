<?php

namespace App\Containers\NewsSection\News\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\News\Actions\UpdateNewsAction;
use App\Containers\NewsSection\News\UI\API\Requests\UpdateNewsRequest;
use App\Containers\NewsSection\News\UI\API\Transformers\NewsTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateNewsController extends ApiController
{
    public function __construct(
        private readonly UpdateNewsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateNewsRequest $request): array
    {
        $news = $this->action->run($request);

        return $this->transform($news, NewsTransformer::class);
    }
}
