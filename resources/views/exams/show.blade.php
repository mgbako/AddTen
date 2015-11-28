@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Welcome, <span>{{ $user->lastname}} {{ $user->firstname}} </span>
		</h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/profile">Profile</a></li>
            <li class="active">Exam Hall</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        @if(count($questions) > 0)
                        <div class="alert alert-danger alert-dismissable">
                            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                            <p><strong><u>DO NOT REFRESH THIS PAGE...</u></strong></p>
                            <p>Follow ALL Exam Insturctions while seated in the examination hall. Remember you are TIMED.
                                <br> Any question? Ask the exam invegilator for help.
                                <br> Thank you.
                            </p>
                        </div>
                        <div class="col-md-12">

                            <div class="box-header with-border">

                                <h3 class="box-title">Subject Name</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="col-md-3 col-sm-6 col-xs-6 text-center pull-right">
                                <input type="text" class="knob" value="30" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#3c8dbc" data-readonly="true">
                                <div class="knob-label">
                                    <h3>Count Down</h3></div>
                            </div>
                            <!-- ./col -->

                            <div class="box-body">
                                <dl>
                                    <dt>
										<div class="col-md-3 col-sm-6 col-xs-6 text-center pull-left">
											<input type="text" class="knob" data-skin="tron"  data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#00a65a" data-readonly="true">
											<div class="knob-label">
												<h3 class="number">Number</h3>
											</div>
										</div><!-- ./col -->
									</dt>
                                </dl>
                                <div class="form-group">
                                    <div class="item col-lg-12">
										<div class="panel-body" id="quest">
											
											<input type='hidden' id='current_page' />  
											<input type='hidden' id='show_per_page' />

								            {!! Form::open(['route'=>'classes.subjects.exams.store', $classe_id, $subject_id])!!}
                                            {!! Form::hidden('classe_id', $classe_id) !!}
                                            {!! Form::hidden('subject_id', $subject_id) !!}
								            <div id="content">

                                                
    								                @foreach($questions as $question)
        								                <div class="post">
        								                    <p class="message" id="compose-textarea" style="height: 100px">{!! $question->question !!}</p>
        								                    <hr>
        								                    <div class="form-group">
        	  													<dt>Answers</dt>
        									                    <ol class="radio">
        									                        <li>{!! Form::radio($question->id, $question->option1, null, ['class'=>'progress', "id"=>"optionsRadios1"]) !!} {!! $question->option1 !!}</li>
        									                        <li>{!! Form::radio($question->id, $question->option2, null, ['class'=>'progress', 'id'=> "optionsRadios2"]) !!} {!! $question->option2 !!}</li>
        									                        <li>{!! Form::radio($question->id, $question->option3, null, ['class'=>'progress', 'id'=> "optionsRadios3"]) !!} {!! $question->option3 !!}</li>
        									                        <li>{!! Form::radio($question->id, $question->option4, null, ['class'=>'progress', 'id'=> "optionsRadios4"]) !!} {!! $question->option4 !!}</li>
        									                    </ol>
        								                	</div>
        								                </div>
    								                @endforeach  
                                                
								            </div>

								            <div class="modal-footer">
												<h1><span id="counter"></span></h1>
									            <div class="progress progress-striped active">
									                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									                <div class="progressbar-label"></div>
									            </div>
								            	<nav id='page_navigation'>
								                	
								                </nav>

								            </div>
								            	<p>{!! Form::submit('Finish', ['class'=> 'btn btn-success finish', 'id'=>'finish'])!!}</p>
								            {!!Form::close()!!}
								        </div>
                                    </div>
                                </div><!-- Form Group -->
                            </div>

                        </div>
                        @else
            
                            <h1 class="text-center">No Questions </h1>

                        @endif 
                    </div>
                </div>
                <!-- /. box -->
                <div class="box-footer no-padding">
                	
                </div>
            </div>
            <!-- /.col 12-->

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@stop