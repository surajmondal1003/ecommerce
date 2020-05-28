@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add SubadminUser Permission</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="subadminpermissionForm">
                                                        <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Admin User</label>
                                                                        <select name="inputadmin"  class="form-control" onchange="getPermissions(this.value)" >
                                                                            <option value="0">No AdminUser</option>
                                                                            @foreach ($admins as $eachUser)
                                                                                <option value="{{$eachUser->id}}">{{$eachUser->name}}({{$eachUser->email}})</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="form-error"></span>
                                                                        
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div id="permissionsDiv">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="addSubadminPermissionSubmit">Save</button>
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