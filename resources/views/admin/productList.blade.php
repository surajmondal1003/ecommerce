@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Product </h4>

                                        @if(isPermitted('admin/add-product',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-product') }}">Add New Product</a></div>
                                        @endif

                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tableproductlist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>Name</th>
                                                        <th>SKU</th>
                                                        <th>Description</th>
                                                        <th>Regular Price</th>
                                                        <th>Discount Price</th>
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