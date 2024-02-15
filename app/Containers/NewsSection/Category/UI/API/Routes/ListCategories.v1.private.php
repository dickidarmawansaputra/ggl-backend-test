<?php

/**
 * @apiGroup           Category
 * @apiName            ListCategories
 *
 * @api                {GET} /v1/categories List Categories
 * @apiDescription     Get list of category news
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 */

use App\Containers\NewsSection\Category\UI\API\Controllers\ListCategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('categories', ListCategoriesController::class)
    ->middleware(['auth:api']);
