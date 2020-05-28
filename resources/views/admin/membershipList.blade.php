@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Membership</h4>
                                        @if(isPermitted('admin/add-student-membership',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-student-membership') }}">Add New MemberShip</a></div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tablemembershiplist" class="table table-lg table-hover">
                                                <thead>
                                                        <th>Session</th>
                                                        <th>Membership Name</th>
                                                        <th>MemberShip Code</th>
                                                      
                                    
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