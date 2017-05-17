<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class RSVPController extends Controller
{
    public function rsvp()
    {
        return view('rsvp');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rsvp_number' => 'required|numeric',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/rsvp')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('rsvp_number', $request->rsvp_number)->get();

        return view('rsvp');
    }
}