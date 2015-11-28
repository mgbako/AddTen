@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, <span>{{ ucwords($user->firstname) }}</span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>        
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Activities</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> Bio Data</a></li>
                @if(isset($assigned))
                  <li><a href=""><i class="fa fa-graduation-cap"></i> <b>Assigned Class</b></a>
                    <ul>
                      @foreach($assigned as $assignedClass)
                        <li><i class="fa fa-graduation-cap"></i> {{ \Scholrs\Classe::whereId($assignedClass->classe_id)->groupBy('name')->first()->name }}
                        </li>
                      @endforeach
                    </ul>
                  </li>

                  <li><a href="subjectev.html"><i class="fa fa-list-alt"></i> <b>Subjects Offered</b></a>
                    <ul class="">
                      @foreach($assignedSub as $assignedSubject)
                        <li><a href="{{ route('classes.subjects.questions.index', [$assignedSubject->classe_id, $assignedSubject->subject_id]) }}"><i class="fa fa-list-alt"></i> {{ \Scholrs\Subject::whereId($assignedSubject->subject_id)->first()->name }} - {{ \Scholrs\Classe::whereId($assignedSubject->classe_id)->groupBy('name')->distinct()->first()->name }}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                @endif

                <li><a href=""><i class="fa fa-file-text-o"></i> <b>Exam Hall</b> <span class="label label-primary pull-right">3</span></a>

                  
                  <ul class="nav nav-pills nav-stacked">
                    @unless($class)
                      @foreach($assigned as $assignedClass)
                        <li><a href="{{ route('classes.exams.index', [$assignedClass->classe_id]) }}"><i class="fa fa-graduation-cap"></i> {{ \Scholrs\Classe::whereId($assignedClass->classe_id)->first()->name }}</a>
                        </li>
                      @endforeach

                    @else
                      <li><a href="{{ route('classes.exams.index', [\Scholrs\Classe::whereName($class)->first()->id]) }}"><i class="fa fa-list-alt"></i> {{ $class }}</a>
                        </li>
                    @endunless
                  </ul>
                </li>
                
                @if($class)
                  <li><a href="results.html"><i class="fa fa-pie-chart"></i> Results</a></li>
                @endif
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /. box -->
        </div><!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata</h3>
              <div class="box-tools pull-right"></div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              
            <div class="alert alert-info alert-dismissable">
                <h4><i class="icon fa fa-check"></i> Note!</h4>
                Please go through and check if correct. <br> 
                Any correction?<br>Just print, highlight changes  and send copy to the Administrator as soon as possible. <br>
                Thank you.
            </div>
              
        <div class="col-xs-12 table-responsive">
                  <h1>
                    Candidate Details
                  </h1>
          <hr>   
        </div> 
        
        <div class="col-md-1">
<div class="col-sm-2 invoice-col">
        <div class="pull-left image">
          <img src="{{$user->image}}" alt="User Image" width="82" height="82" class="img-circle">
        </div>
          
</div> 
</div>            
        <div class="col-md-11">
              <dl class="dl-horizontal">
         
                <dt>Surname</dt>
                <dd>{{$user->firstname}}</dd>
                <dt>First Name</dt>
                <dd>{{$user->lastname}}</dd>
                <dt>Other Name</dt>
                <dd>C.</dd>
                <br><br>
                <dt>Student Id</dt>
                <dd>{{$user->userId}}</dd>
                <dt>Gender</dt>
                <dd>{{$user->gender}}</dd>
                <dt>Date of Birth</dt>
                <dd>{{$user->dob}}</dd>
                <dt>Country</dt>
                <dd>{{$user->nationality}}</dd>
                <br><br>
                <dt>Telephone</dt>
                <dd>{{$user->phone}}</dd>
                <dt>Adress</dt>
                <dd>{{$user->address}}</dd>
                
                <dt>Email Address</dt>
                <dd>{{$user->email}}</dd>
            </dl>
            
          
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="exam-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
        
       </div>
             <br><br>               
        </div>
        
        
              

              
              <div class="table-responsive mailbox-messages"><!-- /.table -->
              </div><!-- /.mail-box-messages -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
            </div>
          </div><!-- /. box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@stop