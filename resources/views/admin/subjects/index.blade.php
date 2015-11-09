@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Subjects, <small>All Subjects</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Subjects</li>
		</ol>        
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<div class="col-xs-12">
				<div class="box box-info">
		            <div class="box-body">
		            	@include('errors.list')
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
							Add Subject
						</button>
						 <p>&nbsp;</p>
						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Subjects</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							@foreach($subjects as $subject)
								<tbody>
									<td>{!! $count++ !!}</td>
									<td>{!! $subject->name !!}</td>
									<td>{!! link_to_route('subjects.edit', 'Edit', [$subject->id], ['class'=>'btn btn-info btn-xs']) !!}</td>
									<td>{!! link_to_route('subjects.delete', 'Delete', [$subject->id], ['class'=>'btn btn-danger btn-xs']) !!}</td>
								</tbody>
							@endforeach
						</table>
				  	</div>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add New Subject</h4>
	      </div>
	      <div class="modal-body">
	        {!! Form::open(['route'=> ['subjects.store'] ]) !!}
				{!! Form::text('name', null, ['placeholder'=>'Enter Subject Name', 'class'=>'form-control']) !!}				
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