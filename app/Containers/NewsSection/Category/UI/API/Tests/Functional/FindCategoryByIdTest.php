<?php

namespace App\Containers\NewsSection\Category\UI\API\Tests\Functional;

use App\Containers\NewsSection\Category\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

/**
 * @group category
 * @group api
 */
class FindCategoryByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/categories/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $response = $this->injectId(CategoryFactory::new()->createOne()->id)->makeCall();

        $response->assertOk();
    }
}
