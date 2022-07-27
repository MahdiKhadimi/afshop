@extends('layouts\layout')
@section('content_title')
    Section setting

@endsection

@section('content_header')
  edit new section
 

  
    
@endsection

@section('content_body')
   
     <section class="content">
      <div class="container-fluid">
      
       
          <!-- /.card-header -->
          <!-- form start -->
  <form action="{{ route('section.update',['id'=>$section->id ]) }}" method="post">
            @csrf
           
         <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >name</label>
          <input type="name" value="{{ $section->name }}" name="name" class="form-control" id="admineditName" >
        </div>
         <div class="form-group">
          <label >status</label>
           <select Name="status"  class="form-control" >
          <option value="1" @if($section->status==1){{ 'selected' }}@endif>Ative</option>
          <option value="0" @if($section->status==0){{ 'selected' }}@endif>Inactive</option>
         
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

