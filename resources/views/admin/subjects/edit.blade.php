@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration
        <small>Staff Registration Process</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="dashboard.html">Dashboard</a></li>
        <li><a href="#">Staffs</a></li>
        <li><a href="stafflist.html">Staff List</a></li>
        <li class="active">Registration</li>
      </ol>
    </section>
    <div class="col-lg-12">
		@include('errors.list')
	</div>
	<div class="col-lg-12">		
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>Edit: {!! $subject->name !!} </h1></div>
			<div class="panel-body">
				{!! Form::model($subject, ['method'=>'patch','route'=>['subjects.update', $subject->id]])!!}
				<div class="form-group">
						{!! Form::text('name', null, ['placeholder'=>'Enter Subject Name', 'class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!!Form::submit('Update', ['class'=>'btn btn-primary form-control'])!!}
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
@stop