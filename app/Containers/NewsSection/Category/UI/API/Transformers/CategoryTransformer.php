<?php

namespace App\Containers\NewsSection\Category\UI\API\Transformers;

use App\Containers\NewsSection\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Category $category): array
    {
        $response = [
            'id' => $category->getHashedKey(),
            'name' => $category->name,
            'slug' => $category->slug,
        ];

        return $response;
    }
}
