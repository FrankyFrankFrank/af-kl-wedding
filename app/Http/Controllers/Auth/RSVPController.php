<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mockery\Exception;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        ]);

        if ($validator->fails()) {
            return redirect('/rsvp')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $guest = User::where('rsvp_number', $request->rsvp_number)->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            return redirect('/rsvp')
                ->withErrors(['guest_not_found' => $exception->getMessage()])
                ->withInput();
        }

        if(!strtolower($guest->name) == strtolower($request->firstname . " " . $request->lastname)) {
            return redirect('/rsvp')
                ->withErrors(['mismatch'])
                ->withInput();
        }

        return view('rsvp', ['guest' => $guest]);
    }
}