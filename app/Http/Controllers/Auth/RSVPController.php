<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Validator;
use App\User;
use App\Party;

class RSVPController extends Controller
{
    public function rsvp()
    {
        return view('rsvp');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rsvp_code' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/rsvp')
                ->withErrors($validator)
                ->withInput();
        }

        $party = Party::where('rsvp_code', $request->rsvp_code)->first();

        if(! $party) {
            return redirect('/rsvp')
                ->withErrors(['guest_not_found' => $exception->getMessage()])
                ->withInput();
        }
        return redirect('/rsvp/' . $party->id);
    }
}