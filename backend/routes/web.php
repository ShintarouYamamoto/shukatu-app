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
    return view('home');
});

Route::get('/return', 'UserController@return');

Auth::routes();

Route::get('/user/{user_id}', 'UserController@show')->name('mypage');

Route::post('/api/tab/store', 'UserController@tab_store');

Route::post('/api/company/store', 'UserController@company_store');
