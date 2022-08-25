<div class="row product-list">
  @foreach ($product_list as $item) 
  
                {{--  <!-- PRODUCT ITEM START -->  --}}
      <div class="col-md-4 col-sm-6 col-xs-12" style="min-height: 300px;">
         <from action="{{ route('product.add_to_cart') }}" method="post">
            @csrf
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                 @foreach ($item->image as $image)
                             @php
                                 $picture = $image->picture;
                             @endphp 
                 @endforeach     
                 @foreach ($item->product_attribute as $product_attribute)
                 @php
                 $price = $product_attribute->price;
                 $unit = $product_attribute->price_unit;
                 
                     
                 @endphp    
                
    @endforeach 
       <img src="@isset($picture) {{ asset($picture) }} @endisset" class="img-responsive" alt="Berry Lace Dress">
        <div>
         <a href="@isset($picture){{ asset($picture) }}@endisset" class="btn btn-default fancybox-button">Zoom</a>
         <a href="#product-pop-up-list{{ $item->id }}" class="btn btn-default fancybox-fast-view">View</a>
       </div>
        </div>
           <h3>{{ $item->name }}</h3>
           <div class="pi-price">
              @if(!empty($price ))
                {{ $unit }} {{ $price }}
              @endif 
           </div>
           

           <input type="hidden" value="1" name="quantity">
           <input type="hidden" value="{{ $item->id }}" name="product_id">
           <input type="submit" value="Add to cart" class="btn btn-defaul add2cart"> 
         </div>
      </form> 
      </div>
  
                {{--  <!-- PRODUCT ITEM END -->  --}}
           @include('front_end\partial\category\detail')
        @php
            $picture = "";
            $price = "";
            $unit = "";
        @endphp        
  
  
  @endforeach
              
  </div>
  
  
  