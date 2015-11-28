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
@stop