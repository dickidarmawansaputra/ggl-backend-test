<?php

namespace App\Containers\NewsSection\News\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\NewsSection\News\Tasks\ListNewsTask;
use App\Containers\NewsSection\News\UI\API\Requests\ListNewsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNewsAction extends ParentAction
{
    public function __construct(
        private readonly ListNewsTask $listNewsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNewsRequest $request): mixed
    {
        $data = $request->sanitizeInput([
            'filter',
            'sortedByViews',
            'sortedByPublication',
        ]);

        return $this->listNewsTask->run($data);
    }
}
