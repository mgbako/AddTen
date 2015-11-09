@extends('layouts.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Registration
			<small>Student Registration Process</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="dashboard.html">Dashboard</a></li>
			<li><a href="#">Student</a></li>
			<li><a href="stafflist.html">Student List</a></li>
			<li class="active">Registration</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="col-lg-12">
			<div class="panel panel-danger">
				<div class="panel-heading text-center"><h2>Are You sure You want to Delete {{$subject->name}}</h2></div>
				<div class="panel-body">
					{!!Form::open(['method'=>'delete', 'route' => ['classes.subjects.destroy', $id, $subject->id]]) !!}
						<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
						<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>
						<div class="form-group">{!! Form::hidden('id', $subject->id) !!}</div>

						<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->
		
@stop
