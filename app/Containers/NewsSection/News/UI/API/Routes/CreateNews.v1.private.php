<?php

/**
 * @apiGroup           News
 * @apiName            CreateNews
 *
 * @api                {POST} /v1/news Create News
 * @apiDescription     Create News
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiBody            {String} title
 * @apiBody            {String} categories=NxOpZowo9GmjKqdR,XbPW7awNkzl83LD6 hashed category id, if multiple hashed category id , seperated with comma sign (,)
 * @apiBody            {Number} user_id
 * @apiBody            {String} thumbnail=https://placehold.co/600x400 URL image
 * @apiBody            {String} content
 * @apiBody            {Date} publish_at=2024-02-15 Format: Y-m-d
 */

use App\Containers\NewsSection\News\UI\API\Controllers\CreateNewsController;
use Illuminate\Support\Facades\Route;

Route::post('news', CreateNewsController::class)
    ->middleware(['auth:api']);
