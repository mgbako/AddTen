@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading"><h1 class="text-center">Add New Question</h1></div>
				<div class="panel-body">
					{!! Form::open(['route'=>'questions.store'])!!}
						<div class="form-group">
							{!! Form::select('subject_id', $subjectList, '', ['class'=>'form-control']) !!}
						</div>

						<div class="form-group">
							{!! Form::select('class', $classList,'', ['class'=>'form-control']) !!}
						</div>

						<div class="form-group">
							{!! Form::select('term', ['1'=>'First Term', '2'=>'Second Term', '3'=>'Third Term'], '',['class'=>'form-control'])!!}
						</div>

						<div class="form-group">	
							{!! Form::textarea('question', null, ['class'=>'form-control', 'placeholder'=>'Enter Question']) !!}
						</div>

						<div class="form-group">
							{!! Form::text('answer', null, ['class'=>'form-control', 'placeholder'=>'Enter Answer']) !!}
						</div>

						<div class="form-group">
							{!! Form::text('option1', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 1']) !!}
						</div>

						<div class="form-group">
							{!! Form::text('option2', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 2']) !!}
						</div>

						<div class="form-group">
							{!! Form::text('option3', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 3']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('teacher_id', $teacher_id) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Add Question', ['class'=>'btn btn-primary form-control', 'placeholder'=>'Enter Option 3']) !!}
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