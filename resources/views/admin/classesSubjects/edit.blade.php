@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading text-center"><h1>Edit: {!! $subject->name !!} </h1></div>
				<div class="panel-body">
					{!! Form::model($subject, ['method'=>'patch','route'=>['subjects.update', $subject->id]])!!}
					@include('subjects.form', ['submitButton'=>'Update Subject'])
					{!!Form::close()!!}
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			@include('errors.list')
		</div>
	</div>
	
@stop