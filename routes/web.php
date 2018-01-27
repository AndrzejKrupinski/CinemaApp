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

//ROBOCZE ROUTINGI:
Route::get('/', function () {
    return view('layout');
});

Route::get('/movie', 'MovieController@index')->name('movie');

Route::get('/filmshow', 'FilmShowController@index')->name('filmshow');

Route::get('/reservation', 'ReservationController@index')->name('reservation');
