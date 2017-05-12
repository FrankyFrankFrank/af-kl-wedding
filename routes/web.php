<?php

Route::get('/rsvp', 'RSVPController@rsvp');
Route::post('/rsvp', 'RSVPController@submit');

Route::get('/home', 'HomeController@index')->name('home');