<?php

namespace App\Containers\NewsSection\News\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\News\Actions\FindNewsByIdAction;
use App\Containers\NewsSection\News\UI\API\Requests\FindNewsByIdRequest;
use App\Containers\NewsSection\News\UI\API\Transformers\NewsTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindNewsByIdController extends ApiController
{
    public function __construct(
        private readonly FindNewsByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindNewsByIdRequest $request): array
    {
        $news = $this->action->run($request);

        return $this->transform($news, NewsTransformer::class);
    }
}
