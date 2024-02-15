<?php

/**
 * @apiGroup           News
 * @apiName            FindNewsById
 *
 * @api                {GET} /v1/news/:id Find News By Id
 * @apiDescription     Get news by id
 *
 * @apiVersion         1.0.0
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiParam           {String} id=aYOxlpzRMwrX3gD7 Hashed ID
 */

use App\Containers\NewsSection\News\UI\API\Controllers\FindNewsByIdController;
use Illuminate\Support\Facades\Route;

Route::get('news/{id}', FindNewsByIdController::class);
