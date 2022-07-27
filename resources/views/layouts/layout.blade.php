<!DOCTYPE html>
<html lang="en">
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
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
 

  {{--  inlcude navbar  --}}
  @include('layouts.navbar')

  {{--  include sitebar  --}}
  @include('layouts.sitebar')


  {{--  <!-- Content Wrapper. Contains page content -->  --}}
  <div class="content-wrapper">
    


    <!-- Main content -->
    <section class="content">

      {{--  <!-- Default box -->  --}}
      <div class="card">
        <div class="card-header">
          @include('partial.message.success')
          @include('partial.message.error')
        
          <h3 class="card-title">@yield('content_header')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">

         
          @yield('content_body')
        </div>
        {{--  <!-- /.card-body -->  --}}
        <div class="card-footer">

          @yield('content_footer')
        </div>
        {{--  <!-- /.card-footer-->  --}}
      </div>

      {{--  <!-- /.card -->  --}}


    </section>
    {{--  <!-- /.content -->  --}}
  </div>
  {{--  <!-- /.content-wrapper -->  --}}






  @includeIf('layouts.footer')




  {{--  <!-- Control Sidebar   --}}
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
   {{--  /.control-sidebar   --}}


</div>

{{--  ./wrapper   --}}











{{--   jQuery  --}}
{{--  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>  --}}
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>

 {{--  Bootstrap 4   --}}
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

{{--  <!-- DataTables  & Plugins -->  --}}
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js ') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js ') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js ') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js ') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js ') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js  ') }}"></script>

{{--  AdminLTE App   --}}
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
 {{--  AdminLTE for demo purposes   --}}
<script src="{{ asset('assets/js/demo.js')}}"></script>
{{--  custome js file  --}}
<script src="{{ asset('assets/js/script.js')}}"></script>
@yield('script')
</body>
</html>
