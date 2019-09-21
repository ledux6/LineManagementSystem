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

Route::get('/', 'ScoreboardController@index');
Route::get('/register', 'RegistrationController@index');
Route::post('/register/add', 'RegistrationController@add');
Route::get('/worker_page', 'WorkerController@index');
Route::post('/worker_page/line', 'WorkerController@line');
Route::get('/worker_page/line/remove', 'WorkerController@remove');
