<?php

namespace App\Containers\NewsSection\News\UI\API\Tests\Functional;

use App\Containers\NewsSection\News\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\News\Data\Factories\NewsFactory;

/**
 * @group news
 * @group api
 */
class DeleteNewsTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/news/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $response = $this->injectId(NewsFactory::new()->createOne()->id)->makeCall();

        $response->assertNoContent();
    }
}
