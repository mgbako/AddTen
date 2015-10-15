@extends('layouts.master')

@section('content')
	<div class="col-lg-12">
		<div class="panel panel-default">
		   <div class="panel-heading text-center"><h1>All Classes</h1></div>
		   <div class="panel-body">
		   		{!!link_to_route('classes.create', 'Add Class', '',['class'=>'btn btn-primary'])!!}
				<table class="table table-bordered table-responsive text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Class</th>
							<th class="text-center"bgcolor="">Edit</th>
							<th class="text-center">Delete</th>
						</tr>
					</thead>
					@foreach($classes as $class)
						<tbody>
							<td>{!! $count++ !!}</td>
							<td>{!! link_to_route('classes.subjects.index', $class->name, [$class->id]) !!}</td>
							<td>{!! link_to_route('classes.edit', 'Edit', $class->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
							<td>{!! link_to_route('classes.delete', 'Delete', $class->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
						</tbody>
					@endforeach

				</table>
			</div>
		</div>
	</div>	
@stop