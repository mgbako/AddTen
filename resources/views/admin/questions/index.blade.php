@extends('layouts.master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h1>All Questions</h1></div>
		<div class="panel-body">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			  Add New Question
			</button>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Question</th>
						<th>Answer</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				@foreach($questions as $question)
					<tbody>
						<td>{!! $count++ !!}</td>
						<td>{!! link_to_route('classes.subjects.questions.show', $question->question, [$classe_id, $subject_id, $question->id]) !!}</td>
						<td>{!! $question->answer['answer'] !!}</td>
						<td>
							{!! link_to_route('classes.subjects.questions.edit', 'Edit', 
							[$classe_id, $subject_id, $question->id], 
							['class'=>'btn btn-info btn-xs']) !!}</td>
						<td>
							{!! link_to_route('classes.subjects.questions.delete', 'Delete', 
							[$classe_id, $subject_id, $question->id], 
							['class'=>'btn btn-danger btn-xs']) !!}
						</td>
					</tbody>
				@endforeach
			</table>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add New Question</h4>
	      </div>
	      <div class="modal-body">
	      	@include('errors.list')
	        {!! Form::open(['route'=> ['classes.subjects.questions.store', $classe_id, $subject_id] ]) !!}
						
						<div class="form-group">
							{!! Form::hidden('term', $term) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('classe_id', $classe_id) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('subject_id', $subject_id) !!}
						</div>

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

					
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      {!!Form::close()!!}
	    </div>
	  </div>
	</div>
	<!-- End of Modal -->


	<!-- Update Modal -->
	
	<!-- End of Modal -->
	
@stop