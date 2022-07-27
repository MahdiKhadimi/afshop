@extends('front_end/layout/layout')
@section('content')
<div class="main">
      <div class="container">
         <h2>Men Category</h2>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          
            <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
             @include('front_end.partial.category.sidebare')   
             @include('front_end.partial.category.filter')
             @include('front_end.partial.category.bestseller')
          </div>
          <!-- END SIDEBAR -->
		  
          <!-- BEGIN CONTENT -->
       <div class="col-md-9 col-sm-7">
             
             @include('front_end.partial.category.sort')
             @include('front_end.partial.category.list')
             @include('front_end.partial.category.paginator')

          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection








  

   