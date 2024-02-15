<?php

namespace App\Containers\NewsSection\News\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\NewsSection\News\Actions\ListNewsAction;
use App\Containers\NewsSection\News\UI\API\Requests\ListNewsRequest;
use App\Containers\NewsSection\News\UI\API\Transformers\NewsTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNewsController extends ApiController
{
    public function __construct(
        private readonly ListNewsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListNewsRequest $request): array
    {
        $news = $this->action->run($request);

        return $this->transform($news, NewsTransformer::class);
    }
}
