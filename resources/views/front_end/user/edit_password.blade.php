<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AFSHOP| change password</title>
  
    {{--  <!-- Google Font: Source Sans Pro -->  --}}
    {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">  --}}
   
    {{--  <!-- Font Awesome -->  --}}
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
    {{--  <!-- icheck bootstrap -->  --}}
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  
    {{--  <!-- Theme style -->  --}}
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css') }}">
  </head>
  

<body class="hold-transition register-page">
<div class="register-box">
  <div class="login-logo">
    <span style="color:rgb(28, 74, 41)">AF<span style="color:rgb(184, 48, 41)">SHOP</span> </span>
   </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Change Password</p>
        {{--  show login errors  --}} 
      @include('partial.message.error')
      @include('partial.message.success')
      
      <form action="{{ route('user.update_password') }}" method="post">
        @method('put')
        @csrf 
        <div class="input-group mb-3">
          <input type="password" name="current_password" class="form-control" placeholder="Current Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('current_password')
        <div class="alert alert-warning fade show">
            <p>{{ $message }}</p>
            <button class="close" data-dismiss="alert">
              <span >&times;</span>
            </button>
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="new_password" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('new_password')
        <div class="alert alert-warning fade show">
            <p>{{ $message }}</p>
            <button class="close" data-dismiss="alert">
              <span >&times;</span>
            </button>
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('confirm_password')
        <div class="alert alert-warning fade show">
            <p>{{ $message }}</p>
            <button class="close" data-dismiss="alert">
              <span >&times;</span>
            </button>
        </div>
        @enderror
        <div class="row">
         
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
