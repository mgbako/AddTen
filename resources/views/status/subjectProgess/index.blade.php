@extends('layouts.master')

@section('content')
     


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subject Progress
        <small>preview of each subject list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li class="active">Subject Progress</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6"><!-- /.box --><!-- /.box -->
        </div><!-- /.col --><!-- /.col -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
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
              <table width="741%" class="table table-hover">
                <tr>
                  <th>Staff ID</th>
                  <th>Staff Name</th>
                  <th>Stubject</th>
                  <th>Class</th>
                  <th>Progress</th>
                  <th>Status</th>
                  <th>Remarks</th>
                </tr>

                @foreach($subjectProgess as $subjectProgess)
                <tr>
                  <td>{{ Scholrs\Teacher::whereId($subjectProgess->teacher_id)->first()->teacherId }}</td>
                  <td>{{ Scholrs\Teacher::whereId($subjectProgess->teacher_id)->first()->lastname }} {{ Scholrs\Teacher::whereId($subjectProgess->teacher_id)->first()->firstname }}</td>
                  <td>{{ Scholrs\Subject::where('id', $subjectProgess->subject_id)->first()->name}}</td>
                  <td>{{ Scholrs\Classe::where('id', $subjectProgess->classe_id)->first()->name}}</td>
                  <td><span class="progressStatus label"></span></td>
                  <td>
                    <div class="progress progress-xs progress-striped">
                      <input type="hidden" id="percentage" value="{{ Scholrs\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() }}">
                      <div class="progress-bar" style="width:{{ Scholrs\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() }}%"></div>
                    </div>
                  </td>
                  <td class="remarks">Done.</td>
                </tr>
                @endforeach
                
              </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div><!-- /.box -->
        </div>
      </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@stop