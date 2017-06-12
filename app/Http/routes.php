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

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index');

Route::auth();

Route::get('/admin', 'AdminController@index');

Route::post('/admin/spare', 'AdminController@storeSpare');
Route::delete('/admin/spare/{spare}', 'AdminController@destroySpare');

Route::post('/admin/manufacturer', 'AdminController@storeManufacturer');
Route::delete('/admin/manufacturer/{manufacturer}', 'AdminController@destroyManufacturer');

Route::post('/admin/group', 'AdminController@storeGroup');
Route::delete('/admin/group/{group}', 'AdminController@destroyGroup');
