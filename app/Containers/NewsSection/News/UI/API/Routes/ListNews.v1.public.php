<?php

/**
 * @apiGroup           News
 * @apiName            ListNews
 *
 * @api                {GET} /v1/news List News
 * @apiDescription     Get list of news
 *
 * @apiVersion         1.0.0
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiQuery           {String} filter=NxOpZowo9GmjKqdR,XbPW7awNkzl83LD6 Filter news with hashed category id, if multiple hashed category id , seperated with comma sign (,)
 * @apiQuery           {String} sortedByViews=desc Sort news by the number of views (asc / desc)
 * @apiQuery           {String} sortedByPublication=desc Sort news by publication date (asc / desc)
 */

use App\Containers\NewsSection\News\UI\API\Controllers\ListNewsController;
use Illuminate\Support\Facades\Route;

Route::get('news', ListNewsController::class);
