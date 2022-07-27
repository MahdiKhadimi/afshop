@extends('layouts\layout')
@section('content_title')
    Brand setting

@endsection

@section('content_header')
  Edit Brand
 

  
    
@endsection

@section('content_body')
   
     <section class="content">
      <div class="container-fluid">
      
       
          <!-- /.card-header -->
          <!-- form start -->
  <form action="{{ route('brand.update',['id'=>$brand->id ]) }}" method="post">
            @csrf
            @method('put')
           
         <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >name</label>
          <input type="name" value="{{ $brand->name }}" name="name" class="form-control" id="brandEditName" >
        </div>
         <div class="form-group">
          <label >status</label>
           <select Name="status"  class="form-control" >
            <option value="1" @if($brand->status==1){{ 'selected' }}@endif>Ative</option>
           <option value="0" @if($brand->status==0){{ 'selected' }}@endif>Inactive</option>
          </select>
         </div>
        
         
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Save Change</button>
        </div>
  
          </div>
        
      </form>

      </div> 
    </div> 

     </section>
    <!-- /.content -->
@endsection

