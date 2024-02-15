<?php

namespace App\Containers\NewsSection\Category\UI\API\Tests\Functional;

use App\Containers\NewsSection\Category\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

/**
 * @group category
 * @group api
 */
class UpdateCategoryTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/categories/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $category = CategoryFactory::new()->createOne();

        $response = $this->injectId($category->id)->makeCall($category->toArray());

        $response->assertOk();
    }
}
