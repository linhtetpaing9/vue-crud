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

Route::get('/review', 'ReviewController@index')->name('review.index');
Route::get('/review/api', 'ReviewController@api')->name('review.api');
Route::post('/review', 'ReviewController@store')->name('review.store');
Route::delete('/review/{id}', 'ReviewController@destroy')->name('review.destroy');
Route::patch('/review/{id}', 'ReviewController@update')->name('review.update');


