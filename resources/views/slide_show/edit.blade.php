@extends('layouts\layout')
@section('content_title')
 slide_show Edit 

@endsection

@section('content_header')
  edit  slide_show 

  
    
@endsection

@section('content_body')
   
     <section class="content">
      <div class="container-fluid">
      
       
          <!-- /.card-header -->
          <!-- form start -->
  <form action="{{ route('slide_show.update',['id'=>$slide_show->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
           <!-- general form elements -->
            
     <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >Title</label>
          <input type="text" name="title" value="{{ $slide_show->title }}" class="form-control" id="slide_showeditName"  >
        </div>
       <div class="form-group">
         <label >Image</label>
         <input type="file" name="image"  class="form-control">
       </div>
       <img src="{{ asset($slide_show->image) }}" style="width:40px;">
      <div class="form-group">
        <label >Text</label>
        <textarea name="text" id="" cols="30" rows="10" class="form-control">
          {{ $slide_show->text }}
        </textarea>
        
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

