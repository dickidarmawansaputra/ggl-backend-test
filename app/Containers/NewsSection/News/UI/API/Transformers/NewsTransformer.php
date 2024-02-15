<?php

namespace App\Containers\NewsSection\News\UI\API\Transformers;

use App\Containers\NewsSection\News\Models\News;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class NewsTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(News $news): array
    {
        $response = [
            'id' => $news->getHashedKey(),
            'title' => $news->title,
            'slug' => $news->slug,
            'author' => $news->author,
            'categories' => $news->categories,
            'thumbnail' => $news->thumbnail,
            'content' => $news->content,
            'publish_at' => $news->publish_at,
            'views' => $news->views,
        ];

        return $response;
    }
}
