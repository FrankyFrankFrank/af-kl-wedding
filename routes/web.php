<?php

Route::get('/rsvp', 'RSVPController@rsvp');
Route::post('/rsvp', 'RSVPController@submit');

Route::get('/rsvp/{id}', 'SelectionController@show');
Route::post('/rsvp/{id}', 'SelectionController@save');

Route::get('/', function() {
    return view('home');
});