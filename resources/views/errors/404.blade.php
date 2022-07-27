<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@section('title') afshop @show</title>

  
  {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">  --}}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  {{--  <!-- Theme style -->  --}}
  <link rel="stylesheet" href="{{ asset(' plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
  <link rel="stylesheet" href="{{ asset(' plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
  <link rel="stylesheet" href="{{ asset(' plugins/datatables-buttons/css/buttons.bootstrap4.min.css ') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }} ">
  
  {{--  custom style  --}}
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
</head>
<body>
  


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>404 Error Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">404 Error Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 404</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

        <p>
          We could not find the page you were looking for.
          Meanwhile, you may <a href="{{ route('admin.layout') }}">return dashboard</a> 
        </p>

       
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>
