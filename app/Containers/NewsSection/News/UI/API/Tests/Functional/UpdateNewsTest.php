<?php

namespace App\Containers\NewsSection\News\UI\API\Tests\Functional;

use Vinkla\Hashids\Facades\Hashids;
use App\Containers\NewsSection\News\UI\API\Tests\ApiTestCase;
use App\Containers\NewsSection\News\Data\Factories\NewsFactory;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

/**
 * @group news
 * @group api
 */
class UpdateNewsTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/news/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function test(): void
    {
        $this->getTestingUser();

        $news = NewsFactory::new()->createOne();
        $category = CategoryFactory::new()->createOne();
        $news['categories'] = Hashids::encode($category->id);

        $response = $this->injectId($news->id)->makeCall($news->toArray());

        $response->assertOk();
    }
}
