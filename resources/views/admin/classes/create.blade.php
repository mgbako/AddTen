@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
			  <div class="panel-heading text-center"><h1>Add New Class</h1></div>
			  <div class="panel-body">
				{!! Form::open(['route'=>'classes.store'])!!}
				<div class="form-group">
						{!! Form::text('name', null, ['placeholder'=>'Enter Subject Name', 'class'=>'form-control']) !!}
				</div>
				<div class="form-group">
						{!! Form::label('subjects', 'Select Subjects For this Class') !!}
						{!! Form::select('subjects[]', $subjectList, null, ['class'=>'form-control', 'multiple']) !!}
					</div>
				<div class="form-group">
					{!!Form::submit('Submit', ['class'=>'btn btn-primary form-control'])!!}
				</div>
				{!!Form::close()!!}
			  </div>
			</div>
		</div>

		<div class="col-lg-4">
			@include('errors.list')
		</div>
	</div>
	
@stop