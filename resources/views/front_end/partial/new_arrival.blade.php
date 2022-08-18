<div class="main">
    <div class="container">
      <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
      <div class="row margin-bottom-40">
        <!-- BEGIN SALE PRODUCT -->
        <div class="col-md-12 sale-product">
          <h2>New Arrivals</h2>
          <div class="owl-carousel owl-carousel5">
            
              @foreach ($products as $item)  
              <div>           
              <div class="product-item">
                <div class="pi-img-wrapper">
                  @foreach ($item->image as $image )
                  @php
                      $picture = $image->picture;
                      $id = $image->id;
                  @endphp
               @endforeach
                 @if (!empty($picture))
                  <img id="productImage{{$id}}" src="{{ asset($picture) }}" alt="">   
                  <div>
                    <a href="{{ asset($picture) }}" class="btn btn-default fancybox-button">Zoom</a>
                    <a href="#product-pop-up-{{ $item->id }}" class="btn btn-default fancybox-fast-view">View</a>
                  </div>
               @endif 
                </div>
                <h3><a href="shop-item.html">{{ $item->name }}</a></h3>
             
                  @foreach ($item->product_attribute as $attribute)
                     @php 
                        $price = $attribute->price ;
                        $unit = $attribute->price_unit;
                      @endphp    
                  @endforeach

                @if (!empty($price))
                <div class="pi-price">{{ $price }} {{ $unit }}</div>
                   
                    
                @endif            
                    
          
                <a href="javascript:;"  class="btn btn-default add2cart" product="{{ $item->id }}">Add to cart</a>
                
                <div class="sticker sticker-sale"></div>
              </div>
               



              {{--   start product details   --}}    
 <div id="product-pop-up-{{ $item->id }}" style="display:none; width: 700px;">
  <div class="product-page product-pop-up">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-3">
        <div class="product-main-image">
       
          @if (!empty($picture))
          <img id="productImage{{$id}}" src="{{ asset($picture) }}" alt="">
         
         @endif
        </div>
        <div class="product-other-images">
          @foreach ($item->image as $image)
          <a href="javascript:;" class="active"><img alt="{{ $item->title }}" src="{{ asset($image->picture) }} "></a>
            
              
          @endforeach
          
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-9">
        <h2>{{ $item->meta_title }}</h2>
        <div class="price-availability-block clearfix">
          <div class="price">
            @if(!empty($price))
            <strong><span>{{$unit}}</span>{{ $price }}</strong>
              
            @endif
           
          </div>
          <div class="availability">
            Availability: <strong>
              @if($item->status==1)
               {{ 'In Stock' }}
               @else
               {{ 'Rouning Out' }}
              @endif 
          </strong>
          </div>
        </div>
        <div class="description">
          <p>{{ $item->description }}</p>
        </div>
        <div class="product-page-options">
          <div class="pull-left">
            <label class="control-label">Size:</label>
            <select class="form-control input-sm">
              @foreach ($item->product_attribute as $attribute)
               <option >{{ $attribute->size }}</option>
                  
              @endforeach
            </select>
          </div>
          <div class="pull-left">
            <label class="control-label">Color:</label>
            <select class="form-control input-sm">
              @foreach ($item->colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="product-page-cart">
          <div class="product-quantity">
              <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
          </div>
          <button class="btn btn-primary" type="submit">Add to cart</button>
          <a href="{{ route('product.detail',['id'=>$item->id]) }}" class="btn btn-default">More details</a>
        </div>
      </div>

      <div class="sticker sticker-sale"></div>
    </div>
  </div>
  </div>
  {{--  end product details   --}}
 </div>

  





            @php
                $price ="";
                $unit = "";
                $picture = "";     
            @endphp
           
           
              @endforeach
          </div>
          
        </div>
        <!-- END SALE PRODUCT -->
      </div>
      {{--  <!-- END SALE PRODUCT & NEW ARRIVALS -->  --}}


     
     

  
    </div>

  </div>



 





  