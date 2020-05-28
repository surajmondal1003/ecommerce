@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit Admin User : {{$user['name']}}</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="editadminuserForm">
                                                    <input type="hidden" name="id" value="{{$user['id']}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>User Full Name</label>
                                                                    <input type="text" name="inputUserName" placeholder="This will show in Front end" class="form-control cForm" value="{{ $user['name'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="text" name="inputEmail" placeholder="This will show in address bar" class="form-control cForm" value="{{ $user['email'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                            
                                                                    
                                                                    <input type="password" name="inputPassword"  class="form-control cForm"  >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(isPermitted('admin/update-admin-user',Auth::user()->id))
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="editadminusersubmit">Save</button>
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