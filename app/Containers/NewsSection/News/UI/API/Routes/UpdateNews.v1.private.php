<?php

/**
 * @apiGroup           News
 * @apiName            UpdateNews
 *
 * @api                {PATCH} /v1/news/:id Update News
 * @apiDescription     Update news
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id=aYOxlpzRMwrX3gD7 Hashed ID
 * @apiBody            {String} title
 * @apiBody            {String} categories=NxOpZowo9GmjKqdR,XbPW7awNkzl83LD6 hashed category id, if multiple hashed category id , seperated with comma sign (,)
 * @apiBody            {Number} user_id
 * @apiBody            {String} thumbnail=https://placehold.co/600x400 URL image
 * @apiBody            {String} content
 * @apiBody            {Date} publish_at=2024-02-15 Format: Y-m-d
 */

use App\Containers\NewsSection\News\UI\API\Controllers\UpdateNewsController;
use Illuminate\Support\Facades\Route;

Route::patch('news/{id}', UpdateNewsController::class)
    ->middleware(['auth:api']);
