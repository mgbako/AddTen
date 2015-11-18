@extends('layouts.master')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
            <section class="content-header">
      <h1>
        Assign Subject
        <small>Staff against Subject of a particular Class</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/teachers">Staff</a></li>
        <li class="active">Subject Assigned</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        {!! Form::open(['route'=>'subjectAssigned.store'])!!}
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="teacher_id"><i class="fa fa-building"></i> Staff </label>
                <select class="form-control" data-placeholder="Select Staff" style="width: 100%;" name="teacher_id">
                  @foreach($staff as $staffs)
                    <option value="{{ $staffs->id }}">{{ $staffs->lastname}} {{ $staffs->firstname }}</option>
                  @endforeach
                </select>
              </div><!-- /.form-group -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <div class="form-group">
                <i class="fa fa-list-alt"></i> {!! Form::label('classe_id', 'Class') !!}
                {!! Form::select('classe_id', $classList, null, ['class'=>'form-control', 'data-placeholder'=>'Select Class', 'style'=>'width: 100%']) !!}
              </div><!-- /.form-group -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <div class="form-group">
                <i class="fa fa-list-alt"></i> {!! Form::label('subject_id', 'Subjects') !!}
                {!! Form::select('subject_id', $subjectList, null, ['id'=>'selected', 'class'=>'form-control', 'multiple', 'data-placeholder'=>'Select Subject', 'style'=>'width: 100%']) !!}
              </div><!-- /.form-group -->
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-list-alt"></i> Assign</button>
        </div>
        {!! Form::close() !!}
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
              <table width="741%" class="table table-hover">
                <tr>
                  <th>Staff ID</th>
                  <th>Staff Name</th>
                  <th>Stubject Assigned</th>
                  <th>Class Assigned</th>
                </tr>
                @foreach($subjectAssigned as $subjectAssigned)
                  <tr>
                    <td>{{ Scholrs\Teacher::whereId($subjectAssigned->teacher_id)->first()->teacherId }}</td>
                    <td>{{ Scholrs\Teacher::whereId($subjectAssigned->teacher_id)->first()->lastname }} {{ Scholrs\Teacher::whereId($subjectAssigned->teacher_id)->first()->firstname }}</td>
                    <td>{{ Scholrs\Subject::whereId($subjectAssigned->subject_id)->first()->name }}</td>
                     <td>{{ Scholrs\Classe::whereId($subjectAssigned->classe_id)->first()->name }}</td>
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
          </div><!-- /.box --><!-- /.box -->

        </div><!-- /.col (left) -->
        <div class="col-md-6"><!-- /.box -->

          <!-- iCheck --><!-- /.box -->
        </div><!-- /.col (right) -->
      </div><!-- /.row -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@stop