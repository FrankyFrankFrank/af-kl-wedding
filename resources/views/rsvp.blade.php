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
<div class="section">
    <div class="container">
        <div class="columns">

            <div class="column">
                <h1>RSVP</h1>

                @if(isset($user))
                    <p>Found User</p>
                    @endif
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="column">
                {!! Form::open(['url' => '/rsvp']) !!}
                    <div class="field">
                        <label class="label" for="rsvp_code">Your RSVP Code</label>
                        <p class="control">
                            <input type="text" id="rsvp_code" name="rsvp_code" class="input" value="{{ old('rsvp_code') }}"/>
                        </p>
                        @if($errors->has('rsvp_code'))
                            <p class="help is-danger">{{ $errors->first('rsvp_code') }}</p>
                        @endif
                    </div>
                    @if($errors->first('guest_not_found'))
                        <div class="field">
                            <p class="help is-danger">Guest Not Found</p>
                        </div>
                    @endif
                    @if($errors->first('mismatch'))
                        <div class="field">
                            <p class="help is-danger">Guest Name Does Not Match RSVP Code</p>
                        </div>
                    @endif
                    {{ Form::submit('RSVP', ['class'=> 'button is-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection