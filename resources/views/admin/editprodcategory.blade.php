@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit Product Category : {{$prodCategories['category_name']}}</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="editprodcategoryForm">
                                                    <input type="hidden" name="id" value="{{$prodCategories['category_id']}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Product Category Name</label>
                                                                    <input type="text" name="inputEditCName" placeholder="This will show in Front end" class="form-control cForm" value="{{ $prodCategories['category_name'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Product Category URL</label>
                                                                    <input type="text" name="inputEditCUrl" placeholder="This will show in address bar" class="form-control cForm" value="{{ $prodCategories['category_url'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Parent</label>
                                                                    <select name="inputEditCParent"  class="form-control">
                                                                        <option value="0">No Parent</option>
                                                                        @foreach ($prodCategoriesList as $bc)
                                                                          <option value="{{$bc->category_id}}" @if($bc->category_id==$prodCategories['category_parent']) selected="selected" @endif >{{$bc->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Category Position</label>
                                                            
                                                                    
                                                                    <input type="text" name="inputEditCPosition" placeholder="This will show in address bar" class="form-control cForm" value="{{ $prodCategories['category_position'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                       
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                
                                                            </div>
                                                            @if(isPermitted('admin/update-prod-category',Auth::user()->id))
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="editprodcategorysubmit">Save</button>
                                                                </div>
                                                            </div>
                                                            @endif
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