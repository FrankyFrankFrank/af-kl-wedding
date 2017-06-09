<?php

Route::get('/rsvp', 'RSVPController@rsvp');
Route::post('/rsvp', 'RSVPController@submit');

Route::get('/rsvp/{id}', 'SelectionController@show');

Route::get('/', function() {
    return view('home');
});