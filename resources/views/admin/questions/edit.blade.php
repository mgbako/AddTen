@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading"><h1 class="text-center">Edit Question</h1></div>
				<div class="panel-body">
				{!! Form::model($question, ['method'=>'patch', 'route'=>['classes.subjects.questions.update', $id, $subjectId, $question->id]])!!}

					<div class="form-group">	
							{!! Form::textarea('question', null, ['class'=>'form-control', 'placeholder'=>'Enter Question']) !!}
						</div>

						<div class="form-group">
							<p>{!! Form::radio('answer', 'option1') !!} Answer</p>
							{!! Form::text('option1', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 1']) !!}
						</div>

						<div class="form-group">
							<p>{!! Form::radio('answer', 'option2') !!} Answer</p>
							{!! Form::text('option2', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 2']) !!}
						</div>

						<div class="form-group">
							<p>{!! Form::radio('answer', 'option3') !!} Answer</p>
							{!! Form::text('option3', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 3']) !!}
						</div>

						<div class="form-group">
							<p>{!! Form::radio('answer', 'option4') !!} Answer</p>
							{!! Form::text('option4', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 4']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Update', ['class'=>'btn btn-success form-control']) !!}
						</div>
				{!!Form::close()!!}
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			@include('errors.list')
		</div>
	</div>
	
@stop