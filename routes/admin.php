<?php

Route::get('/', 'HomeController@index');

// Route::get('/cinema', 'CinemaController@index')->name('cinema.index');
Route::resource('/cinema', 'CinemaController');
