@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Classes, <small>All Classes</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Classes</li>
		</ol>        
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<div class="col-xs-12">
				<div class="box box-info">
		            <div class="box-body">
		            	@include('errors.list')
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							Add Class
						</button>
						 <p>&nbsp;</p>
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
	        <h4 class="modal-title" id="myModalLabel">Add New Classes</h4>
	      </div>
	      <div class="modal-body">
	        {!! Form::open(['route'=> ['classes.store'] ]) !!}
				{!! Form::text('name', null, ['placeholder'=>'Enter Class Name', 'class'=>'form-control']) !!}<br>
				{!! Form::select('subjects[]', $subjectList, null, ['id'=>'selected', 'class'=>'form-control', 'multiple', 'data-placeholder' =>'Select a Subject(s)', 'style'=>'width: 100%']) !!}			
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