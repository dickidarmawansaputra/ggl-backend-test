<?php

namespace App\Containers\NewsSection\Category\UI\API\Tests\Functional;

use Illuminate\Testing\Fluent\AssertableJson;
use App\Containers\NewsSection\Category\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

/**
 * @group category
 * @group api
 */
class ListCategoriesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/categories';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        CategoryFactory::new()->count(3)->create();
        $response = $this->makeCall();

        $response->assertOk();
        $response->assertJson(
            static fn (AssertableJson $json): AssertableJson => $json->has('data', 3)
                ->etc(),
        );
    }
}
