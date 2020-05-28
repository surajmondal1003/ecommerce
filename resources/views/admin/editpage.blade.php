@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit Page: {{$pagedetails->page_name}}</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="editPageForm">
                                                        <input type="hidden" name="id" value="{{$pagedetails->page_id}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Page Title</label>
                                                                    <input type="text" name="inputName" placeholder="This will show in menu e.g. Contact Us" class="form-control cForm" value="{{$pagedetails->page_name}}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Page URL</label>
                                                                    <input type="text" name="inputUrl" placeholder="This will show in address bar" class="form-control cForm" value="{{$pagedetails->page_url}}">
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
                                                                        @foreach($parentList as $pages)
                                                                        <option value="{{$pages->page_id}}" @if($pages->page_id==$pagedetails->parent_id) selected="selected" @endif>{{$pages->page_name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Location</label>
                                                                    <select name="inputLocation" class="form-control">
                                                                        <option value="header" @if($pagedetails->location=="header") selected="selected" @endif>Show in header only</option>
                                                                        <option value="footer" @if($pagedetails->location=="footer") selected="selected" @endif>Show in footer only</option>
                                                                        <option value="both" @if($pagedetails->location=="both") selected="selected" @endif>Show in both header & footer</option>
                                                                        <option value="link" @if($pagedetails->location=="link") selected="selected" @endif>Display as a link</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            
                                                        <div class="col-md-6 col-xs-6">
                                                        <div class="form-group">
                                                                    <label>Position</label>
                                                                    <input type="text" name="inputPosition" class="form-control cForm" placeholder="e.g Numeric value " value="{{$pagedetails->position}}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="pageEdit">Save</button>
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
