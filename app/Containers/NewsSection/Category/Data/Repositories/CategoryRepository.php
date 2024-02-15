<?php

namespace App\Containers\NewsSection\Category\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CategoryRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];
}
