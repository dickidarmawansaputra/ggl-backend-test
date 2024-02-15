<?php

/**
 * @apiGroup           Category
 * @apiName            DeleteCategory
 *
 * @api                {DELETE} /v1/categories/:id Delete Category
 * @apiDescription     Delete category news by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id
 */

use App\Containers\NewsSection\Category\UI\API\Controllers\DeleteCategoryController;
use Illuminate\Support\Facades\Route;

Route::delete('categories/{id}', DeleteCategoryController::class)
    ->middleware(['auth:api']);
