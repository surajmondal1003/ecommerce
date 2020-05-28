@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                    <h4 class="card-title">Add User Addres</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="adduserAddressForm">
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" name="inputAddress" placeholder="This will show in Front end" class="form-control cForm" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Lanmark</label>
                                                                    <input type="text" name="inputLanmark" placeholder="This will show in address bar" class="form-control cForm" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                          

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                            
                                                                    
                                                                    <input type="text" name="inputCity" placeholder="This will show in address bar" class="form-control cForm" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                            
                                                                    
                                                                <input type="text" name="inputCountry"  class="form-control cForm"  >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                          

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Pincode</label>
                                                            
                                                                    
                                                                    <input type="text" name="inputPin" placeholder="This will show in address bar" class="form-control cForm" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                            
                                                                    
                                                                <input type="text" name="inputPhone"  class="form-control cForm"  >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="adduserAddresssubmit">Save</button>
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