@extends('layouts.master')

@section('content')
	<div class="login-box">
      <div class="login-logo">
        <a href="index2.html">{!! Html::image('/img/logo.png', 'Add Ten') !!}<b>Add</b>Ten</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Who are you?<br><small>- Choose your login screen -</small></p>
        <div class="box-footer">
          <a href="auth/login">
            <button type="submit"  onClick=""class="btn btn-info pull-left"><i class="fa fa-group"></i> Staff</button>
            </a>
            <a href="auth/login">
            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-user"></i> Student</button>
          </a>
        </div><!-- /.box-footer -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection
