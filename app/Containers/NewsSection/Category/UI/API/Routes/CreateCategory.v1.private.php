<?php

/**
 * @apiGroup           Category
 * @apiName            CreateCategory
 *
 * @api                {POST} /v1/categories Create Category
 * @apiDescription     Create category news
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiBody           {String} name
 */

use App\Containers\NewsSection\Category\UI\API\Controllers\CreateCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('categories', CreateCategoryController::class)
    ->middleware(['auth:api']);
