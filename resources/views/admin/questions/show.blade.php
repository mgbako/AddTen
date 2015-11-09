@extends('layouts.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Delete
			<small>Question Deleting Process</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{ route('classes.subjects.questions.index', [$classe_id, $subject_id]) }}">Questions</a></li>
			<li class="active">Show</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="col-xs-12">            
			<div class="box box-info">	
				<div class="box-body">
	<div class="panel panel-default">
		<div class="panel-heading"><h1>Question</h1></div>
		<div class="panel-body">
			<h3>{!! link_to_route('classes.subjects.questions.edit', $question->question, [$classe_id, $subject_id, $question->id] ) !!}</h3>
			<hr>
			<h5>{!! $question->option1 !!}</h5><hr>
			<h5>{!! $question->option2 !!}</h5><hr>
			<h5>{!! $question->option3 !!}</h5><hr>
			<h5>{!! $question->option4 !!}</h5><hr>
			{!! link_to_route('classes.subjects.questions.delete', 'Delete', 
			[$classe_id, $subject_id, $question->id], 
			['class'=>'btn btn-danger pull-right']) !!}
		</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop
