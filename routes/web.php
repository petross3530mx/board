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

Route::get('/user', 'UserController@index')->name('user');

Auth::routes();

Route::get('/', 'AnnouncementController@allData')->name('home');

Route::post('/update', 'UserController@updateUser')->name('user-update');

Route::post('/add', 'AnnouncementController@submit')->name('add-form');