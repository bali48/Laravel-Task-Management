<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//Route::get('login-through-code/{code}', 'Auth/LoginController');
Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware(['auth' => 'verified','checkrole'])->group(function () {
    Route::prefix('task')->group(function () {
        Route::get('/addtask', 'TaskController@create')->name('addtask');
        Route::get('/taskdetail/{id}', 'TaskController@show');
        Route::post('/taskstore', 'TaskController@store')->name('taskstore');
    });
    Route::prefix('comments')->group(function () {
        Route::post('/addcomments', 'CommentsController@store')->name('addcomments');
    });

    Route::get('/users',"UsersController@index")->name('userlist');//->middleware('checkrole');
});

Route::get('/tasks', 'TaskController@index')->name('tasklist');


