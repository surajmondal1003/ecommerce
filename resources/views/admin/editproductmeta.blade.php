@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit Product Meta : {{$pagemeta['pName']}}</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-10 ml-auto mr-auto">
                                                    <form id="updateProductMetaForm">
                                                    <input type="hidden" name="id" value="{{$pagemeta['pId']}}">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Product Title</label>
                                                                    <input type="text" name="inputTitle" placeholder="Page Title" class="form-control cForm" value="{{$pagemeta['pTitle']}}">
                                                                  
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Meta Description</label>
                                                                    <input type="text" name="inputMetaDesc" placeholder="Meta Description" class="form-control cForm" value="{{$pagemeta['mDesc']}}">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Meta Keyword</label>
                                                                    <input type="text" name="inputMetaKeyWord" id="inputMetaKeyWord" class="form-control" placeholder="comma separated keyword" value="{{$pagemeta['mKeyWord']}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Meta Robot</label>
                                                                   <input type="text" name="inputMetaRobot" class="form-control" placeholder="Meta robot" value="{{$pagemeta['mRobot']}}">
                                                                </div>
                                                            </div>
                                                       
                                                        
                                                        <div class="col-md-4 col-xs-4">
                                                            <div class="form-group">
                                                                    <label>Canonical Link</label>
                                                                    <input type="text" name="inputCanonicalLink" class="form-control cForm" placeholder="Canonical Link" value="{{$pagemeta['cLink']}}">
                                                                    
                                                                </div>
                                                            </div>
                                                        <div class="col-md-4 col-xs-4">
                                                        <div class="form-group">
                                                                    <label>Revisit after</label>
                                                                    <input type="text" name="inputRevisitAfter" class="form-control cForm" placeholder="Meta  revisit after" value="{{$pagemeta['mRevisitAfter']}}">
                                                                    
                                                                </div>
                                                                </div>
                                                       </div>
                                                       <div class="row">
                                                        <div class="col-md-4 col-xs-4">
                                                        <!-- <div class="form-group">
                                                                    <label>Canonical Link</label>
                                                                    <input type="text" name="inputCanonicalLink" class="form-control cForm" placeholder="Canonical Link">
                                                                    
                                                                </div> -->
                                                        </div>
                                                        <div class="col-md-4 col-xs-4">
                                                        <div class="form-group">
                                                                    <label>OG Locale</label>
                                                                    <input type="text" name="inputOglocale" class="form-control cForm" placeholder="Og Locale"  value="{{$pagemeta['oLocal']}}">
                                                                    
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4">
                                                        <div class="form-group">
                                                                    <label>OG Type</label>
                                                                    <input type="text" name="inputOgType" class="form-control cForm" placeholder="Og Type" value="{{$pagemeta['oType']}}">
                                                                    
                                                                </div>
                                                        </div>
                                                       </div>
                                                       <div class="row">
                                                        <div class="col-md-4 col-xs-4">
                                                            <div class="form-group">
                                                            <label>OG Image</label>
                                                                    <input type="text" name="inputOgImage" class="form-control cForm" placeholder="Og Image" value="{{$pagemeta['oImage']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4">
                                                            <div class="form-group">
                                                            <label>OG Title</label>
                                                                    <input type="text" name="inputOgTitle" class="form-control cForm" placeholder="Og Title" value="{{$pagemeta['oTitle']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4">
                                                            <div class="form-group">
                                                            <label>OG Description</label>
                                                                    <input type="text" name="inputOgDescription" class="form-control cForm" placeholder="Og Description" value="{{$pagemeta['oDesc']}}">
                                                            </div>
                                                        </div>
                                                       </div>
                                                       <div class="row">
                                                        <div class="col-md-4 col-xs-4">
                                                        <div class="form-group">
                                                            <label>OG Url</label>
                                                                    <input type="text" name="inputOgUrl" class="form-control cForm" placeholder="Og Url" value="{{$pagemeta['oUrl']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4">
                                                        <div class="form-group">
                                                            <label>OG Site Name</label>
                                                                    <input type="text" name="inputOgSiteName" class="form-control cForm" placeholder="Og Site Name" value="{{$pagemeta['oSite']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4">
                                                        <div class="form-group">
                                                            <label>Extra Head</label>
                                                                    <input type="text" name="inputExtraHeadCode" class="form-control cForm" placeholder="Extra head means site verification code etc" value="{{$pagemeta['eHeadCode']}}">
                                                            </div>
                                                        </div>
                                                       </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                            
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="productmetaUpdate">Save</button>
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