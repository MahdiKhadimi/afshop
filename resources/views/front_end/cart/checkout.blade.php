<?php use App\Models\cart?>
@includeif("front_end.layout.header")
{{--   show errors   --}}
@include('partial.message.error')
@include('partial.message.success')
{{--   this form use to store data in the order table  --}}
<form action="{{route('user.order')}}" method="post" id="orderForm">
  @csrf
  <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">  
</form>  
<form action="{{ route('product.update_cart') }}" method="post" id="updateCartForm">
  @csrf
<div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>delivery address</h1>
            <div class="goods-page">
              <table class="table">
                <caption>
                  @error('address')
                    <div class="alert alert-warning">
                      {{ $message }}
                      <button class="close" data-dismiss="alert">&times</button>
                    </div>
                      
                  @enderror
                </caption>
                <thead>
                <tr>
                  <th></th>
                 <th>Country</th>
                 <th>City</th>
                 <th>State</th>
                 <th>Phone</th>
                 <th colspan="2">Action</th>
               </tr> 
              </thead>
               @foreach ($deliveries as $delivery)
               <tr>
                 
                 <input type="hidden" name="delivery_id" value="{{ $delivery->id }}">
              
                 <td><input type="radio" name="address" value="{{ $delivery->id }}" form="orderForm"></td>
                 <td>{{ $delivery->address }}</td>
                 <td>{{ $delivery->city }}</td>
                 <td>{{ $delivery->state }}</td>
                 <td>{{ $delivery->phone }}</td>
                 <td><a href="{{ route('delivery.edit',['id'=>$delivery->id])}}"><span class="fa fa-edit"></span></a></td>
                 <td><a class="delete" href="{{ route('delivery.delete',['id'=>$delivery->id]) }}"><span class="fa fa-trash"></span></a></td>
            
                </tr>
               @endforeach
               <caption><a class="btn btn-default" href="{{ route('delivery.add') }}">Add New Address</a></caption>
               </table>
               <br>
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                
                <table summary="Shopping cart">
                  <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Name</th>
                    <th class="goods-page-description">Description</th>
          
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">Unit price</th>
                    <th class="goods-page-total" colspan="2">Total</th>
                  </tr>
            @php
             $total = 0;
             $currency = "AFG";
            @endphp
                @foreach ($cart_list as $item)
                <tr>
                  <td class="goods-page-image">
                    <a href="javascript:;"><img src="{{ asset(Cart::image_product($item->product_id)) }}" alt="{{ $item->product['name'] }}"></a>
                  </td>

                  <td class="goods-page-description">
                    <h3><a href="javascript:;"> {{ $item->product['name'] }}</a></h3>
                  </td>
                  <td class="goods-page-ref-no">
                    {{ $item->product['description'] }}
                  </td>
                  <td class="goods-page-ref-no">
                    {{ $item->quantity }}
                  </td>
                 
                  <td class="goods-page-price">
                    @php
                    $price = cart::product_price($item->product_id);
                    $currency = cart::product_currency($item->product_id);
                    @endphp
                    <strong> {{ $price }}  <span>{{ Cart::product_currency($item->product_id) }}</span> </strong>
                  </td>
                  <td class="goods-page-total">
                    @php 
                      $total_price = cart::total_price($item->quantity,$price);
                      $total+=$total_price;
                    @endphp
                    <strong> {{ $total_price }} <span>{{ Cart::product_currency($item->product_id) }}</span></strong>
                  </td>
                  <td class="del-goods-col">
                    @if (Auth::check())
                    <a class="del-goods" href="{{ route("cart.delete_when_login",['id'=>$item->product_id]) }} ">&nbsp;</a>
                    @else
                    <a class="del-goods" href="{{ route("cart.delete",['id'=>$item->product_id]) }} ">&nbsp;</a>
                    @endif

                  </td>
                </tr>                    
                @endforeach   
                </table>
                </div>
                <div class="col-md-6">
                  <h3>Payment method</h3>
                  <div class="col-md-12 col-sm-12">
                    @error('payment_method')
                    <div class="alert alert-warning">
                      {{ $message }}
                      <button class="close" data-dismiss="alert">&times</button>
                    </div>
                      
                  @enderror
                    <ul class="list-unstyled list-inline pull-right">
                      <li>
                      <label>
                        <input type="radio" name="payment_method" value="western-union" form="orderForm">
                        <img src="{{ asset('assets/corporate/img/payments/western-union.jpg')}} " alt="We accept Western Union" title="We accept Western Union">
                      </label>
                      </li>
  
                      <li>
                        <label>
                        <input type="radio" name="payment_method" value="MasterCard"  form="orderForm">
                        <img src="{{ asset('assets/corporate/img/payments/MasterCard.jpg') }}" alt="We accept MasterCard" title="We accept MasterCard">
                        </label>
                      </li>
                      <li>
                        <label>
                        <input type="radio" name="payment_method" value="PayPal"  form="orderForm">
                        <img src="{{ asset('assets/corporate/img/payments/PayPal.jpg') }}" alt="We accept PayPal" title="We accept PayPal">
                        </label>
                      </li>
                      <li>
                        <label>
                        <input type="radio" name="payment_method" value="Visa"  form="orderForm">
                        <img src="{{ asset('assets/corporate/img/payments/visa.jpg') }}" alt="We accept Visa" title="We accept Visa">
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="shopping-total col-md-6">
                  <ul>
                   
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price">{{ $total }} <span>{{ $currency }}</span></strong>
                    </li>
                  </ul>
                </div>
              </div>
              <button class="btn btn-default pull-right" type="submit" form="orderForm">Continue shopping </button>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

      </div>
    </div>
    



    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="assets/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="assets/pages/img/products/model3.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model4.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h1>Cool green dress with red bell</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                 
               
                </div>

                
              </div>
            </div>
    </div>
    <!-- END fast view of a product -->
  </form>
@includeIf('front_end.layout.footer')