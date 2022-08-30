<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AFSHOP| Log in</title>

  {{--  <!-- Google Font: Source Sans Pro -->  --}}
  {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">  --}}
 
  {{--  <!-- Font Awesome -->  --}}
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  {{--  <!-- icheck bootstrap -->  --}}
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  {{--  <!-- Theme style -->  --}}
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <span style="color:rgb(28, 74, 41)">AF<span style="color:rgb(184, 48, 41)">SHOP</span> </span>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      @include('partial.message.success')
      @include('partial.message.error')

      <p class="login-box-msg">Sign in</p>
    
      
      {{--  login form  --}}
      <form action="{{ route('user.login') }}" method="post"> 
        @csrf
        <div class="input-group mb-3">
          <input name="email" type="text" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <div class="alert alert-warning fade show">
            <p>{{ $message }}</p>
            <button class="close" data-dismiss="alert">
              <span >&times;</span>
            </button>
        </div>
        @enderror
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="alert alert-warning fade show">
            <p>{{ $message }}</p>
            <button class="close" data-dismiss="alert">
              <span >&times;</span>
            </button>
        </div>
        @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('user.forgot_password_form') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('user.register_form') }}" class="text-center">Register a new account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
