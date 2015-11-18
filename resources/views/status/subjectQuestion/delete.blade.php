@extends('layouts.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Delete
			<small>Staff Deleting Process</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="/teachers">Staffs</a></li>
			<li class="active">Delete</li>
		</ol>
	</section>
	<section class="content">
		<div class="col-xs-12">            
			<div class="box box-info">	
				<div class="box-body">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2>Are You sure You want to Delete the Assigned Class Subject:</h2>
							<hr>
							<h4> {{ Scholrs\Classe::whereId($classeId)->first()->name }} {{ Scholrs\Subject::whereId($subjectId)->first()->name }}</h4>
							<hr>

							{!!Form::open(['method'=>'delete', 'route' => ['subjectQuestions.destroy', $classeId]]) !!}
								<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
								<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>
								{!! Form::hidden('subjectId', $subjectId) !!}

								<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger')) !!}</div>
							{!!Form::close()!!}

					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop
