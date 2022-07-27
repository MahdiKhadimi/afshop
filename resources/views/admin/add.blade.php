@extends('layouts\layout')
@section('content_title')
    Admin setting

@endsection

@section('content_header')
  Add new Admin

 

  
    
@endsection

@section('content_body')
   
     <section class="content">
      <div class="container-fluid">
      
       
          <!-- /.card-header -->
          <!-- form start -->
  <form action="{{ route('admin.store') }}" enctype="multipart/form-data" id="adminAddForm" method="post">
            @csrf
           <!-- general form elements -->
            
     <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >name</label>
          <input type="name" name="name" class="form-control" id="adminAddName" >
        </div>
         <div class="form-group">
          <label >Type</label>
           <select Name="type"  class="form-control" id="adminAddType">
          <option value="1">Admin</option>
          <option value="2">Sub Admin</option>
         
          </select>
         </div>
         <div class="form-group">
          <label >Email address</label>
          <input type="email" name="email" class="form-control" id="adminAddEmail" >
        </div>
        @error('email')
          <div class="alert alert-warning">
            {{ $message }}
            <button class="close" data-dismiss="alert">&times;</button>
          </div>
            
        @enderror
        <div class="form-group">
          <label >Phone</label>
          <input type="name" name="phone" class="form-control" id="adminAddPhone" >
        </div>
       </div>

       <div class="col-md-6">
       
        
        <div class="form-group">
          <label > Password</label>
          <input type="password" class="form-control" name="password" id="adminAddPassword">
        </div>
        <div class="form-group">
          <label >Photo</label>
          <input type="file" class="form-control" name="photo" id="addminAddPhoto" accept="image/*">
        </div>
        @error('photo')
        <div class="alert alert-warning">
          {{ $message }}
          <button class="close" data-dismiss="alert">&times;</button>
        </div>
          
      @enderror

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

       </div>

    
      </div>
        
      </form>

      </div> 
    </div> 

     </section>
    <!-- /.content -->
@endsection

