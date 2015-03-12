<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'TasksListController');

//Route::resource('tasks', 'TasksListController');

Route::get('/task/delete/{id?}', function ($id) {
    if (App::call('\App\Http\Controllers\TasksListController@deleteTask', ['id' => $id])) {
        return Redirect::to('/');
    }
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
