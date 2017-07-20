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

Route::get('/', 'TodoController@index');//->Membuat jalur ke TodoController dengan method GET function index
Route::post('/store', 'TodoController@store');//->Membuat jalur ke TodoController dengan method POST function Store
Route::get('/destroy', 'TodoController@destroy');//->Membuat jalur ke TodoController dengan method GET function destroy
Route::post('/update/{id}', 'TodoController@update');//->Membuat jalur ke TodoController dengan method POST function update

Route::get('/setlogin', 'TodoController@setlogin');//->Membuat jalur ke TodoController dengan method get function login
Route::post('/inlogin', 'TodoController@inlogin');//->Membuat jalur ke TodoController dengan method POST function update
Route::get('/registes', 'TodoController@regist');//->Membuat jalur ke TodoController dengan method GET function regist
Route::post('/inregister', 'TodoController@inregister');//->Membuat jalur ke TodoController dengan method POST function register
Route::get('/logout', 'TodoController@logout');//->Membuat jalur ke TodoController dengan method GET function logout
Route::get('/latihan', 'TodoController@latihan');
Route::get('/latihan2', 'TodoController@latihan2');
Route::get('/send', 'TodoController@send');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
