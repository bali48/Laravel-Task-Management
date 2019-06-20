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

//Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//Route::group([
//
////    'middleware' => 'api',
//    'namespace' => 'api',
//    'prefix' => 'api'
//
//], function ($router) {
//
//
//
//});

Route::group(['namespace' => 'api'], function(){
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('/tasks', 'TaskController@index')->name('tasklist');
    Route::prefix('comments')->group(function () {
        Route::post('/addcomments', 'CommentsController@store')->name('addcomments');
        Route::get('/users',"UsersController@index")->name('userlist');
    });
    Route::prefix('task')->group(function () {
        Route::get('/addtask', 'TaskController@create')->name('addtask');
        Route::get('/taskdetail/{id}', 'TaskController@show');
        Route::post('/taskstore', 'TaskController@store')->name('taskstore');
    });
});
