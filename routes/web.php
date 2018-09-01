<?php


Route::get('/', function() {
    return view('home');    //THERE SHOULD BE /cinema routing to choose cinema
                            //in the first step
});

//Route::get('/movie', 'MovieController@index')->name('movie');   //is name necessary??
Route::get('/cinema', 'CinemaController@index')->name('cinema');   //is name necessary??
Route::get('/reservation/create/{filmShowId}', 'ReservationController@create')
    ->name('reservation.create');
Route::post('/reservation', 'ReservationController@store')
    ->name('reservation.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
