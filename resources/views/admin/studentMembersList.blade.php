@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Student Members</h4>
                                        @if(isPermitted('admin/add-student-member',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-student-member') }}">Add New Member</a></div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tablestudentMemberslist" class="table table-lg table-hover">
                                                <thead>
                                                        <th>Membership Number</th>
                                                        <th>Student Name</th>
                                                        <th>Session</th>
                                                        <th>Membership Type</th>
                                                        <th>Membership Plan Name</th>
                                                        <th>Date Joined</th>
                                                        
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