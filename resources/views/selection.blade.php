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
	            	<h1>{{ $party->name }}</h1>
                    @foreach($guests as $guest)
	            	<h3>{{ $guest->name }}</h3>
                    <hr>
                    @endforeach
                		{!! Form::open(['url' => '/rsvp']) !!}
                			<div class="field">
                				<label class="label">Will be...</label>
                			    <p class="control">
                			        <label class="radio">
            			              <input type="radio" name="entree">
            			              Attending
            			            </label>
            			            <label class="radio">
            			              <input type="radio" name="entree">
            			              Not Attending
            			            </label>
                			    </p>
                			    @if($errors->has('entree'))
                			        <p class="help is-danger">{{ $errors->first('entree') }}</p>
                			    @endif
                			</div>
                			<div class="field">
                				<label class="label">Entree</label>
                			    <p class="control">
                			        <label class="radio">
            			              <input type="radio" name="entree">
            			              Chicken
            			            </label>
            			            <label class="radio">
            			              <input type="radio" name="entree">
            			              Fish
            			            </label>
                			    </p>
                			    @if($errors->has('entree'))
                			        <p class="help is-danger">{{ $errors->first('entree') }}</p>
                			    @endif
                			</div>
                		{!! Form::close() !!}
	            </div>

	        </div>
	    </div>
	</div>
@endsection