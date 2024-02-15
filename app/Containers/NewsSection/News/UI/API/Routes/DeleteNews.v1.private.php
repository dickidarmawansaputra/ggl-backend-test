<?php

/**
 * @apiGroup           News
 * @apiName            DeleteNews
 *
 * @api                {DELETE} /v1/news/:id Delete News
 * @apiDescription     Delete news by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id=aYOxlpzRMwrX3gD7 Hashed ID
 */

use App\Containers\NewsSection\News\UI\API\Controllers\DeleteNewsController;
use Illuminate\Support\Facades\Route;

Route::delete('news/{id}', DeleteNewsController::class)
    ->middleware(['auth:api']);
