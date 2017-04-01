<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::prefix('v1')->namespace('Api\V1')->group(function () {
        Route::resource('comments', 'CommentsController', ['only' => ['index', 'show', 'destroy']]);
        Route::resource('posts', 'PostsController', ['only' => ['index', 'show', 'store']]);
        Route::resource('users.posts', 'PostsController', ['only' => 'index']);
        Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'update']]);
    });
});
