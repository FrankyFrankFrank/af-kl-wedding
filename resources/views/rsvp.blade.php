@extends('layouts.app')

@section('title', 'RSVP')

@section('content')
<div class="nav-center">
	<div class="nav-item">
		<div class="container">
            <p><a href="/">Adam Frank &amp; Kathleen Light</a></p>
		</div>
	</div>
</div>
<div class="container">

    <div class="columns">

        <div class="column">
            <h1>RSVP</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <div class="column">
            {!! Form::open(['url' => 'foo/bar']) !!}
                <div class="field">
                    <label class="label" for="rsvp_number">Your RSVP Code</label>
                    <p class="control">
                        <input type="text" id="rsvp_number" name="rsvp_number" class="input"/>
                    </p>
                </div>
                <div class="field">
                    <label class="label" for="firstname">First Name on Invitation</label>
                    <p class="control">
                        <input type="text" id="firstname" name="firstname" class="input"/>
                    </p>
                </div>
                <div class="field">
                    <label class="label" for="lastname">Last Name on Invitation</label>
                    <p class="control">
                        <input type="text" id="lastname" name="lastname" class="input"/>
                    </p>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection