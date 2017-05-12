<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RSVPController extends Controller
{
    public function rsvp()
    {
        return view('rsvp');
    }

    public function submit(Request $request)
    {
        return view('rsvp');
    }
}