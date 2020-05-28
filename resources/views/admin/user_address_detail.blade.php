@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                    <h4 class="card-title">Edit User Addres of ::{{$useraddress['name']}}</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="edituserAddressForm">
                                                    <input type="hidden" name="user_address_id" value="{{$useraddress['user_address_id']}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" name="inputAddress" placeholder="This will show in Front end" class="form-control cForm" value="{{ $useraddress['address'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Lanmark</label>
                                                                    <input type="text" name="inputLanmark" placeholder="This will show in address bar" class="form-control cForm" value="{{ $useraddress['landmark'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                          

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                            
                                                                    
                                                                    <input type="text" name="inputCity" placeholder="This will show in address bar" class="form-control cForm" value="{{ $useraddress['city'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                            
                                                                    
                                                                <input type="text" name="inputCountry"  class="form-control cForm"  value="{{$useraddress['country']}}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                          

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Pincode</label>
                                                            
                                                                    
                                                                    <input type="text" name="inputPin" placeholder="This will show in address bar" class="form-control cForm" value="{{ $useraddress['pincode'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                            
                                                                    
                                                                <input type="text" name="inputPhone"  class="form-control cForm"  value="{{$useraddress['phone_no']}}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(isPermitted('admin/update-user-address-list-detail',Auth::user()->id))
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="edituserAddresssubmit">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection