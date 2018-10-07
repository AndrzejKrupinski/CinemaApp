<?php

Route::get('/', 'HomeController@index')->name('admin.app');

Route::prefix('cinema')->group(function () {
    Route::get('/', 'CinemaController@index')->name('cinema.index');
    Route::get('create', 'CinemaController@create')->name('cinema.create');
    Route::post('/', 'CinemaController@store')->name('cinema.store');
    Route::get('{cinemaId}/edit', 'CinemaController@edit')->name('cinema.edit');
    Route::put('{cinemaId}', 'CinemaController@update')->name('cinema.update');
    Route::delete('{cinemaId}', 'CinemaController@destroy')->name('cinema.destroy');
});

Route::get('/movie', 'MovieController@index')->name('movie.index');
