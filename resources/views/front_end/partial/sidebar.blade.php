 {{--  <!-- BEGIN SIDEBAR & CONTENT -->  --}}
 <div class="row margin-bottom-40  ">
<div class="sidebar col-md-3 col-sm-4">  
  
  {{--  <!-- BEGIN SIDEBAR -->  --}}
   
   
    <ul class="list-group margin-bottom-25 sidebar-menu">

       
      @foreach ($sections as $section)
      <li class="list-group-item clearfix dropdown">
        <a href="shop-product-list.html">
          <i class="fa fa-angle-right"></i>
          {{ $section->name }}
        </a>
        <ul class="dropdown-menu">
          @foreach ($section->categories as $category)
          <li class="list-group-item dropdown clearfix">
          <a href="{{ route('product.product_list',['section'=>$section->id,'category'=>$category]) }}">{{$category->name  }} </a>        
            

          </li>    
          @endforeach
        </ul>
       </li>   
     @endforeach      
     <li class="list-group-item clearfix dropdown">
      <a href="#">
        <i class="fa fa-angle-right"></i>
        Brand
      </a>
      <ul class="dropdown-menu">
       @foreach ($brands as $brand)
       <li class="list-group-item dropdown clearfix">
         <a href="{{ route('product.product_list_with_brand',['brand'=>$brand->id])}}">{{$brand->name }}</a>           
       </li>    
       @endforeach
     </ul>
    </li>
    

    </ul>
    </div>
    {{--  <!-- END SIDEBAR -->  --}} 
