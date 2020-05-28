@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add New Blog Category</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="addblogcategoryForm">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Blog Category Name</label>
                                                                    <input type="text" name="inputName" placeholder="This will show in Front end" class="form-control cForm">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Blog Category URL</label>
                                                                    <input type="text" name="inputUrl" placeholder="This will show in address bar" class="form-control cForm">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Parent</label>
                                                                    <select name="inputParent"  class="form-control">
                                                                        <option value="0">No Parent</option>
                                                                        @foreach ($blogcategory as $bc)
                                                                          <option value="{{$bc->blog_category_id}}">{{$bc->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                       
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="blogcategorysubmit">Save</button>
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