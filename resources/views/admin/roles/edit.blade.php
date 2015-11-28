@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit
			<small>Class Editing Process</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="/classes">Classes</a></li>
			<li class="active">Edit</li>
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
						{!! Form::model($class, ['method'=>'patch','route'=>['classes.update', $class->id]])!!}
							<div class="form-group">
								{!! Form::text('name', null, ['placeholder'=>'Enter Subject Name', 'class'=>'form-control']) !!}
							</div>

							<div class="form-group">
								{!!Form::submit('Update', ['class'=>'btn btn-success'])!!}
							</div>
						{!!Form::close()!!}
					</div>{{-- End of Box Box-body --}}
				</div>{{-- End of Box Box-info --}}
			</div>{{-- End of col-md-12 --}}
		</div><!-- End of row -->
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->

@stop