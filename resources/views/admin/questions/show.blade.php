@extends('layouts.master')

@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading"><h1>All Questions</h1></div>
		<div class="panel-body">
			<h3>{!! link_to_route('classes.subjects.questions.edit', $question->question, [$classe_id, $subject_id, $question->id] ) !!}</h3>
			<hr>
			<h5>{!! $question->option1 !!}</h5><hr>
			<h5>{!! $question->option2 !!}</h5><hr>
			<h5>{!! $question->option3 !!}</h5><hr>
			<h5>{!! $question->option4 !!}</h5><hr>
			{!! link_to_route('classes.subjects.questions.delete', 'Delete', 
			[$classe_id, $subject_id, $question->id], 
			['class'=>'btn btn-danger pull-right']) !!}
		</div>
	</div>
</div>
@stop