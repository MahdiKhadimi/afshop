             {{--   start product details   --}}    
     <div id="product-pop-up-list{{ $item->id }}" style="display:none; width: 700px;">
                <div class="product-page product-pop-up">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-3">
                      <div class="product-main-image">                     
                        @if (!empty($picture))
                        <img id="productImage{{$item->id}}" src="{{ asset($picture) }}" alt="">
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
            
              
                