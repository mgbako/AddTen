@extends('layouts.master')

@section('content')
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                <section class="content-header">
          <h1>
            Subject Question
            <small>Setup Assigned Subject against Time and Questions</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Subject</a></li>
            <li class="active">Subject Question</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="col-md-12">
            @include('errors.list')
          </div>
          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            
            <div class="box-body">
              {!! Form::open(['route'=>'subjectQuestions.store', 'files'=> true ])!!}
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label><i class="fa fa-list-alt"></i> Class List</label>
                      {!! Form::select('classe_id', $classList, null, ['id'=>'selected', 'class'=>'form-control']) !!}
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label><i class="fa fa-list-alt"></i> Subject List</label>
                      {!! Form::select('subject_id', $subjectList, null, ['id'=>'selected', 'class'=>'form-control']) !!}
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label><i class="fa fa-clock-o"></i> Time in Minute</label>
                      {!! Form::select('time', $time, null, ['id'=>'selected', 'class'=>'form-control']) !!}
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-default"><i class="fa fa-server"></i> Save</button>
            </div>
            {!!Form::close()!!}
          </div><!-- /.box -->

          <div class="row">
            <div class="col-md-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Table</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table width="92%" class="table table-hover">
                    <tr>
                      <th width="4%">S/N</th>
                      <th width="23%">Class</th>
                      <th width="13%">Stubject Code</th>
                      <th width="25%">Action</th>
                      <th width="18%">Status</th>
                      <th width="17%">Progress</th>
                    </tr>
                    @foreach($subjectquestionstatus as $subjectquestionstatus)
                      <tr>
                        <td>{{$count++}}</td>
                        <td>{{ Scholrs\Classe::where('id', $subjectquestionstatus->classe_id)->first()->name}}</td>
                        <td>{{ Scholrs\Subject::where('id', $subjectquestionstatus->subject_id)->first()->name}}</td>
                        <td><a href="{{ route('classes.subjects.questions.index', [$subjectquestionstatus->classe_id, $subjectquestionstatus->subject_id]) }}"><i class="fa fa-book"></i> Edit</a> | 
                          <a href="{{ route('subjectQuestions.delete', [$subjectquestionstatus->classe_id, $subjectquestionstatus->subject_id]) }}"><i class="fa fa-remove"></i> Delete</a> | 
                          <a href="{{ route('classes.subjects.questions.index', [$subjectquestionstatus->classe_id, $subjectquestionstatus->subject_id]) }}"><i class="fa fa-eye"></i> View</a> | 
                          <a href=""><i class="fa fa-database"></i> Submit</a></td>
                        <td>
                          <div class="progress progress-xs progress-striped">
                            <input type="hidden" id="percentage" value="{{ Scholrs\Question::Percentage($subjectquestionstatus->classe_id, $subjectquestionstatus->subject_id)->get()->count() }}">
                            <div class="progress-bar" style="width:{{ Scholrs\Question::Percentage($subjectquestionstatus->classe_id, $subjectquestionstatus->subject_id)->get()->count() }}%"></div>
                          </div>
                        </td>
                        <td><span id="progress" class="label"></span></td>
                      </tr>
                      @endforeach
                  </table>
                </div><!-- /.box-body -->

            </div><!-- /.col (left) -->
            <div class="col-md-6"><!-- /.box -->

              <!-- iCheck --><!-- /.box -->
            </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop