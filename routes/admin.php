<?php

Route::get('/', 'HomeController@index')->name('admin.app');

//RESOURCES?

Route::prefix('cinema')->group(function () {
    Route::get('/', 'CinemaController@index')->name('cinema.index');
    Route::get('create', 'CinemaController@create')->name('cinema.create');
    Route::post('/', 'CinemaController@store')->name('cinema.store');
    Route::get('{cinemaId}/edit', 'CinemaController@edit')->name('cinema.edit');
    Route::put('/', 'CinemaController@update')->name('cinema.update');
    Route::delete('{cinemaId}', 'CinemaController@destroy')->name('cinema.destroy');
});

Route::prefix('cinema-hall')->group(function () {
    Route::get('/', 'CinemaHallController@index')->name('cinema-hall.index');
    Route::get('create', 'CinemaHallController@create')->name('cinema-hall.create');
    Route::post('/', 'CinemaHallController@store')->name('cinema-hall.store');
    Route::get('{cinemaHallId}/edit', 'CinemaHallController@edit')->name('cinema-hall.edit');
    Route::put('/', 'CinemaHallController@update')->name('cinema-hall.update');
    Route::delete('{cinemaHallId}', 'CinemaHallController@destroy')->name('cinema-hall.destroy');
});

Route::prefix('film-show')->group(function () {
    Route::get('/', 'FilmShowController@index')->name('film-show.index');
    Route::get('create', 'FilmShowController@create')->name('film-show.create');
    Route::post('/', 'FilmShowController@store')->name('film-show.store');
    Route::get('{filmShowId}/edit', 'FilmShowController@edit')->name('film-show.edit');
    Route::put('/', 'FilmShowController@update')->name('film-show.update');
    Route::delete('{filmShowId}', 'FilmShowController@destroy')->name('film-show.destroy');
});

Route::prefix('movie')->group(function () {
    Route::get('/', 'MovieController@index')->name('movie.index');
    Route::get('create', 'MovieController@create')->name('movie.create');
    Route::post('/', 'MovieController@store')->name('movie.store');
    Route::get('{movieId}/edit', 'MovieController@edit')->name('movie.edit');
    Route::put('/', 'MovieController@update')->name('movie.update');
    Route::delete('{movieId}', 'MovieController@destroy')->name('movie.destroy');
});

Route::prefix('reservation')->group(function () {
    Route::get('/', 'ReservationController@index')->name('reservation.index');
    Route::get('create', 'ReservationController@create')->name('reservation.create');
    Route::post('/', 'ReservationController@store')->name('reservation.store');
    Route::get('{reservationId}/edit', 'ReservationController@edit')->name('reservation.edit');
    Route::put('/', 'ReservationController@update')->name('reservation.update');
    Route::delete('{reservationId}', 'ReservationController@destroy')->name('reservation.destroy');
});
