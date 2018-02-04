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

Route::get('/', 'MovieController@index')->name('movie');
Route::get('/reservation/create/{filmShowId}', 'ReservationController@create')->name('reservation.create');
Route::post('/reservation', 'ReservationController@store')->name('reservation.store');
