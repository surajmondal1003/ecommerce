@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
                                <form id="addBlogForm" >
                                   
                                <div class="card" style="padding: 0 10px 0 10px">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">New Blog </h4>
                                    </div>
                                    <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Category</label>
                                                    <select name="inputBlogCategory" class="form-control cForm">
                                                    <option value="0">Select Blog Category</option>
                                                        @foreach($blogcategories as $blogcategory)
                                                            <option value="{{ $blogcategory->blog_category_id }}">{{ $blogcategory->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Title</label>
                                                    <input type="text" name="inputName" class="form-control cForm">
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Url</label>
                                                    <input type="text" name="inputUrl" class="form-control cForm">
                                                    
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Blog Image Alt</label>
                                                    <input type="text" name="inputAlt" class="form-control cForm">
                                                    
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
                                                        <input id="thumbnail" class="form-control cForm" type="text" name="inputSImage" >
                                                        <span class="form-error"></span>
                                                    </div>
                                                        <img id="holder" style="margin-top:15px;max-height:100px;">
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
                                                        <input id="thumbnailL" class="form-control cForm" type="text" name="inputLImage">
                                                        <span class="form-error"></span>
                                                    </div>
                                                        <img id="holderL" style="margin-top:15px;max-height:100px;">
                                                    
                                                
                                            </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>Blog Content</label>
                                                    <textarea name="pageeditor" id="pageeditor" class="form-control"></textarea>
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="addBlogPost">Save</button>
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