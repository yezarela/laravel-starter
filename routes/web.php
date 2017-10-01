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

Auth::routes();

Route::get('/', function () {
    return view('laravel');
})->name('/');

// Route::group(['middleware' => ['role:admin']], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', function () {
             return view('pages.dashboard');
        });

        Route::group(['namespace' => 'Settings'], function () {

            Route::group(['prefix' => 'settings'], function () {

                // Settings->users

                Route::get('users', 'UsersController@index');

                Route::get('users-data', 'UsersController@data');

                Route::get('users/new', 'UsersController@new');

                Route::get('users/edit/{id}', 'UsersController@edit');
   
                Route::get('users/delete/{id}', 'UsersController@delete');

                Route::post('users/create', 'UsersController@create');

                Route::post('users/update', 'UsersController@update');

                // Settings->roles

                Route::get('roles', 'RolesController@index');

                Route::get('roles/new', 'RolesController@new');

                Route::get('roles/edit/{id}', 'RolesController@edit');
   
                Route::get('roles/delete/{id}', 'RolesController@delete');

                Route::post('roles/create', 'RolesController@create');

                Route::post('roles/update', 'RolesController@update');
            });
        });
    });
// });
