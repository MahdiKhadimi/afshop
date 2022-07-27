@extends('layouts\layout')
@section('content_title')
    product setting

@endsection

@section('content_header')
  Edit Product

 

  
    
@endsection

@section('content_body')
   
<section class="content">
 <div class="container-fluid">
      
       
     
  <form action="{{ route('product.update',['id'=>$product->id ] ) }}" enctype="multipart/form-data" id="productAddForm" method="post">
            @csrf
       @method('put')
           
     <div class="row">
       <div class="col-md-6">
        <div class="form-group">
          <label >Name</label>
          <input value="{{ $product->name }}" type="text" name="name" class="form-control" id="productAddName" >
        </div>
        <div class="form-group">
          <label >Discount</label>
          <input type="number" value="{{ $product->discount }}" name="discount" class="form-control" id="productAddDiscount" >
        </div>
       
        <div class="form-group">
          <label >Fabric</label>
          <input type="text" name="fabric" value="{{ $product->fabric }}" class="form-control" id="productAddfabric" >
        </div>
        
        <div class="form-group">
          <label >Color</label>
          <select name="color" id="productAddColor" class="form-control">
             <option @if($product->color=="Green"){{ 'selected' }} @endif >Green</option>
             <option  @if($product->color=="Red"){{ 'selected' }} @endif>Red</option>
             <option  @if($product->color=="White"){{ 'selected' }} @endif>Wite</option>
             <option  @if($product->color=="Black"){{ 'selected' }} @endif>Black</option>
             <option  @if($product->color=="Orange"){{ 'selected' }} @endif>Orange</option>
             <option  @if($product->color=="Purple"){{ 'selected' }} @endif>Purple</option>
             <option  @if($product->color=="Violet"){{ 'selected' }} @endif>Violet</option>
             <option  @if($product->color=="Yellow"){{ 'selected' }} @endif>Yellow</option>
             <option  @if($product->color=="Gray"){{ 'selected' }} @endif>Gray</option>
          </select>
        </div>
        
         <div class="form-group">
          <label >Code</label>
          <input type="text" value="{{ $product->code }}" name="code" class="form-control" id="productAddCode" >
        </div>
        <div class="form-group">
          <label >Section</label>
          <input type="text" 
          value="@foreach ($product->section as $item)
                   {{$item->id}}-{{ $item->name }}
          @endforeach" list="section" class="form-control" name="section_id">
           <datalist id="section">           
           @foreach ($sections as $item)
             
              <option value="{{ $item->id}}-{{ $item->name }}">
           @endforeach
          </datalist>
        </div>

        <div class="form-group">
          <label >Category</label>
          <input type="text" value="@foreach ($product->category as $item)
              {{ $item->id}}-{{ $item->name }}
          @endforeach" list="category" class="form-control" name="category_id">
           <datalist id="category">           
           @foreach ($categories as $item)
              
              <option value="{{ $item->id }}-{{ $item->name }}">
           @endforeach
          </datalist>
        </div>
        <div class="form-group">
          <label >Meta Title</Title></label>
          <input type="text" value="{{ $product->meta_title }}" name="meta_title" class="form-control" id="productAddMetaTitle" >
        </div>
        <div class="form-group">
          <label >Meta Description</label>
          <textarea class="form-control" name="meta_description" id="productAddMetaDescription" cols="30" rows="10">
           {{ $product->meta_description }}
          </textarea>
        </div>     
      </div>




      

       <div class="col-md-6">
        
        <div class="form-group">
          <label > Model</label>
          <input type="text" value="{{ $product->model }}" class="form-control" name="model" id="productAddModel">
        </div>
        <div class="form-group">
          <label > Fit</label>
          <input type="text" value="{{ $product->fit }}" class="form-control" name="fit" id="productAddFit">
        </div>

        <div class="form-group">
          <label > Sleeve</label>
          <input type="text" value="{{ $product->sleeve }}" class="form-control" name="sleeve" id="productAddSleeve">
        </div>
        <div class="form-group">
          <label > Pattern</label>
          <input type="text" value="{{ $product->pattern }}" class="form-control" name="pattern" id="productAddPattern">
        </div>
        <div class="form-group">
          <label > Occasion</label>
          <input type="text" value="{{ $product->occasion }}" class="form-control" name="occasion" id="productAddocasion">
        </div>

        <div class="form-group">
          <label >image</label>
          <input type="file" multiple class="form-control" name="image[]" id="productAddImage" accept="image/*">
           <img src="{{ asset($product->model)}}" alt="">
        </div>

        <div class="form-group">
          <label >Video</label>
          <input type="file"  class="form-control" name="video" id="productAddVideo" >
        </div>
        <div class="form-group">
          <label > Meta Keywords</label>
          <input type="text" value="{{ $product->meta_keywords }}" class="form-control" name="meta_keywords" id="productAddMetaKeywords">
        </div>
       <div class="form-group">
  
          <label>Is Featued</label>
          <br>
          <label>
            Yes<input type="radio"  @if($product->is_featured=='Yes'){{ 'checked' }} @endif value="yes" name="is_featured">
          </label>
          <label>
            No<input type="radio" @if($product->is_featured=='No'){{ 'checked' }} @endif value="no" name="is_featured" >
          </label>
        </div>
        <div class="form-group">
          <label >Status</label>
          <select name="status" id="productAddStatus" class="form-control" >
            <option @if($product->status==1){{ 'selected' }} @endif value="1">Active</option>
            <option  @if($product->status==0){{ 'selected' }} @endif value="0">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <label >Description</label>
          <textarea name="description" id="productAddDescription" cols="30" rows="10" class="form-control">
           {{ $product->description }}
          </textarea>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">save change</button>
        </div>
       </div>


  
      </div>
        
      </form>

     </div> 
   

 </section>
 
@endsection

