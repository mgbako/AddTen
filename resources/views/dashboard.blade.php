@extends('layouts.master')

@section('content')
	<div class="container">
    <div class="row">
      <!-- Class Subject -->
      <div class="col-lg-2">
        <h2>Questions</h2>
        @foreach($classes as $classe)
          <li>{{ $classe->name}}
            <ul>
              @foreach($subjects as $subject)
                <li>{!! link_to_route('classes.subjects.questions.index', [$classe_id, $subject_id]) !!}</li>
                <li><a href="/questions?class={{$classe->name}}&subject={{$subject->name}}">{{ $subject->name }}</a></li>
              @endforeach
            </ul>
          </li>
        @endforeach
      </div>
      <!-- Exams  -->
      <div class="col-lg-2">
        <h2>Exams</h2>
        @foreach($classes as $classe)
          <li>{{ $classe->name}}
            <ul>
              @foreach($subjects as $subject)
                <!-- <li>{!! link_to_route('questions.index', $classe->name, $classe->name) !!}</li> -->
                <li><a href="/exams?class={{$classe->name}}&subject={{$subject->name}}">{{ $subject->name }}</a></li>
              @endforeach
            </ul>
          </li>
        @endforeach
      </div>

    </div>

  </div>
@stop