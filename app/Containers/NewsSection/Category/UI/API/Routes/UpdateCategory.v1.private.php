<?php

/**
 * @apiGroup           Category
 * @apiName            UpdateCategory
 *
 * @api                {PATCH} /v1/categories/:id Update Category
 * @apiDescription     Update category news by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id
 * @apiBody            {String} name
 */

use App\Containers\NewsSection\Category\UI\API\Controllers\UpdateCategoryController;
use Illuminate\Support\Facades\Route;

Route::patch('categories/{id}', UpdateCategoryController::class)
    ->middleware(['auth:api']);
