<?php

namespace App\Containers\NewsSection\News\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Containers\NewsSection\News\Models\NewsViews;
use App\Containers\NewsSection\Category\Models\Category;

class News extends ParentModel
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'thumbnail',
        'content',
        'publish_at',
        'status',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'News';

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'name');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->select('id', 'name', 'slug');
    }

    public function views(): HasOne
    {
        return $this->hasOne(NewsViews::class, 'news_id', 'id');
    }
}
