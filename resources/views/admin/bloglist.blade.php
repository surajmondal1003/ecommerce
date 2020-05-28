@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Site Pages</h4>
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tablebloglist" class="table table-lg table-hover">
                                                <thead>
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Url</th>
                                                        <th>Category</th>
                                                        <th>Featured</th>
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