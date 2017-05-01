<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/rsvp', 'RSVPController@rsvp');
Route::post('/rsvp', 'RSVPController@submit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
