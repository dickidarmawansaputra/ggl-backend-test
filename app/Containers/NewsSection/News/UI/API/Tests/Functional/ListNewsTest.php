<?php

namespace App\Containers\NewsSection\News\UI\API\Tests\Functional;

use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Containers\NewsSection\News\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\News\Data\Factories\NewsFactory;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

/**
 * @group news
 * @group api
 */
class ListNewsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/news';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $news = NewsFactory::new()->count(3)->create();
        $categories = CategoryFactory::new()->count(3)->create();
        foreach ($news->pluck('id') as $newsId) {
            foreach ($categories->pluck('id') as $categoryId) {
                DB::table('category_news')->insert(['news_id' => $newsId, 'category_id' => $categoryId]);
            }
        }

        $response = $this->makeCall();
        $response->assertOk();
        $response->assertJson(
            static fn (AssertableJson $json): AssertableJson => $json->has('data', 3)
                ->etc(),
        );
    }
}
