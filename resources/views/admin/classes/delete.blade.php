@extends('layouts.master')


@section('content')
		<div class="col-lg-12">
			<div class="panel panel-danger">
				<div class="panel-heading"><h2>Are You sure You want to Delete {{$class->name}}</h2></div>
				<div class="panel-body">
					{!!Form::open(['method'=>'delete', 'route' => ['classes.destroy', $class->id]]) !!}
						<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
						<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>
						<div class="form-group">{!! Form::hidden('id', $class->id) !!}</div>
						<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}</div>
					{!!Form::close()!!}
				</div>
			</div>			
		</div>
@stop
