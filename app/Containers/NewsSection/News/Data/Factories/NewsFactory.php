<?php

namespace App\Containers\NewsSection\News\Data\Factories;

use App\Containers\NewsSection\News\Models\News;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of NewsFactory
 *
 * @extends ParentFactory<TModel>
 */
class NewsFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = News::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
