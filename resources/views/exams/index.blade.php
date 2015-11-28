@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Welcome, <span>Admin</span>
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
            <div class="col-md-3">
                <div class="box box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Activities</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="profile.html"><i class="fa fa-user"></i> Bio Data</a></li>
                            <li><a href="subjectev.html"><i class="fa fa-list-alt"></i> Subjects Offered</a></li>
                            <li class="active"><a href="examev.html"><i class="fa fa-file-text-o"></i> Exam Hall <span class="label label-primary pull-right">3</span></a></li>
                            <li><a href="results.html"><i class="fa fa-pie-chart"></i> Results</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header with-border">

                       <div class="alert alert-warning alert-dismissable">
                            <h4><i class="icon fa fa-warning"></i> Note!</h4>
                            You have entered the Exam Hall. <br> 
                            Please observe <b><u>ALL</u></b> Exam Rules and Regulations.<br>
                            Thank you.
                       </div>
                         
                    @if($user->type == ucfirst("student"))     
                        @foreach($subjects as $subject)
                          <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title">{{ $subject->name }}</h3>
                              <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              The exam scripts of this exam is ready. click on the link to continue. <br> <a href="{{ route('classes.subjects.exams.show', [$classe_id, $subject->id])}}">Start</a>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        @endforeach
                    @else

                        @foreach($subjectAssigneds as $subjectAssigned)
                          <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title">{{ Scholrs\Classe::whereId($classe_id)->first()->name}} - {{ Scholrs\Subject::whereId($subjectAssigned->subject_id)->first()->name}}</h3>
                              <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              The exam scripts of this exam is ready. click on the link to continue. <br> <a href="{{ route('classes.subjects.exams.show', [$classe_id, $subjectAssigned->subject_id])}}">Start</a>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        @endforeach

                    @endif
                    </div>
                </div>
                <!-- /. box -->
                <div class="box-footer no-padding">
                	
                </div>
            </div>
            <!-- /.col 9-->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@stop