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

Route::get('/', 'TodoController@index');
Route::post('/store', 'TodoController@store');
Route::get('/destroy', 'TodoController@destroy');
Route::post('/update/{id}', 'TodoController@update');



Route::get('/test', 'TodoController@test');
Route::get('/register', 'TodoController@register');