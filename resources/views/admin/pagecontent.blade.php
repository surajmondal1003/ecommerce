@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
                                <form id="updateContentForm" method="post" action="{{action('AdminPageController@updateContent')}}">
                                    <input type="hidden" name="id" value="{{$content->id}}">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Update Content : {{ $content->page_name }}</h4>
                                    </div>
                                    <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>Page Content</label>
                                                    <textarea name="pageeditor" id="pageeditor" class="form-control">{!!$content->page_content !!}</textarea>
                                                <span class="form-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="updatePageContent">Save</button>
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
<!-- <script>
    function test(){
        var data = document.getElementById('pageeditor').innerHTML;   
        
    }
    window.load=test();
</script> -->
@endsection
