@extends('layouts\layout')
@section('content_title')
    product setting
@endsection

@section('content_header')
  Add new product

 

  
    
@endsection

@section('content_body')
   
<section class="content">
 <div class="container-fluid">
      
  @if($errors->any())

  <ol>  
  @foreach ($errors->all() as $show_errors)
      <li class="alert alert-warning">
        {{ $show_errors }}
        <button class="close" data-dismiss="alert">&times;</button>
      </li>
    @endforeach
  </ol>   
  @endif     
  
  <form action="{{ route('product.store') }}" enctype="multipart/form-data" id="productAddForm" method="post">
         @csrf
        <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >Name</label>
          <input type="text" value="@if (@old('name')){{ old('name') }} @endif" name="name" class="form-control" id="productAddName" >
        </div>
        <div class="form-group">
          <label >Discount</label>
          <input type="number" name="discount" class="form-control" id="productAddDiscount" >
        </div>
     
       
        <div class="form-group">
          <label >Fabric</label>
         
          <select name="fabric" class="form-control">
            @foreach ($fabrics as $fabric)
                <option >{{ $fabric }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label >Brand</label>
         
          <select name="brand_id" class="form-control">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label >Color</label>
          <select name="colors[]" id="productAddColor" class="form-control" multiple>
             @foreach ($colors as $color)
             <option value="{{ $color->id }}">{{ $color->name }}</option>         
             @endforeach
          </select>
        </div>
        
         <div class="form-group">
          <label >Code</label>
          <input type="text" name="code" class="form-control" id="productAddCode" >
        </div>
        <div class="form-group">
          <label >Section</label>
          <input type="text" list="section" value="@if(@old('section_id')){{ old('section_id') }}@endif " class="form-control" name="section_id">
           <datalist id="section">           
           @foreach ($sections as $item)
               <option @if(!empty(@old('section_id'))&&($item->id.'-'.$item->name)==@old('section_id' ) ) {{ 'selected' }} @endif value="{{ $item->id }}-{{ $item->name }}">
           @endforeach
          </datalist>
        </div>

        <div class="form-group">
          <label >Category</label>
          <input type="text" list="category" class="form-control" name="category_id">
           <datalist id="category">           
           @foreach ($categories as $item)
                      <option value="{{ $item->id }}-{{ $item->name }}">
           @endforeach
          </datalist>
        </div>
        <div class="form-group">
          <label >Meta Title</Title></label>
          <input type="text" name="meta_title" class="form-control" id="productAddMetaTitle" >
        </div>
        <div class="form-group">
          <label >Meta Description</label>
          <textarea class="form-control" name="meta_description" id="productAddMetaDescription" cols="30" rows="10">
          </textarea>
        </div>     
      </div>




      

       <div class="col-md-6">
        
        <div class="form-group">
          <label > Model</label>
          <input type="text" class="form-control" name="model" id="productAddModel">
        </div>
        
        <div class="form-group">
          <label > Fit</label>
          <input type="text" class="form-control" name="fit" id="productAddFit">
        </div>

        <div class="form-group">
          <label > Sleeve</label>
      
          <select name="sleeve" class="form-control">
            @foreach ($sleeves as $sleeve)
              <option >{{ $sleeve }}</option>
            @endforeach
          </select>
        
        </div>
        <div class="form-group">
          <label > Pattern</label>
          <input type="text" class="form-control" name="pattern" id="productAddPattern">
        </div>
        <div class="form-group">
          <label > Occasion</label>
          <input type="text" class="form-control" name="occasion" id="productAddocasion">
        </div>

        <div class="form-group">
          <label >image</label>
          <input type="file" class="form-control" name="image[]" multiple id="productAddImage" accept="image/*">
        </div>
        <div class="form-group">
          <label >Video</label>
          <input type="file" class="form-control" name="video" id="productAddVideo" >
        </div>
        <div class="form-group">
          <label > Meta Keybord</label>
          <input type="text" class="form-control" name="meta_keywords" id="productAddMetaKeywords">
        </div>
       <div class="form-group">
  
          <label>Is Featued</label>
          <br>
          <label>
            Yes<input type="radio" value="yes" name="is_featured">
          </label>
          <label>
            No<input type="radio" value="no" name="is_featured" >
          </label>
        </div>
        <div class="form-group">
          <label >Status</label>
          <select name="status" id="productAddStatus" class="form-control" >
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <label >Description</label>
          <textarea name="description" id="productAddDescription" cols="30" rows="10" class="form-control">
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

