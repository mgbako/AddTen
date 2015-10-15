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
		<div class="panel panel-danger">
			<div class="panel-heading text-center"><h2>Are You sure You want to Delete {{$subject->name}}</h2></div>
			<div class="panel-body">
				{!!Form::open(['method'=>'delete', 'route' => ['subjects.destroy', $subject->id]]) !!}
					<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
					<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>
					<div class="form-group">{!! Form::hidden('id', $subject->id) !!}</div>

					<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger pull-right')) !!}</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
@stop
