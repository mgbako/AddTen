@extends('layouts.master')

@section('content')

	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit
        <small>Staff Updating Process</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/teachers">Staffs</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				@include('errors.list')
			</div>

			<div class="col-xs-12">            
	          <div class="box box-info">
	            <div class="box-body">
					<div class="row">
						{!! Form::model($teacher, ['method'=>'patch', 'route'=>['teachers.update', $teacher->id], 'files' => true])!!}
						
							
							<div class="col-md-6"><br>
				 				<div class="input-group">
				 					<span class="input-group-addon"><i class="fa fa-user"></i></span>
									{!! Form::text('teacherId', null, ['class'=>'form-control', 'placeholder'=>'Enter Staff ID', 'disabled']) !!}
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
									{!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], $teacher->gender, ['class'=>'form-control'])!!}
								</div>
							</div>

							<div class="col-md-6"><br>
								<div class="input-group">
									<div class="input-group-addon">
		                        		<i class="fa fa-calendar"></i>
		                     		 </div>
									{!! Form::input('date', 'dob', $teacher->dob, ['class'=>'form-control']) !!}
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
									{!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Your Address', 'rows'=>3]) !!}
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
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
									
									{!! Form::select('type', $types, $teacher->type, ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="col-md-6"><br>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
									{!! Form::file('image', ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="col-md-6"><br>
									{!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
							</div>

						{!!Form::close()!!}
					</div>{{-- End of Row --}}
		   		</div>{{-- End of box body --}}
		  	  </div>{{-- End of box info --}}
			</div>{{-- End of col-12 --}}
		</div>{{-- End of Row --}}
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->
@stop