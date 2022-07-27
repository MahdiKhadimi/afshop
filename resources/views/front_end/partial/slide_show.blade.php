<!-- start slide show  -->

<div class="row col-md-12">
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
 <!-- Indicators -->
 <ol class="carousel-indicators">
  @for ($i=0; $i<count($slide_shows); $i++)
    <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="@if($i==0){{ 'active' }} @endif()"></li>      
  @endfor
 </ol>
 <!-- Wrapper for slides -->
 <div class="carousel-inner">
 @foreach ($slide_shows as $slide_show)
 @php
     $id = $slide_show->id;
 @endphp
    <div class="item @if($slide_show->id==$min_slide) {{ 'active' }}@endif">
     <img src="{{ $slide_show->image }}" alt="{{ $slide_show->title }}" style="width:100%;height:600px ;">
     <div class="carousel-caption">
       <h3 style="color:white;">{{ $slide_show->title }}</h3>
       <p style="color:white;">{{ $slide_show->text }}</p>
     </div>
    </div>
@endforeach
 </div>    
 
 <!-- Left and right controls -->
 <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left"></span>
   <span class="sr-only">Previous</span>
 </a>
 <a class="right carousel-control" href="#myCarousel" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right"></span>
   <span class="sr-only">Next</span>
 </a>
</div>

</div>
 <!--end slide show  -->