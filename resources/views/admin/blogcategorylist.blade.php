@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Blog Categories</h4>
                                        <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-blog-category') }}">Add New Category</a></div>
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tableblogcagetorylist" class="table table-lg table-hover">
                                                <thead>
                                                        <th>Name</th>
                                                        <th>URL</th>
                                                        <th>Parent</th>
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