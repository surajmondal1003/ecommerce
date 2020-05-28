@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
                                <form id="editBannerForm" >
                                   <input type="hidden" name="id" value="{{$bannerInfo->id}}">
                                <div class="card" style="padding: 0 10px 0 10px">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit Banner  </h4>
                                    </div>
                                    <div class="card-block">
                                   
                                       <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Banner Image</label>
                                                    <!-- <input type="file" name="inputSImage" class="form-control">
                                                    
                                                <span class="form-error"></span> -->
                                                <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfmS" data-input="thumbnail" data-preview="holder" class="btn" style="border: 1px solid #e6ecf5;">
                                                            <i class="fa fa-picture-o"></i> Choose</a>
                                                         </span>
                                                        <input id="thumbnail" class="form-control cForm" type="text" name="inputSImage" value="{{$bannerInfo->banner_path }}">
                                                        <span class="form-error"></span>
                                                    </div>
                                                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ asset($bannerInfo->banner_path )}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                       
                                            </div>


                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>Banner Content</label>
                                                    <textarea name="pageeditor" id="pageeditor" class="form-control">{!! $bannerInfo->banner_content !!}</textarea>
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="editpagebanner">Save</button>
                                                                </div>
                                                            </div>
                                    </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
@endsection
@section('scriptarea')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
     $('#lfmS').filemanager('image');
</script>

@endsection