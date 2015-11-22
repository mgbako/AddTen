@extends('layouts.master')

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Subject Analysis
      <small>preview of each subject list</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/">Dashboard</a></li>
      <li class="active">Subject Analysis</li>
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
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table width="741%" class="table table-hover">
              <tr>
                <th>Stubject</th>
                <th>Class</th>
                <th>Action</th>
                <th>Time</th>
                <th>Progress</th>
                <th>Remarks</th>
              </tr>
              @foreach($subjectAnalysis as $subjectAnalysis)
                <tr>
                  <td>{{ Scholrs\Subject::where('id', $subjectAnalysis->subject_id)->first()->name}}</td>
                  <td>{{ Scholrs\Classe::where('id', $subjectAnalysis->classe_id)->first()->name}}</td>
                  <td>
                        <a href="{{ route('classes.subjects.questions.index', [$subjectAnalysis->classe_id, $subjectAnalysis->subject_id]) }}"><i class="fa fa-eye"></i> View</a> | 
                        <a href="{{ route('subjectQuestions.delete', [$subjectAnalysis->classe_id, $subjectAnalysis->subject_id]) }}"><i class="fa fa-remove"></i> Delete</a> | 
                        <a href=""><i class="fa fa-database"></i> Approve</a>
                  </td>
                  <td>{{ $subjectAnalysis->time }} minutes</td>
                  <td><span class="progressStatus label"></span></td>
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