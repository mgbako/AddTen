@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
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
	<section class="content">
		<div class="col-md-12">
	@include('errors.list')
</div>{{-- End of Right side bar --}}

		<div class="col-xs-12">            
              <div class="box box-info">
                
                <div class="box-body">

		<div class="row">
			<div class="col-md-12">

				{!! Form::open(['route'=>'teachers.store', 'files' => true])!!}
					
					<div class="col-md-6"><br>
		 				<div class="input-group">
		 					<span class="input-group-addon"><i class="fa fa-user"></i></span>
							{!! Form::text('teacherId', null, ['class'=>'form-control', 'placeholder'=>'Enter Staff ID']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>	
							{!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'Enter First Name']) !!}
						</div>
					</div>

					<div class="col-md-6"> <br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							{!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Enter Last Name']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
							{!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], '', ['class'=>'form-control'])!!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<div class="input-group-addon">
                        		<i class="fa fa-calendar"></i>
                     		 </div>
							{!! Form::input('date', 'dob', date('Y-m-d'), ['class'=>'form-control']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<div class="input-group-addon">
		                        <i class="fa fa-phone"></i>
		                    </div>
							{!! Form::input('tel', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Enter Phone Number']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
							{!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Home Address']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
							{!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Enter State of Origin']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
							{!! Form::text('nationality', null, ['class'=>'form-control', 'placeholder'=>'Enter Nationality']) !!}
						</div>
					</div>
				
					<div class="col-md-6"><br>
						{!! Form::label('type', 'Select Type of Staff') !!}
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
							
							{!! Form::select('type', $types, null, ['class'=>'form-control']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
							{!! Form::file('image', ['class'=>'form-control']) !!}
						</div>
					</div>

					<!-- <div class="col-md-6">
						<div class="form-group">
							{!! Form::label('classes', 'Select class To Take') !!}
							{!! Form::select('classes[]', $classes, null, ['class'=>'form-control', 'multiple']) !!}
						</div>
					</div>

					<div class="col-md-6"><br>
						<div class="form-group">
							{!! Form::label('subjects', 'Select Subjects To Take') !!}
							{!! Form::select('subjects[]', $subjects, null, ['class'=>'form-control', 'multiple']) !!}
						</div>
					</div> -->

					<div class="col-md-6"><br>
							{!! Form::submit('Add Teacher', ['class'=>'btn btn-primary form-control', 'placeholder'=>'Enter Option 3']) !!}
					</div>

				{!!Form::close()!!}
			</div>		
		</div>{{-- End of Row --}}
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->
@stop