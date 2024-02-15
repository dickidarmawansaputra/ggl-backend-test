<?php

namespace App\Containers\NewsSection\Category\UI\API\Tests\Functional;

use Illuminate\Support\Str;
use App\Containers\NewsSection\Category\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

/**
 * @group category
 * @group api
 */
class CreateCategoryTest extends ApiTestCase
{
    protected string $endpoint = 'post@v1/categories';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $category = CategoryFactory::new()->createOne()->toArray();
        $category['name'] = Str::uuid();

        $response = $this->makeCall($category);

        $response->assertCreated();
    }
}
