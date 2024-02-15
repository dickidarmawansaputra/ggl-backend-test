<?php

namespace App\Containers\NewsSection\Category\Data\Factories;

use Illuminate\Support\Str;
use App\Containers\NewsSection\Category\Models\Category;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of CategoryFactory
 *
 * @extends ParentFactory<TModel>
 */
class CategoryFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Category::class;

    public function definition(): array
    {
        $category = $this->faker->name();
        return [
            'name' => $category,
            'slug' => Str::slug($category),
        ];
    }
}
