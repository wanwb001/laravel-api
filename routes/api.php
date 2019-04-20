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

Route::namespace('Api')->prefix('v1')->middleware('cors')->group(function () {
    Route::get('/users','UserController@index')->name('users.index');
    Route::post('/users','UserController@store')->name('users.store');
    Route::post('/login','UserController@login')->name('users.login');
    Route::get('/users/info','UserController@info')->name('users.info');
    Route::get('/users/{user}', 'UserController@show')->where('user', '[0-9]+')->name('users.show');
    Route::get('/logout','UserController@logout')->name('users.logout');

});
