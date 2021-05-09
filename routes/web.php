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

Route::get('/','HomeController@index');

Route::group(['prefix' =>'shop'],function() {
    Route::get('animal/create', 'Shop\AnimalController@add')->middleware('auth');
    Route::post('animal/create', 'Shop\AnimalController@create')->middleware('auth');
    Route::get('animal', 'Shop\AnimalController@index');
    Route::get('animal/edit', 'Shop\AnimalController@edit')->middleware('auth'); 
    Route::post('animal/edit', 'Shop\AnimalController@update')->middleware('auth');
    Route::get('animal/delete', 'Shop\AnimalController@delete')->middleware('auth');
    Route::get('animal/show', 'Shop\AnimalController@show');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('shop/user/edit', 'Shop\UserController@edit')->middleware('auth');
Route::post('shop/user/edit', 'Shop\UserController@update')->middleware('auth');
Route::get('shop/user/index', 'Shop\UserController@index')->middleware('auth');