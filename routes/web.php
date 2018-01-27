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

Route::view('/movie', 'reservation.movie');

Route::get('user/profile', 'UserController@showProfile')->name('profile');

Route::get('details', function () {
    return view('reservation.details');
});

Route::get('confirmation', function () {
    return view('reservation.confirmation');
});
