 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Ten</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.print.css') }}" media="print">

	<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">

	<!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link href="{{ asset('dist/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css">
     
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">

     <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- iCheck for checkboxes and radio inputs -->
    
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- iCheck -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link rel="icon" href="{{ asset('/img/logoo3.png') }}" type="image/x-icon">
	<link rel="shortcut icon" href="{{ asset('/img/logoo3.png') }}" type="image/png" />

	<link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
</head>

@if(Request::is('auth/login'))
<body  class="login-page">
@else
<body class="skin-blue sidebar-mini">
@endif
	@unless(Request::is('auth/login'))
	 <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>10</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="{{ asset('/img/logo.png') }}" alt="Add Ten" /><b>Add</b>Ten</span>
        </a>

        @unless(Auth::guest())
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/{{$user->image}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->firstname }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <img src="/{{$user->image}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->firstname }}
                      <small>School Admin</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
        @endunless
      </header>
	@endunless

	@if(Session::has('message'))
		<div class="text-center">
			{!! Session::get('message') !!}
		</div>
	@endif


	<div class="container-fluid">
		<div class="row">
			@unless(Auth::guest())
			 <!-- Left side column. contains the logo and sidebar -->
		      <aside class="main-sidebar">
		        <!-- sidebar: style can be found in sidebar.less -->
		        <section class="sidebar">
		          <!-- sidebar menu: : style can be found in sidebar.less -->
		          <ul class="sidebar-menu">
		            <li class="header">MAIN NAVIGATION</li>
		            <li class="active">
		              <a href="{{ route('index') }}">
		                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		              </a>
		            </li>
		            
		            <li>
		              <a href="{{ route('profile.index') }}">
		              <i class="fa fa-user"></i> <span>Profile ( {{$user->type }} )</span>
		              </a>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-group"></i> <span>Staffs</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('staffAssign.index') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i>All Staffs</a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-graduation-cap"></i> <span>Students</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
		                <li><a href="{{ route('students.index') }}"><i class="fa fa-circle-o"></i> All Students </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-graduation-cap"></i> <span>Classes</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
		                <li><a href="{{ route('classes.index') }}"><i class="fa fa-circle-o"></i> All Classes </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-list-alt"></i> <span>Subject</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Subject Analysis</a></li>
		                <li><a href="{{ route('subjectAssigned.index') }}"><i class="fa fa-circle-o"></i> Subject Assigned</a></li>
		                <li><a href="{{ route('subjects.index') }}"><i class="fa fa-circle-o"></i> Subject List</a></li>
		                <li><a href="{{ route('subjects.index') }}"><i class="fa fa-circle-o"></i> Subject Progress</a></li>
		                <li><a href="{{ route('subjectQuestions.index') }}"><i class="fa fa-circle-o"></i> Subject Question</a></li>
		                <li><a href="{{ route('subjectReceptions.subjectReception') }}"><i class="fa fa-circle-o"></i> Subject Reception</a></li>
		              </ul>
		            </li>
		            <li>
		              <a href="{{ route('teachers.index') }}">
		              <i class="fa fa-pie-chart"></i> <span>Results</span>
		              </a>
		            </li>
		            <li class="treeview">
		              <a href="#">
		              <i class="fa fa-gears"></i> <span>Settings</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> School</a></li>
		                <li><a href=""><i class="fa fa-circle-o"></i> Exam</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Password</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Questions</a></li>
		                <li class="active"><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Role</a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-folder"></i> <span>Others</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Login</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Register</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
		              </ul>
		            </li>
		          </ul>
		        </section>
		        <!-- /.sidebar -->
		      </aside>
			@endunless
			
		</div>
	</div>

	<div>
		@yield('content') 
	</div>
	
	</div><!-- ./wrapper -->
		

	<!-- Scripts -->
	<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('s/dist/js/demo.js') }}"></script>
    <script src="{{ asset('/js/dropzone.js') }}"></script>
	<script src="{{ asset('/plugins/iCheck/icheck.min.js') }}"></script>
	<script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/js/countdown.jquery.js')}}"></script>
	<script src="{{ asset('/js/paginate2.js')}}"></script>
	<script src="{{ asset('/js/progressBar.js')}}"></script>
	<script src="{{ asset('/js/custom.js')}}"></script>
	<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
