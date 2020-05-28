@extends('layouts.app')

@section('content')

<div class="account-sec">
    <div class="container-fluid">
  <div class="row">
      <div class="col-sm-12">
        <div class="tab-container">
           
          <ul class="nav nav-tabs nav-tabs-left nav-centered" role="tablist">

            @if($is_member=='1')
            <li role="presentation" class="member-now">
              <a href="#newone" data-toggle="tab" role="tab" id="membershipTab">
              Student Membership
              </a>
            </li>
            @endif
            <!-- <li class="member-now"><h2>Student Membership</h2></li> -->
            <li><h2><span><i class="fa fa-file-text" aria-hidden="true"></i></span>My Account</h2></li>
            <li role="presentation" class="active">
              <a href="#one" data-toggle="tab" role="tab">
               Edit your Account Information
              </a>
            </li>
            <li role="presentation">
              <a href="#two" data-toggle="tab" role="tab">
                Change your Password
              </a>
            </li>
            <li role="presentation">
              <a href="#three" data-toggle="tab" role="tab">
                Modify your Address 
              </a>
            </li>
            <li role="presentation">
              <a href="#four" data-toggle="tab" role="tab" id="wTab">
                Modify your Short List 
              </a>
            </li>
             <li><h2><span><i class="fa fa-file-text" aria-hidden="true"></i></span>My Orders</h2></li>
             <li role="presentation">
              <a href="#five" data-toggle="tab" role="tab" id="orderTab">
               Your order history
              </a>
            </li>
            <!-- <li role="presentation">
              <a href="#six" data-toggle="tab" role="tab">
                Downloads
              </a>
            </li> -->
            
            <li role="presentation">
              <a href="#eight" data-toggle="tab" role="tab">
                Your return requests
              </a>
            </li>
             <li role="presentation">
              <a href="#nine" data-toggle="tab" role="tab">
                Your Transactions
              </a>
            </li>
            <li role="presentation">
              <a href="#seven" data-toggle="tab" role="tab" id="walletTab">
                Your Wallet
              </a>
            </li> 
            <!-- <li role="presentation">
              <a href="#ten" data-toggle="tab" role="tab">
                Recurring payments
              </a>
            </li> -->
            <li><h2><span><i class="fa fa-file-text" aria-hidden="true"></i></span>Newsletter</h2></li>
            <li role="presentation">
              <a href="#eleven" data-toggle="tab" role="tab">
               Subscribe or Unsubscribe
              </a>
            </li>
            <li role="presentation">
              <a href="javascript:void();" id="btnLogout">
               Logout
              </a>
            </li>
          </ul>


          <div id="my_side_tabs" class="tab-content side-tabs side-tabs-left">
            <div class="tab-pane fade in active" id="one" role="tabpanel">
              <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" >
                <h3> Your Account Information</h3>

              <div class="account-dp">
                 <div class="lt-top">
                    <div class="ic-box">
                      <img src="images/.jpg" alt="">
                    </div>
                    <div class="rt-txt">
                      <h2>{{$user[0]->name}}</h2>
                      <p class="ml-sz">{{$user[0]->email}}</p>
                    </div>
                  </div>
                  <div class="ac-desc">
                    <h2>Address :</h2>
                  <p>{{ $default_address }}</p>
                    <h2 class="acc-add">Mobile :</h2>
                    <p class="acc-add-dec">{{$user[0]->mobile}}</p>
                    
                  </div>
                  <div class="edit profile">
                    <a href="javascript:void();" id="btnEditAccount">Edit</a>
                    
                    {{-- <input type="button" id="btnEditAccount" value="Edit"> --}}
                  </div>

                </div>
              </div>

      
                  <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="editAccount">
                    <h3>Edit Account</h3>
                    <div class="acc-form-sec to" data-toggle">
                        <form id="updateAccountForm">
                    <div class="box">
                      <h2>Email</h2>
                        <div class="form-group">
                        <input type="text" readonly placeholder="Password" name="inputEditEmail" 
                        class="form-control" value="{{$user[0]->email}}">
                        </div>
                        <h2>Name</h2>
                        <div class="form-group">
                            <input type="text" placeholder="Password" name="inputEditName" class="form-control"
                            value="{{$user[0]->name}}">
                            <span class="help-block"></span>
                        </div>
                        <h2>Mobile</h2>
                        <div class="form-group">
                        <input type="text" placeholder="Mobile Number" name="inputEditMobile" class="form-control"
                        value="{{$user[0]->mobile}}">
                        <span class="help-block"></span>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                          <input type="submit" value="Submit" id="updateAccountSubmit" class="subone">
                        </div>
                      </div>
                     </div>
                      
                    </div>
                  </form>
                  </div>
                </div>
             

            </div>
            




            <div class="tab-pane fade" id="two" role="tabpanel">
              <div class="col-sm-12">
                <h3>Change Password</h3>
                <div class="acc-form-sec">
                    <form id="resetForm">
                  <div class="box">
                    <h2>Old Password</h2>
                  
                    <div class="form-group">
                    <input type="password" placeholder="Password" name="inputOldPassword" class="form-control">
                    <span class="help-block"></span>
                    </div>
                  
                </div>
                <div class="box">
                  <h2>New Password</h2>
                  
                    <div class="form-group">
                    <input type="password" placeholder="Password" name="inputNewPassword" class="form-control">
                    <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                    <input type="password" placeholder="Confirm Password" name="inputCnfPassword" class="form-control">
                    <span class="help-block"></span>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <input type="submit" value="Submit" id="resetPasswordSubmit" class="subone">
                      
                    </div>
                  </div>
                 </div>
                  
                </div>
              </form>
              </div>
            </div>
          </div>
            <div class="tab-pane fade" id="three" role="tabpanel">
          <div class="col-sm-12">
                <h3>Modify your Shipping Address</h3>
                  @foreach($user as $eachaddress)
                    @if($eachaddress->address)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                     <div class="box-dv">
                          <div class="lt-top">
                              
                              <div class="rt-txt">
                                  @if($eachaddress->is_default=='1')
                                  <h3>(Default Address)</h3>
                                  @endif
                                <h2>{{$eachaddress->address}}
                                   
                                </h2>
                                
                               
                             </div>
                            </div>
                            <div class="ac-descnew">

                              <h2>Landmark</h2>
                              <p>{{$eachaddress->landmark}}<p>
                             <!-- <h2>PINCODE</h2> -->
                            <p>{{ $eachaddress->pincode }}</p>
                              <!--<h2>CITY</h2>
                              <p>{{$eachaddress->city}}</p>
                              <h2>COUNTRY</h2>
                              <p>{{$eachaddress->country}}</p> -->
                              
                            </div>
                            <div class="edit">
                              <a href="javascript:void(0);" id="editAddressBtn" onclick="getAddressDetail({{$eachaddress->user_address_id}});">Edit</a>
                              
                            </div>
                            <div class="edit default">
                            <a href="javascript:void(0);" id="editAddressBtn" onclick="setDefaultAddress({{$eachaddress->user_address_id}});">Set Default</a>
                            </div>
                          </div>
                    </div>
                    @endif
                  @endforeach

                
              </div>

              <div class="col-sm-12" id="editaddress">
                <h2>EDIT ADDRESS</h2>
                <div class="box fmt">
                  <form id="editAddressForm">
                
                  <div class="col-sm-6">
                    <div class="form-group">
                     <input type="text" placeholder="Address" name="inputEditAddress" class="form-control">
                     <span class="help-block"></span>
                     <input type="hidden" name="edit_address_id">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" placeholder="Landmark" name="inputEditLandmark" class="form-control">
                    <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                    <input type="text" placeholder="City" name="inputEditCity" class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <input type="text" placeholder="Post Code" name="inputEditPincode" class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                     
                      <select  name="inputEditCountry" placeholder="Country" class="form-control">
                        <option value="INDIA">INDIA</option>
                       
                      </select>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <input type="text" placeholder="Mobile Number" name="inputEditPhone" class="form-control">
                  <span class="help-block"></span>
                </div>
              </div>
               <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                    <input type="submit" value="Submit" id="updateAddressSubmit" class="sub">
                  </div>
                </div>
               </div>
                  </form>
                </div>
              </div>
              

             <div class="row">
                <div class="col-md-12 col-position">
                    <div class="adn-ew">
                        <a href="javascript:void()" id="addNewAddress">Add New</a>
                        <a href="javascript:void()" id="cancelNewAddress">Cancel</a>
                      </div>
                </div>
              </div>
              <div class="col-sm-12" id="newaddress">
                <h2 class="add-head">Add New Address</h2>
                <div class="box fmt">
                  <form id="addressForm">
                
                  <div class="col-sm-6">
                    <div class="form-group">
                     <input type="text" placeholder="Address" name="inputAddress" class="form-control">
                     <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" placeholder="Landmark" name="inputLandmark" class="form-control">
                    <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                    <input type="text" placeholder="City" name="inputCity" class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <input type="text" placeholder="Post Code" name="inputPincode" class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                     
                      <select id="browsers" name="inputCountry" placeholder="Country" class="form-control">
                        <option value="INDIA">INDIA</option>
                        
                      </select>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <input type="text" placeholder="Mobile Number" name="inputPhone" class="form-control">
                  <span class="help-block"></span>
                </div>
              </div>
               <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                    <input type="submit" value="Submit" id="addressSubmit" class="sub">
                  </div>
                </div>
               </div>
                  </form>
                </div>
              </div>
              
            </div>
            <div class="tab-pane fade" id="four" role="tabpanel">
              <div class="col-sm-12">
                <h3>My Wish List</h3>
                <div id="wishlistContent">
                  
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="five" role="tabpanel">
              <div class="col-sm-12">
                <h3>Your order history</h3>
              </div>
              <div id="orderDiv"></div>
            </div>
            <div class="tab-pane fade" id="newone" role="tabpanel">
              <div class="col-sm-12">
                <h3>Student Membership</h3>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

              <div id="studentString"></div>

                
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <div class="profile-sup">
                  <h2>Products</h2>
                  <div id="productList"></div>
                </div>
              </div>

              
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="eight" role="tabpanel">
              <div class="col-sm-12">
                <h3>View your return requests</h3>
              </div>
            </div>
            <div class="tab-pane fade" id="nine" role="tabpanel">
              <div class="col-sm-12">
                <h3>Your Transactions</h3>
              </div>
            </div>
            <div class="tab-pane fade" id="seven" role="tabpanel">
              <div class="col-sm-12">
                <h3 id="walletbalance">Your Wallet Balance </h3>
              </div>
            </div>
            <!-- <div class="tab-pane fade" id="ten" role="tabpanel">
              <div class="col-sm-12">
                <h3>Recurring payments</h3>
              </div>
            </div> -->
            <div class="tab-pane fade" id="eleven" role="tabpanel">
              <div class="col-sm-12">
                <h3>Subscribe or Unsubscribe</h3>
                <div class="row">
                    <div class="col-md-12">
                       

                            <h5>Get ocaasional updates to {{$user[0]->email}}</h5>
                            <a href="javascript:void()" id="subscribeBtn">Subscribe</a>
                            
                         
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

  </div>
    
   </div>
 </div>
</div>

@endsection

@section('scriptarea')

<script>
    $(document).ready(function () {
      

    var sideTabsPaneHeight = function() {
      var navHeight = $('.nav-tabs.nav-tabs-left').outerHeight() || $('.nav-tabs.nav-tabs-right').outerHeight() || 0;
  
      var paneHeight = 0;
  
      $('.tab-content.side-tabs .tab-pane').each(function(idx) {
        paneHeight = $(this).outerHeight() > paneHeight ? $(this).outerHeight() : paneHeight;
      });
  
      $('.tab-content.side-tabs .tab-pane').each(function(idx) {
        $(this).css('min-height', navHeight + 'px');
      });
    };
    
    $(function() {
      sideTabsPaneHeight();
  
      $( window ).resize(function() {
        sideTabsPaneHeight();
      });
  
      $( '.nav-tabs.nav-tabs-left' ).resize(function() {
        sideTabsPaneHeight();
      });
    });
  });

  $('#newaddress').hide();
  $('#cancelNewAddress').hide();
  $('#editAccount').hide();
  $('#editaddress').hide();
  

  $('#addNewAddress').click(function(){
    $('#newaddress').show();
    $('#cancelNewAddress').show();
    $('#addNewAddress').hide();
  });

  $('#cancelNewAddress').click(function(){
    $('#newaddress').hide();
    $('#cancelNewAddress').hide();
    $('#addNewAddress').show();
  });

  $('#btnEditAccount').click(function(){
      $('#editAccount').show();
    });

  // $(document.body).on('#btnEditAccount','click',function(){
  //   $('#editAccount').show();
  // });

  // $(document).ready(function() {
    
  // });



  </script>

@endsection