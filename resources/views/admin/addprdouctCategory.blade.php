@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add New Prdouct Category</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="addproductcategoryForm">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Prdouct Category Name</label>
                                                                    <input type="text" name="inputCategory_name" placeholder="This will show in Front end" class="form-control cForm">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Parent</label>
                                                                    <select name="inputCParent"  class="form-control">
                                                                        <option value="0">No Parent</option>
                                                                        @foreach ($productcategory as $bc)
                                                                          <option value="{{$bc->category_id}}">{{$bc->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="form-error"></span>
                                                                    
                                                                </div>
                                                            </div>
                                                       
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                               
                                                                    <div class="form-group">
                                                                        <label>Product Category URL</label>
                                                                        <input type="text" name="inputCUrl" placeholder="This will show in address bar" class="form-control cForm" >
                                                                        <span class="form-error"></span>
                                                                    </div>
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                               
                                                                <div class="form-group">
                                                                    <label>Product Poisition</label>
                                                                    <input type="text" name="inputCPosition" placeholder="This will show in address bar" class="form-control cForm" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            
                                                        </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="prodcategorysubmit">Save</button>
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