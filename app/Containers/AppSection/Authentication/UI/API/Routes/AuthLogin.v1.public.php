<?php

/**
 * @apiGroup           Authentication
 * @apiName            AuthLogin
 *
 * @api                {POST} /v1/auth/login  Login
 * @apiDescription     Auth login for create token
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiBody           {String} email
 * @apiBody           {String} password
 *
 * @apiSuccessExample  {json}       Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "token_type": "Bearer",
 * "expires_in": 315360000,
 * "access_token": "eyJ0eXAiOiJKV1QiLCJhbG...",
 * "refresh_token": "ZFDPA1S7H8Wydjkjl+xt+hPGWTagX..."
 * }
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', LoginController::class);
