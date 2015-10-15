@extends('layouts.master')


@section('content')
    <div class="container">
		<div class="col-lg-2 columns">
			
		</div>

		<div class="col-lg-8 columns">
		<h2>Are You sure You want to Delete the Question:</h2>
			<hr>
			<h4> {{$student->question}}</h4>
			<hr>

			{!!Form::open(['method'=>'delete', 'route' => ['students.destroy', $student->id]]) !!}
				<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
				<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>

				<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}</div>
			{!!Form::close()!!}

		</div>
	</div>
@stop
