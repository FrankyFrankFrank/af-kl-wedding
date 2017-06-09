@extends('layouts.app')

@section('title', 'Selections')

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
	            	<h1>Guests</h1>
	            	<h3>{{ $user->name }}</h3>
	            	<p>Chicken or Fish</p>
	            </div>

	        </div>
	    </div>
	</div>
@endsection