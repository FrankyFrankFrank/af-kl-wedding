@extends('layouts.app')

@section('title', 'RSVP')

@section('content')
<div class="nav-center">
	<div class="nav-item">
		<div class="container">
			<p>Adam Frank &amp; Kathleen Light</p>
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
	</div>
	<div class="columns">
		<div class="column">
		@if(auth()->user() == 'unresponded')
			{{ Form::open(['action' => 'RSVPController@submit']) }}
				<div class="field">
				  <label class="label" for="status">I will be</label>
				  <p class="control">
				    <span class="select">
				      <select id="status" name="status">
				        <option value="attending">Attending</option>
				        <option value="declined">Not Attending</option>
				      </select>
				    </span>
				  </p>
				</div>
				<div class="field">
				  <p class="control">
				    <button class="button is-primary">RSVP</button>
				  </p>
				</div>
			{{ Form::close() }}
		@else
			<p>{{ auth()->user()->status }}</p>
		@endif

		</div>
	</div>
</div>

@endsection