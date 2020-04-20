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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'UsersController@login');
    Route::post('/register', 'UsersController@register');
    Route::get('/data-home', 'UsersController@home')->middleware('auth:api');
    Route::get('/logout', 'UsersController@logout')->middleware('auth:api');

    Route::group(['middleware' => 'api','prefix' => 'password'], function () {
    	Route::post('create', 'PasswordResetController@create');
    	Route::get('find/{token}', 'PasswordResetController@find');
    	Route::post('reset', 'PasswordResetController@reset');
    });
});

