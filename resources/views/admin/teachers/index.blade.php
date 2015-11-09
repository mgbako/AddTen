@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Staffs
            <small>All Staffs</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Staffs</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            	{!! link_to_route('teachers.create', "Add New", '', ['class'=>'btn btn-success']) !!}
              <p>&nbsp;</p>
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
              
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div align="center">
                    <table align="center" class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Surname</th>
                          <th>ID No.</th>
                          <th>Role</th>
                          <th>Edit</th>
						              <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($teachers as $teacher)
                      	<tr>
            							<td>{!! $count++ !!}</td>
            							<td>{!! $teacher->firstname !!}</td>
            							<td>{!! $teacher->lastname !!}</td>
            							<td>{!! link_to_route('teachers.show', $teacher->teacherId, $teacher->id)  !!}</td>
            							<td>{!! $teacher->type !!}</td>
            							<td>{!! link_to_route('teachers.edit', 'Edit', $teacher->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
            							<td>{!! link_to_route('teachers.delete', 'Delete', $teacher->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
            						</tr>
            						@endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Surname</th>
                          <th>ID No.</th>
                          <th>Role</th>
                          <th>Edit</th>
						              <th>Delete</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop