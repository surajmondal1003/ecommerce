
@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Student membership Details</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-12 ml-auto mr-auto">
                                                    <form id="updatestudentmembershipForm">
                                                            <div class="row">

                                                                   
    
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Membership Unique No</label>
                                                                        <input type="text" readonly  placeholder="This will show in Front end" 
                                                                    class="form-control cForm" value="{{$membership['student_unique_no']}}">
                                                                        <span class="form-error"></span>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Student Name</label>
                                                                        <input type="text" readonly  placeholder="This will show in Front end" 
                                                                        class="form-control cForm"  value="{{$membership['student_name']}}">
                                                                        <span class="form-error"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Membership Type</label>
                                                                        <input type="text" readonly placeholder="This will show in Front end" 
                                                                        class="form-control cForm"  value="{{$membership['membership_name']}}">
                                                                        <span class="form-error"></span>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>

                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Membership Plan</label>
                                                                            <input type="text" readonly  placeholder="This will show in Front end" 
                                                                        class="form-control cForm" value="{{$membership['membership_plan']}}">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Date Joined</label>
                                                                            <input type="text" readonly  placeholder="This will show in Front end" 
                                                                            class="form-control cForm"  value="{{$membership['date_joined']}}">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Is Expired</label>
                                                                            <input type="text" readonly placeholder="This will show in Front end" 
                                                                            class="form-control cForm"  value="@if($membership['is_expired']=='0') Active @else Expired @endif">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                   
                                                            </div>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <label>Session</label>
                                                                                    <input type="text" readonly  placeholder="This will show in Front end" 
                                                                                    class="form-control cForm"  value="{{$membership['session']}}">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <label>User Address<address></address></label>
                                                                                    <input type="text" readonly  placeholder="This will show in Front end" 
                                                                                    class="form-control cForm"  value="{{$membership['address']}}">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                    </div>

                                                            </div>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <label>User Mobile<address></address></label>
                                                                                    <input type="text" readonly  placeholder="This will show in Front end" 
                                                                                    class="form-control cForm"  value="{{$membership['phone_no']}}">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                    </div>
                                                            </div>
                                                            <div class="clearfix">

                                                            </div>
                                                            <div class="row">
                                                                    
                                                                <div class="col-md-6">
                                                                        <table class="col-md-12" border="1">
                                                                            <tr>
                                                                            <td>Status</td>
                                                                            <td>Available for Order</td>
                                                                            <td>Result</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td>Not Applicable</td>
                                                                                    <td>No</td>
                                                                                    <td>Not Applicable</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td>Pending</td>
                                                                                    <td>No</td>
                                                                                    <td>Pending</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td>Pending</td>
                                                                                    <td>Yes</td>
                                                                                    <td>Place Order</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td>Ordered</td>
                                                                                    <td>Yes</td>
                                                                                    <td>Product Ordered</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td>Delivered</td>
                                                                                    <td>Yes</td>
                                                                                    <td>Product Delivered</td>
                                                                            </tr>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-12">
                                                               
                                                                <table class="col-md-12">
                                                                       
                                                                        @foreach ($membership['details'] as $item)
                                                                        <tr>
                                                                            <td>
                                                                                    <div class="input-group">
                                                                                        <label>Product</label>
                                                                                        <input type="text" readonly class="form-control cForm" 
                                                                                            style="margin: 0 10px;" value="{{$item['product_name']}}">
                                                                                    <input type="hidden" name="product_id[{{$item['product_id']}}]" value="{{$item['product_id']}}">
                                                                                    <span class="form-error"></span>
                                                                                    <input type="hidden" name="membership_product_id[{{$item['membership_product_id']}}]" value="{{ $item['membership_product_id'] }}"> 
                                                                                        
                                                                                    </div>
                                                                            </td>
                                                                            <td>
                                                                                    <div class="input-group">
                                                                                        <label>Status</label>
                                                                                        <select name="inputStatus[{{$item['membership_product_id']}}]" class="form-control cForm" style="margin: 0 10px;">
                                                                                                <option value="notapplicable" @if($item['status']=='notapplicable') selected @endif>Not Applicable</option>
                                                                                                <option value="pending" @if($item['status']=='pending') selected @endif>Pending</option>
                                                                                            <option value="delivered" @if($item['status']=='delivered') selected @endif>Delivered</option>
                                                                                            <option value="ordered" @if($item['status']=='ordered') selected @endif>Ordered</option>
                                                                                            
                                                                                            
                                                                                        </select>
                                                                                        <span class="form-error"></span>
                                                                                    </div>
                                                                            </td>
                                                                            <td>
                                                                                    <div class="input-group">
                                                                                        <label>Available for Order</label>
                                                                                        <select name="inputAvailableOrder[{{$item['membership_product_id']}}]" class="form-control cForm" 
                                                                                        style="margin: 0 10px;" @if($item['status']=='ordered') disabled @endif>
                                                                                              
                                                                                            <option value="yes" @if($item['is_orderable']=='yes') selected @endif>Yes</option>
                                                                                            <option value="no" @if($item['is_orderable']=='no') selected @endif>NO</option>
                                                                                            
                                                                                            
                                                                                        </select>
                                                                                        <span class="form-error"></span>
                                                                                    </div>
                                                                            </td>
                                                                        
                                                                        </tr>
                                                                       
                                                                        @endforeach
                                                                    </table>
                                                                   
                                                            </div>
                                                         
                                                                
                                
                                                        </div>
                                                        @if(isPermitted('admin/update-student-membership-detail',Auth::user()->id))
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="updateStudentMembershipSubmit">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection