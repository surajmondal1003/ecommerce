@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
                                <form id="editBlogForm" >
                                   <input type="hidden" name="id" value="{{$blogdetails->id}}">
                                <div class="card" style="padding: 0 10px 0 10px">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit Blog : {{ $blogdetails->blog_title }} </h4>
                                    </div>
                                    <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Category</label>
                                                    <select name="inputBlogCategory" class="form-control cForm">
                                                    <option value="0">Select Blog Category</option>
                                                        @foreach($blogcategories as $blogcategory)
                                                            <option value="{{ $blogcategory->blog_category_id }}" @if($blogcategory->blog_category_id==$blogdetails->blog_category_id) selected="selected" @endif>{{ $blogcategory->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Title</label>
                                                    <input type="text" name="inputName" class="form-control cForm" value="{{ $blogdetails->blog_title }}">
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Url</label>
                                                    <input type="text" name="inputUrl" class="form-control cForm" value="{{ $blogdetails->blog_url }}">
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Image Alt</label>
                                                    <input type="text" name="inputAlt" class="form-control cForm" value="{{ $blogdetails->blog_image_alt }}">
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        
                                            
                                        </div>
                                        </div>
                                        <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Small Image</label>
                                                    <!-- <input type="file" name="inputSImage" class="form-control">
                                                    
                                                <span class="form-error"></span> -->
                                                <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfmS" data-input="thumbnail" data-preview="holder" class="btn" style="border: 1px solid #e6ecf5;">
                                                            <i class="fa fa-picture-o"></i> Choose</a>
                                                         </span>
                                                        <input id="thumbnail" class="form-control cForm" type="text" name="inputSImage" value="{{$blogdetails->blog_small_image }}">
                                                        <span class="form-error"></span>
                                                    </div>
                                                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ asset($blogdetails->blog_small_image )}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label>Blog Large Image</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfmL" data-input="thumbnailL" data-preview="holderL" class="btn" style="border: 1px solid #e6ecf5;">
                                                            <i class="fa fa-picture-o"></i> Choose</a>
                                                         </span>
                                                        <input id="thumbnailL" class="form-control cForm" type="text" name="inputLImage" value="{{$blogdetails->blog_large_image }}">
                                                        <span class="form-error"></span>
                                                    </div>
                                                        <img id="holderL" style="margin-top:15px;max-height:100px;" src="{{ asset($blogdetails->blog_large_image )}}">
                                                    
                                                
                                            </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>Blog Content</label>
                                                    <textarea name="pageeditor" id="pageeditor" class="form-control">{!! $blogdetails->blog_content !!}</textarea>
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="editBlogPost">Save</button>
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
     $('#lfmL').filemanager('image');
     $('#lfmS').filemanager('image');
</script>

@endsection