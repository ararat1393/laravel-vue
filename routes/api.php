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

Route::prefix('auth')->namespace('Api')->group(function () {
    // Create New User
    Route::post('register', 'AuthController@register');
    // Login User
    Route::post('login', 'AuthController@login');
    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@refresh');
    // Below mention routes are available only for the authenticated users.

//    Route::get('redirect/{provider}', 'AuthController@redirect');
//    Route::get('callback/{provider}', 'AuthController@callback');

    Route::get('social/{provider}', 'AuthController@redirectToProvider');
    Route::get('social/callback/{provider}', 'AuthController@handleProviderCallback');

    Route::middleware('auth:api')->group(function () {
        // Get user info
        Route::get('user', 'AuthController@user');
        // Logout user from application
        Route::post('logout', 'AuthController@logout');
    });
});

Route::apiResource('users', 'Api\UserController')->middleware(['auth:api']);

Route::get('social-user/{token}', 'Api\UserController@socialUser');

Route::get('/home/links', 'HomeController@links');
Route::get('/home/test', 'HomeController@test');
