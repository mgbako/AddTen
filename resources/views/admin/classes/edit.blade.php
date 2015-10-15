@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h1 class="alignCenter">Edit: {!! $class->name !!} </h1></div>
				<div class="panel-body">
					{!! Form::model($class, ['method'=>'patch','route'=>['classes.update', $class->id]])!!}
					<div class="form-group">
						{!! Form::text('name', null, ['placeholder'=>'Enter Subject Name', 'class'=>'form-control']) !!}
					</div>

					<div class="form-group">
						{!!Form::submit('Update', ['class'=>'btn btn-primary form-control'])!!}
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