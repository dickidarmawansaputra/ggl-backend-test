<?php

namespace App\Containers\NewsSection\News\UI\API\Tests\Functional;

use App\Containers\NewsSection\News\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\News\Data\Factories\NewsFactory;

/**
 * @group news
 * @group api
 */
class FindNewsByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/news/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $response = $this->injectId(NewsFactory::new()->createOne()->id)->makeCall();

        $response->assertOk();
    }
}
