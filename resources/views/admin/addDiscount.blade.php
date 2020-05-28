@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add New Discount</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="addDiscountForm">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Discount Percent</label>
                                                                    <input type="text" name="inputDiscpercent" placeholder="This will show in Front end" class="form-control cForm">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                               
                                                                    <div class="form-group">
                                                                        <label>Discount Plan</label>
                                                                        <input type="text" name="inputDiscountplan" placeholder="This will show in address bar" class="form-control cForm" >
                                                                        <span class="form-error"></span>
                                                                    </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="discountsubmit">Save</button>
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