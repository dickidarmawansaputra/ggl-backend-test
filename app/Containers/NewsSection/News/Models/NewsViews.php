<?php

namespace App\Containers\NewsSection\News\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class NewsViews extends ParentModel
{
    protected $fillable = [
        'news_id',
        'views',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'NewsViews';
}
