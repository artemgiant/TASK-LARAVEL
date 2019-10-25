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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'can:admin'],
    ],
    function () {

        Route::get('/', 'admin\AccountController@index')->name('page');
        Route::get('/openPage', 'admin\AccountController@openPage')->name('openPage');
        Route::match(['GET', 'POST'],'/closePage', 'admin\AccountController@closePage')->name('closePage');

    }
);