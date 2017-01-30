
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@section('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{URL::to('AdminLTE/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('AdminLTE/dist/css/bootstrap.css')}}">
  <style type="text/css">
    body{
      font-family: 'Source Sans Pro','Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    .navbar{
      background-color: #031d12;
    }
    .main-sidebar{
      background-color: #000000;
    }
  </style>
  @yield('stylesheets')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{URL::to('/cms')}}" class="logo hidden-xs" style="position: fixed; background-color: rgba(3, 29, 18, 0.86)">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Movies</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-fixed-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="position: fixed;">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"> -->

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form action="/logout" method="POST" id="logout-form">
                      {{csrf_field()}}
                      <a href="#" class="btn btn-default btn-flat" onclick="document.getElementById('logout-form').submit()">Logout</a>
                  </form>     
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="position: fixed;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Web Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{URL::to('/')}}" target="_blank"><i class="fa fa-circle-o"></i> Home | All-Movies</a></li>
            <li><a href="{{URL::to('/movies')}}" target="_blank"><i class="fa fa-circle-o"></i>Movies</a></li>
            <li><a href="{{URL::to('/animations')}}" target="_blank"><i class="fa fa-circle-o"></i>Animations</a></li>
            <li><a href="{{URL::to('/add_today')}}" target="_blank"><i class="fa fa-circle-o"></i>Added today</a></li>
            <li><a href="#" target=""><i class="fa fa-circle-o"></i>News</a></li>
            <li><a href="#" target=""><i class="fa fa-circle-o"></i>About</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tasks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('cms/movies')}}"><i class="fa fa-file-movie-o text-yellow"></i>Movies</a></li>
            <li><a href="{{URL::to('/cms/news')}}"><i class="fa fa-file-code-o"></i>News</a></li>
            <li><a href="{{URL::to('/genres')}}"><i class="fa fa-file-code-o"></i>Genres</a></li>
            <li><a href="{{URL::to('/cms/resolutions')}}"><i class="fa fa-file-code-o"></i>Resolutions</a></li>
            <li><a href="{{URL::to('/cms/statuses')}}"><i class="fa fa-file-code-o"></i>Statuses</a></li>
          </ul>
        </li>
        <li><a href="{{URL::to('/cms/slides')}}"><i class="fa fa-book"></i> <span>Slides</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-user-md text-aqua"></i> <span>Subscribers </span> </span><span class="pull-right-container"><small class="label pull-right bg-aqua">3</small></span></a></li>
        <li><a href="#"><i class="fa fa-trash text-red"></i> <span>Trash </span><span class="pull-right-container"><small class="label pull-right bg-red">3</small></span></a></li>
        <li><a href="#"><i class="fa fa-envelope-o text-warning"></i> <span>Repport Error </span> </span><span class="pull-right-container"><small class="label pull-right bg-orange">3</small></span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="clearfix"></div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

  <!--   <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section> -->

    <!-- Main content -->
    <section class="content">
      
      @yield('content')
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
    </div>
  </aside> -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{URL::to('AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{URL::to('AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('AdminLTE/dist/js/app.js')}}"></script>
<script src="{{URL::to('AdminLTE/dist/js/demo.js')}}"></script>
@yield('script')
</body>
</html>
