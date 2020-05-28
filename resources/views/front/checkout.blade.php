@extends('layouts.app')

@section('content')

<div class="inner-page cart">
    <div class="container">
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
            <div class="top-sec2" >
              <div class="step1" id="addressStep1">
                <h2>1. Delivery Address</h2>
                  <div class="for-padding">
                    
                    @if(count($useraddress)<1)
                    
                    <div class="row">
                      <div class="col-md-12">
                          <h4>You have no addresses yet</h4>
                          <div class="adn-ew">
                           
                              {{-- <a href="{{url('my-profile')}}" >Add New Address</a> --}}
                              
                          </div>
                      </div>
                    </div>
                    @else
                    @foreach($useraddress as $eachaddress )

                    
                  <div class="md-radio md-radio-inline">
                    <input id="{{$eachaddress->user_address_id}}" type="radio" name="inputAddress" value="{{$eachaddress->user_address_id}}"
                    @if($eachaddress->is_default=='1') checked @endif onclick="loadDeliverBtn(this.value)">
                    <label for="{{$eachaddress->user_address_id}}">
                    <div class="box-new " id="addressText_{{$eachaddress->user_address_id}}">

                          <h3>{{$user->name}}<span>({{$eachaddress->phone_no}})</span></h3>
                          <p>{{$eachaddress->address}},{{$eachaddress->landmark}},
                            {{ $eachaddress->pincode }},{{$eachaddress->city}},{{$eachaddress->country}}</p>

                    </div>
                      </label>
                    </div>
                    <div id="addressDeliverDiv_{{$eachaddress->user_address_id}}">
                      @if($eachaddress->is_default=='1')
                    <button type="button" class="buybtn deliver-btn" value="{{$eachaddress->user_address_id}}" onclick="checkorderPincode(this.value)">Deliver Here</button>
                      @endif
                    </div>
                    @endforeach
                  @endif
                </div>
                <button type="button" class="popup-address" data-toggle="modal" data-target="#myModal">Add new Address</button>
                
                </div>
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="container-fluid">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Address</h4>
                      </div>
                      <div class="modal-body">
                        <form id="addressdialog">
                        <div class="form-group">
                          <input type="text" name="inputAddress" placeholder="New Address" class="form-control" >
                          <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="inputLandmark" placeholder="Landmark" class="form-control" >
                          <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="inputCity" placeholder="City" class="form-control" >
                          <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                          <input type="text" name="inputPincode" placeholder="Pincode" class="form-control" >
                          <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                          <input type="text" readonly name="inputCountry" value="INDIA" class="form-control" >
                          <span class="help-block"></span>
                        </div>
                        
                          <div class="form-group">
                          <input type="text" placeholder="Mobile Number" name="inputPhone" class="form-control">
                          <span class="help-block"></span>
                        </div>
                     
                        <div class="form-group">
                          <input type="submit" value="submit" id="addressdialogBtn" class="sub-btn">
                        </div>
                        </form>
                      </div>
                      <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div> -->
                    </div>
                    </div>
                  </div>
                </div>
                
                <div class="step2">
                <h2>2. Order Summary</h2>
            {{-- @foreach($itemdata as $item)
            <div class="lt-block">
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="img-sec">
                  <img src="{{asset($item['image_name']) }}" alt="">
                    </div>
                </div>
                <div class="col-md-10  col-sm-10  col-xs-12">
                  <div class="rt-sec">
                    <h4>{{$item['product_name']}}</h4>
                   <div class="ret2">
                   <h5 class="rgt-price">Rs-{{$item['discount_price']}}/- X {{$item['qty']}}</h5>
                    <h3 class="rgt-price">Rs-{{$item['subtotal']}}/-</h3>
                    <div class="clearfix"></div>
                  </div>
                  
                    
                  </div>
                </div>
              </div>
            </div>
            @endforeach --}}

              <div id="itemTable">
                  {!!$itemTable!!}
              </div>
            
              </div>
              <div class="step3">
                <h2>3. Payment Options</h2>
                <div class="pay-opt">
                  <div class="md-radio md-radio-inline">
                    <input id="inputinstamojo" type="radio" name="inputPaymentmode" checked value="instamojo">
                    <label for="inputinstamojo">
                      <div class="box-new ">
                          <h3><span class="int"><img src="{{asset('assets/images/logo-insta.png')}}" alt=""></span> Instamojo</h3>
                          <p>You will be redirected to Instamojo page, where you can pay using UPI, Credit/Debit card, wallets or net banking.</p>
                        </div>
                      </label>
                  </div>
                  @if($available_cod=='yes')
                  <div class="md-radio md-radio-inline">
                   
                    <input id="inputcod" type="radio" name="inputPaymentmode" value="cod">
                    <label for="inputcod" id="availableCodDiv" style=" color:#000;" >Cash on Delivery (COD)</label>
                    
                    
                  </div>
                  @else
                  <div class="md-radio md-radio-inline" >
                    <input id="inputcod" type="radio" name="inputPaymentmode" value="cod" disabled>
                    <label for="inputcod" id="availableCodDiv" style=" color: rgb(220, 84, 84);" >Cash on Delivery (COD) not available</label>
                  </div>
                  @endif

                    <div class="">
                      @if($user_wallet-10 > 0)
                       <input id="inputWalletBalance" type="checkbox" name="inputWalletBalance" value="{{$user_wallet-10}}">
                       <label for="inputWalletBalance" style=" color:#000;" ><b>Wallet Balance : Rs. {{$user_wallet-10}}</b></label>
                       @else
                       <input id="inputWalletBalance" type="checkbox" name="inputWalletBalance" value="0.00">
                       <label for="inputWalletBalance" style=" color:#000;" ><b>Wallet Balance : Rs. 0.00</b></label>
                       @endif
                    
                   </div>
                </div>
                </div>
              
  
              </div>
              
              <div class="btm">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12" id="placeorderdiv">
                        
                         
                          @if(count($useraddress)<1)
                          
                          <p class="eror">You have no address.Please Add address</p>
                          {{-- @else
                          <button class="buybtn" id="btnFinalOrderPlace">Place Order</button>
                           --}}

                          @endif
                          <p class="eror" id="undeliverableorder"></p>
                        </div>
                      </div>
                    </div>
            </div>
  
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price">
              <div class="price-tbl">
              {{-- <table class="tbl">
                <tr>
                  <th colspan="2" class="dtdwn">Price details</th>
                </tr>
                <tr>
                  <td>Price ({{$count}} Item)</td>
                <td>₹{{$itemtotal}}</td>
                </tr>
                <tr>
                  <td>Delivery Charges</td>
                  <td>{{$deliveryCharge}}</td>
                </tr>
                <tr class="dtup">
                  <td>Amount Payable</td>
                  <td class="finalAmt">₹{{$total}}</td>
                </tr>
              </table> --}}
              {!!$carttable!!}
            </div>
              <div class="chkbx">
              <form action="#">
                <p>
                  <input type="checkbox" id="testnw1" checked>
                  <label for="testnw1"> I have read and agree to the <a href="http://shopinway.com/terms-and-conditions" target="_blank">Terms & Conditions</a></label>
                </p>
                <p>
                  <input type="checkbox" id="testnw2"  checked>
                  <label for="testnw2"> I have read and agree to the <a href="http://shopinway.com/shipping-and-return-policy" target="_blank">Shipping & Return Policy</a></label>
                </p>
                <!-- <p>
                  <input type="checkbox" id="testnw3">
                  <label for="testnw3"> I have read and agree to the Terms & Conditions</label>
                </p> -->
              </form>
            </div>
          </div>
        
            </div>  
            


      </div>
      @endif
    </div>
  </div>
  </div>
  @endsection