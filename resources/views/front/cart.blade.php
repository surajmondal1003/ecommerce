@extends('layouts.app')

@section('content')

<div class="inner-page cart">
    <div class="container-fluid">
      <div class="big">
          
          @if(!Session::get('cart')) 
          <div class="row" id="nocartItemDiv">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <h2 id="cartCount" class="cartCount text-red blink-soft">There is nothing in your Cart. Let's add some Items.<h2>
                  <div class="btm">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 center-col">
                          <a href="{{ url('') }}" class="buybtn-to-continue">Continue Shopping</a>
                      </div>
                    </div>
              </div>
            </div>
          </div>
          @else
        <div class="row" id="cartItemDiv">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="full-left-sec">
            <div class="top-sec">
              <div class="row">
                
                <div class="col-md-6 col-sm-4 col-xs-4">
                  <div class="lft">
                      <h2 > My Cart</h2>
                  </div>
                </div>
                <div class="col-md-6 col-sm-8 col-xs-8">
                  <div class="rgt">
                    <div class="check">
                      <!-- <h3>Check your delivery options: </h3> -->
                      <form>
                        <div class="row">
                          <div class="col-md-10 col-sm-9 col-xs-12 pad-less">
                           <div class="form-group pin">
                             <input type="text" name="inputPin" placeholder="Enter Pincode" 
                             class="form-control checkbox ic" value="{{Session::get('pincode')}}">
                            <span class="form-error"></span>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-3 col-xs-12 pad-less" id="checkPinDiv">
                             <a href="javascript:void(0)" id="pincodeSubmit" class="buybtn chk"> Check</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <div id="itemTable">
              {!!$itemTable!!}
            </div>
           
           <div class="btm">
               
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                  <a href="{{ url('') }}" class="buybtn">Continue Shopping</a>
                  </div>
                  @if($isDeliverable=='1' && $outofstock=='0') 
                  
                  <div class="col-md-6 col-sm-6 col-xs-6" id="placeorderdiv">
                    <button class="buybtn" id="btnPlaceOrder">Place Order</button>
                    <p class="eror" id="undeliverableorder"></p>
                  </div>
                  @else
                  <div class="col-md-6 col-sm-6 col-xs-12" id="placeorderdiv">
                     
                      {{-- <button class="buybtn" id="btnPlaceOrder" disabled>Place Order</button> --}}
                      <p class="eror" id="undeliverableorder">Sorry! Product can not be delivered to your pincode.</p>
                    </div>
                    
                  @endif

                </div>
         
                </div> 
        </div>
          </div>
          
          <div class="col-md-4 col-sm-4 col-xs-12 sd-bar-price">
            <div class="price">
              <div class="price-tbl">
              {!!$carttable!!}
              </div>
              
                <div class="clearfix"></div>
            
            </div>  
           
            
          </div>
         
      </div>
      @endif
    </div>
  </div>
  </div>

  @endsection

  @section('scriptarea')

<script>

    

   

</script>
  @endsection