@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, to <span>{{ ucwords($student->firstname) }} Biodata</span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/students">Students</a></li>
        <li class="active">{{ ucwords($student->firstname) }} Biodata</li>
      </ol>        
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <br>
            <div class="box-body no-padding">
              
            <div class="alert alert-info alert-dismissable">
                <h1>
                    Staff's Detail
                  </h1>
            </div>
           
        <div class="col-md-1">
<div class="col-sm-2 invoice-col">
        <div class="pull-left image">
          <img src="/{{$student->image}}" alt="User Image" width="82" height="82" class="img-circle">
        </div>
          
</div> 
</div>            
        <div class="col-md-11">
              <dl class="dl-horizontal">
         
                <dt>Surname</dt>
                <dd>{{$student->firstname}}</dd>
                <dt>First Name</dt>
                <dd>{{$student->lastname}}</dd>
                <dt>Other Name</dt>
                <dd>C.</dd>
                <br><br>
                <dt>Staff Id</dt>
                <dd>{{$student->teacherId}}</dd>
                <dt>Gender</dt>
                <dd>{{$student->gender}}</dd>
                <dt>Date of Birth</dt>
                <dd>{{$student->dob}}</dd>
                <dt>Country</dt>
                <dd>{{$student->nationality}}</dd>
                <br><br>
                <dt>Telephone</dt>
                <dd>{{$student->phone}}</dd>
                <dt>Adress</dt>
                <dd>{{$student->address}}</dd>
                
                <dt>Role</dt>
                <dd>{{$student->type}}</dd>
            </dl>
            
          
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{{ route('students.edit', $student->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-print"></i> Edit Staff</a>
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