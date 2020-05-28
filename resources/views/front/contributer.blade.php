@extends('layouts.inner')
@section('content')
<div class="blog-sec">
            <div class="rt-form">
                <form id="contributorForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group hvr-underline-from-left">
                                <h4></h4>
                                <input type="text" class="form-control" name="firstName" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group hvr-underline-from-left">
                                    <h4></h4>
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                </div>
                            </div>
                        <div class="col-md-6">
                                <div class="form-group hvr-underline-from-left">
                                    <h4></h4>
                                        <input type="tel" class="form-control" name="inputPhone" placeholder="phone">
                                    </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group hvr-underline-from-left">
                                        <h4></h4>
                                        <input type="email" class="form-control" name="inputEmail" placeholder="email">
                                    </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group hvr-underline-from-left">
                                    <div class="custom-file-input">
                                        <input type="file" name="uploadContent">
                                        <input type="text" placeholder="Upload your contant"  class="form-control">
                                        <input type="button" value="Attach" class="at">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  hvr-underline-from-left">
                                    <div class="custom-file-input">
                                        <input type="file" name="uploadImage">
                                        <input type="text" placeholder="Upload Your Featured Image" class="form-control">
                                        <input type="button" value="Attach" class="at">
                                    </div>
                                </div>
                                <h5>we accept only high quality image</h5>
                            </div>
                        
                        <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Message</h4>
                                        <textarea name="" class="form-control"></textarea>
                                    </div>
                        </div> -->
                        <div class="col-md-12">
                               <input type="submit" value="SUBMIT" id="contributorBtn" class="btn-default">
                            </div>
                    </div>
                </form>
        </div>
            </div>
@endsection