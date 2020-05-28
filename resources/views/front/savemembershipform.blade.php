@extends('layouts.app')

@section('content')


<div class="inner-page-hd-member-form">
        <div class="container">
          @if($is_member)

          <h1 class="memh1 on cartCount text-red blink-soft">Sorry..You are already a member. You have joined {{$is_member->membership_name}} for {{$is_member->membership_plan}}.</h1>
          <div class="cntr-algn">
            <a href="{{ url('') }}" class="buybtn-to-continue on">Continue Shopping</a>
          </div>
          @else

          <h1 class="memh1">Membership form for {{$membership->membership_name}}</h1>
          <div class="row">
          <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="member-form sub">
            <div class="row">
              <form id="savememberform">


                  <div class="top-sec2">
                      <div class="step1" id="addressStep1">
                          <h2>Delivery Address</h2>
                            <div>
                              
                              @if(count($useraddress)<1)
                              
                               <div class="row">
                                <div class="col-md-12">
                                    <h4>You have no addresses yet</h4>
                                    
                                </div>
                              </div> 
                              @else
                              @foreach($useraddress as $eachaddress )
          
                              
                            <div class="md-radio md-radio-inline">
                              <input id="{{$eachaddress->user_address_id}}" type="radio" name="inputSaddress" value="{{$eachaddress->user_address_id}}"
                              @if($eachaddress->is_default=='1') checked @endif onclick="loadMembershipDeliverBtn(this.value)">
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
                              <button type="button" class="buybtn deliver-btn" value="{{$eachaddress->user_address_id}}" onclick="checkMembershiporderPincode(this.value)">Deliver Here</button>
                                @endif
                              </div>
                              @endforeach
                            @endif
                          </div>
                        <button type="button" class="popup-address" data-toggle="modal" data-target="#myModal">Add new</button>
                        
                    </div>
                  </div>



                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                     <select class="form-control cForm" name="inputSdept" onchange="getSemester(this.value,'{{$membership->membership_id}}')">
                            <option value="0">Select Degree</option>
                        @foreach($categories as $cat)
                     <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                      @endforeach
                    </select> 
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group" id="streamDiv">
                        <select  name="inputStream" class="form-control cForm" onchange="changePlan(this.value)">
                        <option value="0">Select Stream</option>
                      {{-- @foreach($membershipdetail as $item)
                        <option value="{{$item->membership_detail_id}}">{{$item->membership_plan}}</option>
                      @endforeach --}}
                        </select>
                        <span class="help-block"></span>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group" id="semesterDiv">
                        <select  name="inputPlan" class="form-control cForm" onchange="changePlan(this.value)">
                        <option value="0">Select Semesters</option>
                      {{-- @foreach($membershipdetail as $item)
                        <option value="{{$item->membership_detail_id}}">{{$item->membership_plan}}</option>
                      @endforeach --}}
                        </select>
                        <span class="help-block"></span>
                  </div>
                </div>
               
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <input type="text" name="inputSname" readonly placeholder="Name" class="form-control cForm" value="{{$user->name}}">
                  <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="Email" name="inputSemail" readonly placeholder="Email" class="form-control cForm" value="{{$user->email}}">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="inputSphone" readonly placeholder="Phone" class="form-control cForm" value="{{$user->mobile}}">
                    <span class="help-block"></span>
                  </div>
                </div>
                
               
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="inputScollege" placeholder="College" class="form-control cForm">
                    <span class="help-block"></span>
                  </div>
                </div>
                
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="inputSrefferal" placeholder="Referral Id" class="form-control cForm">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  <div class="final-payable-ammount" >
                    <h2 class="cartCount text-red blink-soft" id="planPrice"></h2>
                  </div>
                </div>
                </div>
            
            
                  
                <div id="placeorderdiv" class="col-md-12 col-sm-12 col-xs-12">
                    @if(count($useraddress)<1)
                          
                    <p class="eror">You have no address.Please Add address</p>
                    

                    @endif
                    <p class="eror" id="undeliverableorder"></p>
                    
                  
                </div>
               

               
              </form>

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
                        <form id="addressmemberdialogform">
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
                          <input type="submit" value="submit" id="addressmemberdialogBtn" class="sub-btn">
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
            </div>
          </div>
          </div>

          <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="plan-desc" class="natural">
                    <div class="card-inr">
                            <h2 class="card-heading">{{$membership->membership_name}}</h2>
                            <div class="prime-desc">
                              <p> {{$membership->description}} </p>
                            </div>
                            <div class="prime-price">
                              <table>
                                <tr>
                                  <th>TENURE </th>
                                 
                                  <th> Prime Price</th>
                                </tr>
                                
                                @foreach($membershipdetail as $item)
                                <tr>
                                  <td>{{$item->membership_plan}}</td>
                                 
                                <td class="bg">Rs {{$item->membership_price}}</td>
                                </tr>
                                @endforeach
      
                              </table>
                            </div>

                          </div>
            </div>   
          </div>
        </div>
        @endif
        </div>
  </div>
  @endsection
