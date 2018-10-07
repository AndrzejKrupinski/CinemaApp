<?php

Route::get('/', 'HomeController@index')->name('admin.app');

Route::get('/cinema', 'CinemaController@index')->name('cinema.index');
Route::get('/cinema/create', 'CinemaController@create')->name('cinema.create');
Route::post('/cinema', 'CinemaController@store')->name('cinema.store');
Route::get('/cinema/{cinemaId}/edit', 'CinemaController@edit')->name('cinema.edit');
Route::put('/cinema/{cinemaId}', 'CinemaController@update')->name('cinema.update');
Route::delete('/cinema/{cinemaId}', 'CinemaController@destroy')->name('cinema.destroy');
