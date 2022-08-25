@extends('front_end.layout.layout')
 @section('sidebar')
  @includeIf('front_end.partial.sidebar')     
@endsection


@section('content')
    
    <div class="col-md-9 col-9">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  @foreach ($product_detail->image as $image)
                  @php
                      $picture = $image->picture;
                  @endphp
                      
                  @endforeach
                  <div class="product-main-image">
                    <img src="{{ asset($picture) }}" alt="{{ $product_detail->name }}Picture" class="img-responsive" data-BigImgsrc="assets/pages/img/products/model7.jpg">
                  </div>
                
                  <div class="product-other-images">

                    @foreach ($product_detail->image as $image)
                    <a href="{{ asset($image->picture) }}" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="{{ asset($image->picture) }}"></a> 
                        
                    @endforeach
                    
                  </div>
                </div>
                @foreach ($product_detail->product_attribute as $product_attribute)
                     @php
                      $price = $product_attribute->price;
                      $unit = $product_attribute->unit;
                     @endphp                    
                @endforeach
                <div class="col-md-6 col-sm-6">
                  <h1>{{ $product_detail->meta_description }}</h1>
                  <div class="price-availability-block clearfix">
                    @if (!empty($price))
                    <div class="price">
                      <strong><span>$</span>{{ $price }}{{ $unit }}</strong>
                      
                    </div>
                        
                    @endif
                    
                    <div class="availability">
                      Availability: <strong>
                        @if ($product_detail->status==1)
                          {{ 'In Stock' }}
                         @else
                         {{ 'Going out' }}
                        @endif
                    </strong>
                    </div>
                  </div>
                  <div class="description">
                    <p> {{ $product_detail->meta_description }}</p>
             <form action= "{{route('product.add_to_cart') }}" method="post"> 
              @csrf 
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm" name="color">
                       @foreach ($product_detail->colors as $color)
                         <option value="{{ $color->id }}">{{ $color->name }}</option>
                           
                       @endforeach
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm" name="size">
                         @foreach ($product_detail->product_attribute as $product_attribute)
                           <option value="{{ $product_attribute->id}}">{{ $product_attribute->size }}</option>
                             
                         @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" name="quantity" readonly class="form-control input-sm">
                    </div>
                    <input type="hidden" value="{{ $product_detail->id }}" name="product_id">
                    <input type="submit" value="Add to cart" class="btn btn-defaul add2cart"> 
          


                  </div>
             </form>    
                  <ul class="social-icons">
                    <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                    <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                    <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                  </ul>
                </div>
              </div>
                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Description" data-toggle="tab">Description</a></li>
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="Description">
                      <p> 

                        {{ $product_detail->description }}
                      </p>
                    </div>
                    <div class="tab-pane fade" id="Information">
                      <table class="datasheet">
                        <tr>
                          <th colspan="2">Additional features</th>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Model</td>
                          <td>{{ $product_detail->model }}</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Pattern</td>
                          <td>{{ $product_detail->pattern }}</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Sleeve</td>
                          <td>{{ $product_detail->sleeve }}</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Fit</td>
                          <td>{{ $product_detail->fit }}</td>
                        </tr>
                      
                      </table>
                    </div>
                    @include('partial.message.success')
                    @include('partial.message.error')
                    <div class="tab-pane fade in active" id="Reviews">
                    
                      @foreach ($product_detail->comments as $comment)
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>{{ $comment->name }}</strong>
                          <em>{{ $comment->updated_at }}</em>
                          <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                          <p>{{ $comment->review }}</p>
                        
                        </div>
                      </div>
                     @endforeach 

                      <!-- BEGIN FORM-->
                      <form action="{{ route('comment.store')}}" class="reviews-form" role="form" method="post"> 
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                        <h2>Write a review</h2>
                        
                        <div class="form-group">
                          <label for="name">Name <span class="require">*</span></label>
                          <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" name="review" id="review"></textarea>
                        </div>
                      

                        {{--  <div class="form-group">
                          <label for="email">Rating</label>
                          <input type="range" value="4" step="0.25" id="backing5">
                          <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          </div>
                        </div>  --}}

                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                      <!-- END FORM--> 
                    </div>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

 
      </div>
    </div>
 </div>

@endsection          <!-- BEGIN CONTENT -->
 