@extends('layouts.admin')
@section('content')
<div class="row">
   
    <input type="hidden" name="user_id" value="{{$user_id}}">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of User Address </h4>

                                        @if(isPermitted('admin/add-user-address',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-user-address?user_id='.$user_id) }}">Add New User Address</a></div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="useraddresslist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>Address</th>
                                                        <th>LandMark</th>
                                                        <th>City</th>
                                                        <th>Country</th>
                                                        <th>Pincode</th>
                                                        <th>Phone Number</th>
                                                        <th>Action</th>
                                                        
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection