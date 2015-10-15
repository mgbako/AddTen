@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-7">

			<div class="panel panel-default">
			  <div class="panel-heading text-center"><h1>Register</h1></div>
			  <div class="panel-body">
				{!! Form::open(['route'=>'register.store', 'files'=>'true'])!!}
					
	 				<div class="form-group">
						{!! Form::text('userId', null, ['class'=>'form-control', 'placeholder'=>'Enter User ID']) !!}
					</div>

					<div class="form-group">
						{!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
					</div>

					<div class="form-group">
						{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
					</div>

					<div class="form-group">
						{!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
					</div>

					<div class="form-group">	
						{!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'Enter First Name']) !!}
					</div>

					<div class="form-group">
						{!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Enter Last Name']) !!}
					</div>

					<div class="form-group">
						{!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], '', ['class'=>'form-control'])!!}
					</div>

					<div class="form-group">
						{!! Form::input('date', 'dob', date('Y-m-d'), ['class'=>'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::input('tel', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Enter Phone Number']) !!}
					</div>

					<div class="form-group">
						{!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Home Address']) !!}
					</div>

					<div class="form-group">
						{!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Enter State of Origin']) !!}
					</div>

					<div class="form-group">
						{!! Form::text('nationality', null, ['class'=>'form-control', 'placeholder'=>'Enter Nationality']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('image', 'Select an Image') !!}
						{!! Form::file('image', ['class'=>'form-control', 'placeholder'=>'Enter Nationality']) !!}
					</div>

					<div class="form-group">
						{!! Form::hidden('type') !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Submit', ['class'=>'btn btn-primary form-control', 'placeholder'=>'Enter Option 3']) !!}
					</div>

				{!!Form::close()!!}
			  </div>
			</div>
			
		</div>{{-- End of content area --}}

		<div class="col-lg-3">
			@include('errors.list');
		</div>{{-- End of Right side bar --}}
	</div>
	
@stop
