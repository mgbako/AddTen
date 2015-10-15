@extends('layouts.master')
 
@section('content')
	<div class="">
			
		<div class="panel panel-default">
			<div class="panel-heading"><h1><span id="counter"></span></h1>
				<div class="progress progress-striped active">
					<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					<div class="progressbar-label"></div>
				</div>
			</div>
			<div class="panel-body" id="quest">
				{!! Form::open(['route'=>'exams.store'])!!}
					<div class="list-of-post">
						@foreach($questions as $question)
							<div class="post">
								<h2>{!! $question->question !!}</h2>
								<ol class="radio">
									<li>{!! Form::radio($question->id, $question->option1, null, ['class'=>'progress']) !!} {!! $question->option1 !!}</li>
									<li>{!! Form::radio($question->id, $question->option2, null, ['class'=>'progress']) !!} {!! $question->option2 !!}</li>
									<li>{!! Form::radio($question->id, $question->option3, null, ['class'=>'progress']) !!} {!! $question->option3 !!}</li>
									<li>{!! Form::radio($question->id, $question->option4, null, ['class'=>'progress']) !!} {!! $question->option4 !!}</li>
								</ol>
							</div>
						@endforeach

						
						<nav class="paginate">
							
						</nav>
						<a class="btn btn-primary pull-left previousLink">Previous</a>
						<a class="btn btn-primary pull-right nextLink">Next</a>
						<h2 id="total"></h2>
						{!! Form::submit('Finish', ['class'=> 'btn btn-success finish', 'id'=>'finish'])!!}
					</div>
				{!!Form::close()!!}

				
			</div>
		</div>
	</div>	
@stop