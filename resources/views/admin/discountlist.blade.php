@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Discount Categories</h4>
                                        @if(isPermitted('admin/add-discount',Auth::user()->id))
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-discount') }}">Add New Discount</a></div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tablediscountlist" class="table table-lg table-hover">
                                                <thead>
                                                        <th>Discount Percent</th>
                                                        <th>Plan</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection