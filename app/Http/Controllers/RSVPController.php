<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RSVPRequest;
use App\User;

class RSVPController extends Controller
{
	public function __construct()
	{
	    $this->user =  auth()->user();
	}

    public function rsvp()
    {
    	return view('rsvp');
    }

    public function submit(RSVPRequest $request)
    {
    	$this->user->setStatus($request->status);
    	return view('rsvp', ['user' => $this->user]);
    }
}
