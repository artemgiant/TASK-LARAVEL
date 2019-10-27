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
Route::get('/home', 'HomeController@index')->middleware('can:access-to-controller')->name('home');

//admin
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'can:admin'],
    ],
    function () {

        Route::get('/', 'admin\AccountController@index')->middleware('can:access-to-controller')->name('page');
        Route::match(['GET', 'POST'],'/page/close', 'admin\AccountController@closePage')->middleware('can:access-to-controller')->name('closePage');
        Route::match(['GET', 'POST'],'/page/open', 'admin\RoleController@listRoleAction')->middleware('can:access-to-controller')->name('listRole');
        Route::match(['GET','POST'],'create/role','admin\RoleController@createRole')->name('createRole');
    }
);