@extends('layouts\layout')
@section('content_title')
    category setting

@endsection

@section('content_header')
  Add new category

 

  
    
@endsection

@section('content_body')
   
<section class="content">
 <div class="container-fluid">
      
       
     
  <form action="{{ route('category.store') }}" enctype="multipart/form-data" id="categoryAddForm" method="post">
            @csrf
              
     <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >Name</label>
          <input type="text" name="name" class="form-control" id="categoryAddName" >
        </div>
        <div class="form-group">
          <label >Discount</label>
          <input type="number" name="discount" class="form-control" id="categoryAddDiscount" >
        </div>
       
        

         <div class="form-group">
          <label >Url</label>
          <input type="text" name="url" class="form-control" id="categoryAddUrl" >
        </div>
       
        <div class="form-group">
          <label >Meta Title</Title></label>
          <input type="text" name="meta_title" class="form-control" id="categoryAddMetaTitle" >
        </div>
        <div class="form-group">
          <label >Meta Description</label>
          <textarea class="form-control" name="meta_description" id="categoryAddMetaDescription" cols="30" rows="10">
          </textarea>
        </div>
       
      </div>




      

       <div class="col-md-6">
        <div class="form-group">
          <label >Section</label>
          <select Name="section_id[]"  class="form-control" id="categoryAddSectionId" multiple>
            @foreach ($sections as $item)
           <option value="{{ $item->id }}">{{ $item->name }}</option>
           
            @endforeach
       
        
         </select>

        </div> 
        
        <div class="form-group">
          <label > Meta Keybord</label>
          <input type="text" class="form-control" name="meta_keywords" id="categoryAddMetaKeywords">
        </div>
        <div class="form-group">
          <label >image</label>
          <input type="file" class="form-control" name="image[]" multiple id="categoryAddImage" accept="image/*">
        </div>
        <div class="form-group">
          <label >Status</label>
          <select name="status" id="categoryAddStatus" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <label >Description</label>
          <textarea name="description" id="categoryAddDescription" cols="30" rows="10" class="form-control">
          </textarea>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
       </div>


  
      </div>
        
      </form>

     </div> 
   

 </section>
 
@endsection

