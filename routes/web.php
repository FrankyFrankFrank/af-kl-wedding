<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/rsvp', function() {
	return view('rsvp');
});