@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			General Roles<small>Everybody has a role to play</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Role</li>
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
						<table class="table table-bordered table-striped table-responsive text-center" id="example1">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">First Name</th>
									<th class="text-center">Last Name</th>
									<th class="text-center">ID No.</th>
									<th class="text-center">Role</th>
									<th class="text-center">Remove</th>
								</tr>
							</thead>
							<tbody>
								@foreach($roles as $role)
						
								{!! Form::open(['route'=> ['roles.destroy', $role->role_id] ]) !!}
									<tr>
										{!! Form::hidden('user', $role->user_id) !!}
										{!! Form::hidden('role', $role->role_id) !!}
										<td>{{ $count++ }}</td>
										<td>{{ Scholrs\User::where('id', $role->user_id)->first()->firstname}}</td>
										<td>{{ Scholrs\User::where('id', $role->user_id)->first()->lastname}}</td>
										<td>{{ Scholrs\User::where('id', $role->user_id)->first()->userId}}</td>
										<td>{{ Scholrs\Role::where('id', $role->role_id)->first()->name}}</td>
										<td><button type="submit" class="btn btn-danger">X</button></td>
										
									</tr>
								{!!Form::close()!!}
								@endforeach
							</tbody>
						</table>
					</div><!-- Box Body-->
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
	        <h4 class="modal-title" id="myModalLabel">Add New Role to User</h4>
	      </div>
	      <div class="modal-body">
	        {!! Form::open(['route'=> ['roles.store'] ]) !!}

	        	<div class="form-group">
				{!! Form::select('user_id', $userList, null, ['id'=>'seleteId', 'class'=>'form-control', 'multiple', 'data-placeholder' =>'Select User', 'style'=>'width: 100%']) !!}
				</div>
				<div class="form-group">
				{!! Form::select('role_id[]', $roleList, null, ['id'=>'selected', 'class'=>'form-control', 'multiple', 'data-placeholder' =>'Select a Role', 'style'=>'width: 100%']) !!}	</div>	
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