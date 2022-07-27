@extends('layouts\layout')
@section('content_title')
    Product Attribute setting

@endsection

@section('content_header')
  Add new Product Attribute

 

  
    
@endsection

@section('content_body')
   
     <section class="content">
      <div class="container-fluid">
      
       
          <!-- /.card-header -->
          <!-- form start -->
  <form action="{{ route('section.store') }}" method="post">
            @csrf
           <!-- general form elements -->
            
     <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >name</label>
          <input type="name" name="name" class="form-control" id="adminAddName" >
        </div>
         <div class="form-group">
          <label >status</label>
           <select Name="status"  class="form-control" >
          <option value="1">Ative</option>
          <option value="0">Inactive</option>
         
          </select>
         </div>
        
         
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
  
          </div>
        
      </form>

      </div> 
    </div> 

     </section>
    <!-- /.content -->
@endsection

