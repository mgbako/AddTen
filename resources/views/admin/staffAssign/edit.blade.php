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
		<div class="row">
			<div class="col-md-6"><!-- /.box --><!-- /.box -->
			</div><!-- /.col --><!-- /.col -->
		</div><!-- /.row -->
		<div class="col-md-12">
			@include('errors.list')
		</div>{{-- End of Right side bar --}}

		<div class="row">
			<div class="col-xs-12">            
				<div class="box box-info">
					<div class="box-body">
						{!! Form::model($student, ['method'=>'patch', 'route'=>['students.update', $student->id], 'files' => true])!!}
						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('studentId', null, ['class'=>'form-control', 'placeholder'=>'Enter Student ID', 'disabled']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>	
								{!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'Enter First Name']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Enter Last Name']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], $student->gender, ['class'=>'form-control guiSelect'])!!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::input('date', 'dob', $student->dob, ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::input('tel', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Enter Phone Number']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Enter State of Origin']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('nationality', null, ['class'=>'form-control', 'placeholder'=>'Enter Nationality']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
								{!! Form::file('image', ['class'=>'form-control']) !!}
							</div>
						</div>
						
						<div class="col-md-6"><br>
							{!! Form::label('class', 'Select Starting Class') !!}
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::select('class', $classList, $student->class, ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="col-md-6">	<br>						<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Home Address', 'rows'=>3]) !!}
							</div>
						</div>


						<div class="col-md-6"><br>
							{!! Form::label('subject_list', 'Select Subjects to be Taken') !!}
							{!! Form::select('subject_list[]', $subjects, $str, ['id'=>'selected', 'class'=>'form-control', 'multiple']) !!}
						</div>
						
						<div class="col-md-12">
							<div class="box-footer">
								{!! Form::submit('Update Student', ['class'=>'btn btn-success pull-left']) !!}
								<a href="{{ route('students.index') }}" class="btn btn-default pull-right">Cancel</a>
							</div>
						</div>

						{!!Form::close()!!}
					</div>{{-- End of Box Box-body --}}
				</div>{{-- End of Box Box-info --}}
			</div>{{-- End of col-md-12 --}}
		</div><!-- End of row -->
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->
	
@stop