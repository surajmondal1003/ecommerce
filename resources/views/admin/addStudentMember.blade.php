@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add New Student Member</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="addstudentMemberForm">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>User</label>
                                                                        <select name="inputuser"  class="form-control" onchange="getuserAddress(this.value)">
                                                                            <option value="0">No User</option>
                                                                            @foreach ($user as $eachUser)
                                                                                <option value="{{$eachUser->id}}">{{$eachUser->name}}({{$eachUser->email}})</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="form-error"></span>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <div class="form-group" id="addressDiv">
                                                                            <label>User Address</label>
                                                                            <select name="inputUserAddress"  class="form-control">
                                                                                    <option value="0">No Address</option>
                                                                                    
                                                                            </select>
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                        
                                                           
                                                           
                                                       
                                                        </div>
                                                        <div class="row">
                                                                
                                                                <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group">
                                                                            <label>Select Membership Type</label>
                                                                            <select class="form-control cForm" name="inputSmembership" onchange="getCategories(this.value)">
                                                                                    <option value="0">Select Membership Type</option>
                                                                                @foreach($membership as $mitem)
                                                                                    <option value="{{$mitem->membership_id}}">{{$mitem->membership_name}}</option>
                                                                                @endforeach
                                                                            </select> 
                                                                            <span class="form-error"></span>
                                                                    </div>
                                                                </div>
                                                            <div class="col-md-6 col-xs-6">
                                                               
                                                                    <div class="form-group" id="categoryDiv">
                                                                            <label>Select Degree</label>
                                                                            <select class="form-control cForm" name="inputSdept" onchange="getSemester(this.value)">
                                                                                   <option value="0">Select Degree</option>
                                                                               {{-- @foreach($categories as $cat)
                                                                            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                                                             @endforeach --}}
                                                                           </select> 
                                                                           <span class="form-error"></span>
                                                                    </div>
                                                                
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6 col-xs-6">
                                                               
                                                                        <div class="form-group" id="streamDiv">
                                                                                <select  name="inputStream" class="form-control cForm" onchange="changePlan(this.value)">
                                                                                <option value="0">Select Stream</option>
                                                                              {{-- @foreach($membershipdetail as $item)
                                                                                <option value="{{$item->membership_detail_id}}">{{$item->membership_plan}}</option>
                                                                              @endforeach --}}
                                                                                </select>
                                                                                <span class="form-error"></span>
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
                                                                              <span class="form-error"></span>
                                                                        </div>
                                                                      </div>
                                                                     
                                                               
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group" >
                                                                        <label>Plan Price</label>
                                                                            <input type="text" name="inputSPrice" readonly  class="form-control">

                                                                            <span class="form-error"></span>
                                                                      </div>
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group" >
                                                                        <label>College Name</label>
                                                                            <input type="text" name="inputScollege"  class="form-control">

                                                                            <span class="form-error"></span>
                                                                      </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group" >
                                                                            <label>Refferal Id</label>
                                                                                <input type="text" name="inputSreferral"   class="form-control">
    
                                                                                <span class="form-error"></span>
                                                                          </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="addStudentMembershipsubmit">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection