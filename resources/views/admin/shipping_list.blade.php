@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Shipping </h4>
                                        @if(isPermitted('admin/add-shipping-zone',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-shipping-zone') }}">Add New Shipping</a></div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="shippinglist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>Zone Name</th>
                                                        <th>Pincodes</th>
                                                        <th>Shipping Name</th>
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