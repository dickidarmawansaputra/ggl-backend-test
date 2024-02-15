<?php

/**
 * @apiGroup           Category
 * @apiName            FindCategoryById
 *
 * @api                {GET} /v1/categories/:id Find Category By Id
 * @apiDescription     Get category by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id
 */

use App\Containers\NewsSection\Category\UI\API\Controllers\FindCategoryByIdController;
use Illuminate\Support\Facades\Route;

Route::get('categories/{id}', FindCategoryByIdController::class)
    ->middleware(['auth:api']);
