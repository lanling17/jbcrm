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
Route::get('/403',function (){
    return view('403');
});

Route::any('login','Admin\HomeController@login')->name('login');
Route::get('logout','Admin\HomeController@logout')->name('logout');
Route::get('/welcome', 'Admin\HomeController@welcome')->name('welcome');
Route::get('/home', 'Admin\HomeController@index')->name('home');

//Auth::routes();
Route::group(['middleware'=>'rbac'],function () use($router){


    Route::resource('user','Admin\UserController');
    Route::resource('role','Admin\RoleController');
    Route::resource('jurisdiction','Admin\JurisdictionController');
    Route::resource('client','Admin\ClientController');
    Route::resource('classify','Admin\ClassifyController');

    Route::get('client/export','Admin\ClientController@export')->name('client/export');   //客户导出
    Route::get('client/import','Admin\ClientController@import')->name('client/import');   //客户导入
    //Excel控制器
    Route::get('/export', 'Admin\ExcelController@export')->name('export');
    Route::any('/import', 'Admin\ExcelController@import')->name('import');

});
