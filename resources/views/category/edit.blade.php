@extends('layouts\layout')
@section('content_title')
    category setting

@endsection

@section('content_header')
  Edit  category

 

  
    
@endsection

@section('content_body')
   
<section class="content">
 <div class="container-fluid">
      
       

   <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post" id="categoryEditForm" enctype="multipart/form-data">
                  @method("PUT")
                  @csrf
                 <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                     <label >Name</label>
                     <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="categoryEditName" >
                   </div>
                   <div class="form-group">
                     <label >Discount</label>
                     <input type="text" value="{{ $category->discount}}" name="discount" class="form-control" id="categoryEditDiscount" >
                   </div>
           
           
                    <div class="form-group">
                     <label >Url</label>
                     <input type="text" value="{{ $category->name }}" name="url" class="form-control" id="categoryEditUrl" >
                   </div>
                   <div class="form-group">
                    <label >image</label>
                    <input type="file" class="form-control"  name="image" id="categoryEditImage" accept="image/*" >
                    
                    @foreach ($category->image as $showImage)
                   
                    <img src="{{asset($showImage->picture) }}" alt="category image" style="width:40px;" >
                    <a href="{{ route('category.deleteImage',['id'=>$showImage->id]) }}">Delete Image</a>
                    @endforeach
                   
                  </div>
                   <div class="form-group">
                     <label >Meta Title</Title></label>
                     <input type="text" value="{{ $category->meta_title }}" name="meta_title" class="form-control" id="categoryEditMetaTitle" >
                   </div>
               
                  <div class="form-group">
                    <label >Meta Description</label>
                    <textarea class="form-control"  name="meta_description" id="categoryEditMetaDescription" cols="30" rows="10">
                      {{ $category->meta_description }}
                    </textarea>
                  </div>
                 </div>
                  <div class="col-md-6">
                  
                   
                    <div class="form-group">
                      <label >Section</label><br>
                      @foreach ($category->sections as $show)
                      <span>{{ $show->name }}</span>
                    @endforeach
                       <select Name="section_id[]"  class="form-control" id="categoryEditSectionId" multiple>
                        
                      
                         @foreach ($sections as $item)
                            <option  value="{{ $item->id }}">{{ $item->name }}</option>
                         @endforeach
                
                       
                    
                     
                      </select>
                     </div>
                   <div class="form-group">
                     <label > Meta Keybord</label>
                     <input type="text" class="form-control" value="{{ $category->meta_keywords }}" name="meta_keywords" id="categoryEditMetaKeywords">
                   </div>
                   
                   <div class="form-group">
                     <label >Status</label>
                     <select name="status" id="categoryEditStatus" class="form-control">

                       <option @if($category->status==1 ) {{ 'selected' }} @endif  value="1">Active</option>
                       <option @if($category->status==0 ) {{ 'selected' }} @endif value="0">Inactive</option>
                     </select>
                   </div>
                   <div class="form-group">
                     <label >Description</label>
                     <textarea name="description" id="categoryEditDescription" cols="30" rows="10" class="form-control">
                       {{ $category->description }} 
                    </textarea>
                   </div>
                   <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                  </div>
           
             
                 </div>

                   
     </form>
           
           
            
 
@endsection

