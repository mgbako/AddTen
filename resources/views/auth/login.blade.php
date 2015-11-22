@extends('layouts.master')

@section('content')
	<div class="login-box">
      <div class="login-logo">
        <a href="index2.html">{!! Html::image('/img/logo.png', 'Add Ten') !!}<b>Add</b>Ten</a>
      </div><!-- /.login-logo -->
      <div class="col-md-12">
          @include('errors.list')
      </div>

      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <form role="form" method="POST" action="{{ url('/auth/login') }}">
  		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
            	<input type="text" class="form-control" name="userId" value="{{ old('userId') }}" placeholder="User Id">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" name="remember"> Remember Me
                  </label>
                </div>
              </div><!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div><!-- /.col -->
            </div>
          </form><!-- /.social-auth-links -->

        <a href="{{ url('/password/email') }}">I Forgot Your Password?</a><br>
        <a href="{{ url('/auth/register') }}" class="text-center">Register a as new member</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection