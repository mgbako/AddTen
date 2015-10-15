@extends('layouts.master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h1>All Subject</h1></div>
		<div class="panel-body">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Add Subject
			</button>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Subjects</th>
						<th>Delete</th>
					</tr>
				</thead>
				@foreach($subjects as $subject)
					<tbody>
						<td>{!! $count++ !!}</td>
						<td>{!! $subject->name !!}</td>
						<td>{!! link_to_route('classes.subjects.delete', 'Delete', [$classe_id, $subject->id], ['class'=>'btn btn-danger btn-xs']) !!}</td>
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
	        <h4 class="modal-title" id="myModalLabel">Select Subject For {{ $subjectName }}</h4>
	      </div>
	      <div class="modal-body">
	      	@include('errors.list')
	        {!! Form::open(['route'=> ['classes.subjects.store', $classe_id] ]) !!}
				
				<div class="form-group">
					{!! Form::hidden('classe_id', $classe_id) !!}
				</div>

				<div class="form-group">	
						{!! Form::label('subjects', 'Select Subjects For this Class') !!}
						{!! Form::select('subject_id[]', $subjectList, null, ['class'=>'form-control', 'multiple']) !!}
					</select>
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
@stop