@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Users </h4>
                                        @if(isPermitted('admin/add-user',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-user') }}">Add New User</a></div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="userlist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>User Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Status</th>
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