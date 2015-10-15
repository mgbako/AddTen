@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, <span>Admin</span>
      </h1>
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="dashboard.html">Dashboard</a></li>
        <li><a href="Profile.html">Profile</a></li>
        <li class="active">Results</li>
      </ol>        
  	</section>

	<div class="col-lg-12">
		<div class="panel panel-default">
		<div class="panel-heading text-center"><h1>All Teachers</h1></div>
		<div class="panel-body">
		{!! link_to_route('teachers.create', 'Add New Teacher', '', ['class'=>'btn btn-primary']) !!}
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>#</th>
					<th class="shrink">Image</th>
					<th>Student ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Home Address</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			
			@foreach($teachers as $teacher)
				<tbody>
					<td>{!! $count++ !!}</td>
					<td><img src="{{ $teacher->image }}" class="img-round profile" alt="User Image"></td>
					<td>{!! $teacher->teacherId !!}</td>
					<td>{!! $teacher->firstname !!}</td>
					<td>{!! $teacher->lastname !!}</td>
					<td>{!! $teacher->phone !!}</td>
					<td>{!! $teacher->gender!!}</td>
					<td>{!! $teacher->address !!}</td>
					<td>{!! link_to_route('teachers.edit', 'Edit', $teacher->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
					<td>{!! link_to_route('teachers.delete', 'Delete', $teacher->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
				</tbody>
			@endforeach
	
		</table>
		</div>
		</div>{{-- end of --}}
	</div>
</div><!-- End of Content Wrapper. Contains page content -->
	
@stop