<?php

namespace App\Containers\NewsSection\News\Data\Factories;

use App\Containers\AppSection\User\Data\Factories\UserFactory;
use Illuminate\Support\Str;
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
        $title = $this->faker->name();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'user_id' => UserFactory::new()->createOne()->id,
            'thumbnail' => $this->faker->imageUrl($width = 640, $height = 480),
            'content' => $this->faker->text,
            'publish_at' => $this->faker->date,
            'status' => 'publish',
        ];
    }
}
