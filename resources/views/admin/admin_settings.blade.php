@extends('layouts\layout')
@section('content_title')
    Admin setting

@endsection

@section('content_header')
  Change password

 

  
    
@endsection

@section('content_body')
     <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <div class="col-md-6">

            <!-- general form elements -->
            
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.update') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >name</label>
                    <input type="name" name="name" class="form-control"   value="{{ Auth::guard('admin')->user()->name }}">
                  </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" name="email" class="form-control"  readonly value="{{ Auth::guard('admin')->user()->email }}">
                  </div>

                  <div class="form-group">
                    <label >Current Password</label>
                    <input type="password" class="form-control" name="currentPassword" id="currentPassword">
                  </div>

                  <div class="form-group">
                    <label >New Password</label>
                    <input type="password" class="form-control"  name="newPassword" id="newPassword">
                  </div>

                  <div class="form-group">
                    <label >Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
         </div>
        </div>
      </div> 
     </section>
    <!-- /.content -->
@endsection
