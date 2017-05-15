<?php

Route::get('/rsvp', 'RSVPController@rsvp');
Route::post('/rsvp', 'RSVPController@submit');

Route::get('/', function() {
    return view('home');
});