<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Movies</title>
<!--Custom Theme files-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Login" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="{{URL::to('AdminLTE/login/css/style.css')}}">
<link rel="stylesheet" href="{{URL::to('AdminLTE/dist/css/bootstrap.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
</head>
<body>
  <!-- main -->
  <div class="main">
    {!! Session::get('message') !!}

            @if(session('error'))
          <div class="row">{!!session('error')!!}</div>
            @endif    
    <div class="signin-form">
      <img src="{{asset('AdminLTE/login/css/logo.png')}}" alt="" width="100" class="center-block">
      <hr>      
      <form action="/login" method="POST">
        {{csrf_field() }}
        <input class="form-control" type="text" placeholder="Email" name="email" required="">
        <input class="form-control" type="password" placeholder="Password" name="password" required="">
        <input type="submit" value="Sign In">
      </form>
      <div class="signin-text">
        <div class="text-left">
          <p><a href="#"> Forgot Password? </a></p>
        </div>
        <div class="text-right">
          <p><a href="#"> Create New Account</a></p>
        </div>
        <div class="clear"> </div>
      </div>
      <h5>- OR -</h5>
      <div class="panel">
        <a href="{{URL::to('/')}}" class="form-control btn" type="button" name="">Return HomePage</a>
      </div>
    </div>
  </div>
  <!-- //main -->
  <div class="copyright">
    <p> &copy; 2017 All rights reserved</p>
  </div>
  <script src="{{URL::to('AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>