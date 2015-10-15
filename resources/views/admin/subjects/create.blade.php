@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading text-center"><h1 >Add New Subject</h1></div>
				<div class="panel-body">
					{!! Form::open(['route'=>'subjects.store'])!!}
						@include('subjects.form', ['submitButton'=>'Add New Subject'])
					{!!Form::close()!!}
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			@include('errors.list')
		</div>
	</div>
	
@stop