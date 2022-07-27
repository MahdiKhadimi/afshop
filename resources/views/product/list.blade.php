@extends('layouts\layout')
@section('title','product list')
  
    
@section('content_title')
   

@endsection

@section('content_header')
 <a href="{{ route("product.create") }}" class="btn btn-info"> Add product</a>

 

  
    
@endsection

@section('content_body')


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">product List</h3>
      </div>
      {{--  <!-- ./card-header -->  --}}
      <div class="card-body p-0">
        <table id="example3" class="table table-hover table-bordered table-responsive ">
        
          @php
          $x=1;
      @endphp
      
        <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Section</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Color</th>
        <th>Code</th>
      
        <th>Discount</th>
        <th>Photo</th>
        <th>Status</th>
        <th class="add_attribute">Add Attribute</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
      </tr>
      </thead>
          <tbody>
          @php
              $x=1;
          @endphp  
          @foreach ($products as $item)
                
          
           
            <tr data-widget="expandable-table" aria-expanded="false">
              <td>{{ $x++ }}</td>
              <td>{{ $item->name }}</td>
              <td>
                @foreach ($item->section as $section)
                     <p>{{ $section->name }}</p>
                @endforeach
              </td>

              <td>
                @foreach ($item->category as $category )
                   <p>{{ $category->name }}</p>
                    
                @endforeach
              </td>          
              <td>
                @foreach ($item->brand as $brand)
                     <p>{{ $brand->name }}</p>
                @endforeach
              </td>
              <td>{{ $item->model }}</td>
              <td>{{ $item->color }}</td>
              <td>{{ $item->code }}</td>
             
              <td>{{ $item->discount }}</td>
               <td>
                                   
                @foreach ($item->image as $image )
                   @php
                       $picture = $image->picture;
                       $id = $image->id;
                   @endphp
                @endforeach
                  @if (!empty($picture))
                   <img id="productImage{{$id}}" src="{{ $picture }}" alt="" style="width:40px;">
                   <a href="#imageInfo{{ $item->id }}" data-toggle="modal">all</a>  
                  @endif
                   
                                         
                  
                @php

                    $picture="";
                @endphp                
                
              

               </td>
              <td>{{ $item->status==1?'Active':'Inactive' }}</td>
               
             
          
             <td class="add_attribute"><a title="add product attribute" href="#productAttributeAdd{{ $item->id }}" data-toggle="modal" ><span class="fa fa-plus"></span></a></td>                  
               
         
                  
            
              <td class="edit"><a  title="product edit" href="{{ route('product.edit',['id'=>$item->id]) }}" ><span class="fa fa-edit"></span></a></td>
              <td class="delete productConfirmDelete"><a class="product delete" href="{{ route('product.delete',['id'=>$item->id ] )}}" ><span class="fa fa-trash"></span></a></td>
        
             
            </tr>
          
   
          
          
          
          
          
          </tbody>

         {{--  all images modal  --}}
          <div class="modal" id="imageInfo{{$item->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  Product Images:
                  <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="row" >
                    <div class="col-md-12">
                      {{ $item->name }}
                    </div>
            
                    <div>
              
                       @if ($item->image)                    
                       @foreach ($item->image as $image )
                      <div class="row" id="divImageInfo{{ $image->id }}">
                       <div class="col-md-6" >
                        <img  src="{{ $image->picture }}" alt="" style="width:40px;">
                       </div>
                      
                    
                      <div class="col-md-3">
                        <button  class="btn"  onclick="deleteProductImage({{ $image->id }})">Delete</button>
                      </div>
                      </div>  
                       @endforeach
                       @endif
                      </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  
                   <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
  
                </div>
  
              </div>
  
            </div>
           
  
          </div>
        

            

        {{--  start product attribute add modal  --}}
        <div class="modal" id="productAttributeAdd{{$item->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                Adding Product Attributes
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <p>Product Information:
                     {{ $item->name }}
                     @if ($item->image)                    
                     @foreach ($item->image as $image )
                      <img src="{{ $image->picture }}" alt="" style="width:40px;">
                     @endforeach
                     @endif
                  </p>

                </div>
                 <form action="{{ route("product_attribute.store") }}"  method="post" id="productAttributeForm">
                  @csrf 
                {{--  add product attribure  --}}
                 <input type="hidden" value="{{ $item->id }}" name="product_id">
                  <div class="row">
                    <input type="text" class="col-md-5" name="size[]" placeholder="please select size" value="Big" list="size1">
                    <datalist id="size1">
                       <option value="Big">
                       <option value="Medium">
                       <option value="Small">
                    </datalist>
                    <input type="text" class="col-md-5" name="price[]" placeholder="price">
                     
                    <select name="price_unit[]" class="col-md-2">
                     <option >AFG</option>
                     <option >USD</option>
                     </select>
                   </div>

                   <div class="row">
                    <input type="text" class="col-md-5" name="size[]" placeholder="please select size" value="Medium" list="size2">
                    <datalist id="size2">
                       <option value="Big">
                       <option value="Medium">
                       <option value="Small">
                    </datalist>
                    <input type="text" class="col-md-5" name="price[]" placeholder="price">
                     

                    <select name="price_unit[]" class="col-md-2">
                     <option >AFG</option>
                     <option >USD</option>
                     </select>
                   </div>

                   <div class="row">
                    <input type="text" class="col-md-5" name="size[]" placeholder="please select size" value="Small" list="size3">
                    <datalist id="size3">
                       <option value="Big">
                       <option value="Medium">
                       <option value="Small">
                    </datalist>
                    <input type="text" class="col-md-5" name="price[]" placeholder="price">
                     
                    <select name="price_unit[]" class="col-md-2">
                     <option >AFG</option>
                     <option >USD</option>
                     </select>
                   </div>

                </form>
              </div>
              <div class="modal-footer">
                 <input type="submit" class="btn btn-info" value="save" form="productAttributeForm">
                 <input type="button" class="btn btn-warning" value="Cancel" data-dismiss="modal">

              </div>

            </div>

          </div>
         

        </div>



        @endforeach
       
     </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>







   
   


@endsection
@section('script')
// This script for datatable
<script>
  $(function () {
   
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
    
@endsection
