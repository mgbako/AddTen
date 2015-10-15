@extends('layouts.master')


@section('content')
		<div class="col-lg-12">
		<div class="panel panel-danger">
			<div class="panel-heading"><h2>Are You sure You want to Delete the Question:</h2></div>
			<div class="panel-body">
				<h3> {{$question->question}}</h3>
				<hr>
				<h5>{!! $question->answer['answer'] !!}</h5><hr>
				<h5>{!! $question->option1 !!}</h5><hr>
				<h5>{!! $question->option2 !!}</h5><hr>
				<h5>{!! $question->option3 !!}</h5><hr>
				
				{!!Form::open(['method'=>'delete', 'route' => ['classes.subjects.questions.destroy', $id, $subjectId, $question->id]]) !!}
					<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
					<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>
					<div class="form-group">{!! Form::hidden('question_id', $question->id) !!}</div>

					<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger pull-right')) !!}</div>
				{!!Form::close()!!}
			</div>
		</div>
@stop
