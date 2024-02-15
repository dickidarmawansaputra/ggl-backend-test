<?php

namespace App\Containers\NewsSection\Category\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ship\Parents\Models\Model as ParentModel;

class Category extends ParentModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $hidden = ['pivot'];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Category';
}
