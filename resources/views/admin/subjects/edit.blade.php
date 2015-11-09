@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit
        <small>Subject Editing Process</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/subjects">Staffs</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-6"><!-- /.box --><!-- /.box -->
			</div><!-- /.col --><!-- /.col -->
		</div><!-- /.row -->
		{{-- End of Right side bar --}}

		<div class="row">
			<div class="col-xs-12">            
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-12">
							@include('errors.list')
						</div>
						{!! Form::model($subject, ['method'=>'patch','route'=>['subjects.update', $subject->id]])!!}
						<div class="form-group">
								{!! Form::text('name', null, ['placeholder'=>'Enter Subject Name', 'class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							{!!Form::submit('Update', ['class'=>'btn btn-primary form-control'])!!}
						</div>
						{!!Form::close()!!}
					</div>{{-- End of Box Box-body --}}
				</div>{{-- End of Box Box-info --}}
			</div>{{-- End of col-md-12 --}}
		</div><!-- End of row -->
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->

@stop