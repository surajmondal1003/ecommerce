@extends('layouts.admin') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-heading border bottom">
                <h4 class="card-title">Edit Prdouct</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <form id="orderDetailForm">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-block">

                                                <div class="tab-info">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a href="#default-tab-1" class="nav-link active" role="tab" data-toggle="tab" aria-expanded="true">Order Details</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-2" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Shipping Details</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-3" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Products</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-4" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">History</a>
                                                        </li>
                                                        
                                                       
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane fade in active show" id="default-tab-1" aria-expanded="true">
                                                          
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                                <div class="row">
                                                                        <table id="orderdetails" border="1" class="col-md-12">
                                                                                
                                                                            <tr>
                                                                                <td>Order No</td>
                                                                                <td>{{$order['order_no']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Invoice No</td>
                                                                                <td>{{$order['invoice_no']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Customer Name</td>
                                                                                <td>{{$order['name']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Customer Email</td>
                                                                                <td>{{$order['email']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Customer Mobile</td>
                                                                                <td>{{$order['phone_no']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Customer Type</td>
                                                                                <td>{{$order['type']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Membership ID</td>
                                                                                <td>{{$order['student_unique_no']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Order Net Amount</td>
                                                                                <td>{{$order['net_total']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Order Status</td>
                                                                                <td>{{$order['status']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Date Created</td>
                                                                                <td>{{$order['created_at']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Date Modified</td>
                                                                                <td>{{$order['updated_at']}}</td>
                                                                            </tr>
                                                                           
                                                                        </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-2" aria-expanded="false">
                                                                <table id="shippingdetails" border="1" class="col-md-12">
                                                                                
                                                                        <tr>
                                                                            <td>Address</td>
                                                                            <td>{{$order['address']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Landmark</td>
                                                                            <td>{{$order['landmark']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>City</td>
                                                                            <td>{{$order['city']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pincode</td>
                                                                            <td>{{$order['pincode']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Payment Mode</td>
                                                                            <td>{{$order['paymentmode']}}</td>
                                                                        </tr>
                                                                      
                                                                       
                                                                    </table>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-3" aria-expanded="false">
                                                                <table id="orderdetails" border="1" class="col-md-12">
                                                                    <tr>
                                                                            <td>Product Name</td>
                                                                            <td>Quantity</td>
                                                                            <td>Subtotal</td>
                                                                    </tr>
                                                                    @foreach($order['products'] as $product_item)          
                                                                        <tr>
                                                                            
                                                                            <td>{{$product_item['product_name']}}</td>
                                                                            <td>{{$product_item['qty']}}</td>
                                                                            <td>{{$product_item['subtotal']}}</td>
                                                                        </tr>
                                                                       
                                                                    @endforeach
                                                                       <tr>
                                                                           <td colspan="2" style="text-align:right;">Item Total</td>
                                                                           <td colspan="2" style="text-align:right;">{{$order['itemtotal']}}</td>
                                                                       </tr>
                                                                       <tr>
                                                                           <td colspan="2" style="text-align:right;">Delivery Charges</td>
                                                                           <td colspan="2" style="text-align:right;">{{$order['delivery_charge']}}</td>
                                                                       </tr>
                                                                       <tr>
                                                                            <td colspan="2" style="text-align:right;">Total</td>
                                                                            <td colspan="2" style="text-align:right;">{{$order['net_total']}}</td>
                                                                        </tr>
                                                                    </table>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-4" aria-expanded="false">
                                                                <table id="orderdetails" border="1" class="col-md-12">
                                                                        <tr>
                                                                                <td>Date Added</td>
                                                                                <td>Status</td>
                                                                                
                                                                        </tr>
                                                                    @foreach($order['order_status'] as $statusItem)   
                                                                       
                                                                        <tr>
                                                                            <td>{{$statusItem->created_at}}</td>
                                                                            <td>{{$statusItem->status}}</td>
                                                                        </tr>
                                                                       
                                                                       @endforeach
                                                                    </table>

                                                                    <div class="row">
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <div class="form-group">
                                                                                        <label>Order Status</label>
                                                                                        {{-- <select name="inputOrderStatus" class="form-control cForm">
                                                                                               
                                                                                           
                                                                                        <option value="{{$all_status_item->status}}" 
                                                                                        @if($order['status']==$all_status_item->status) selected="selected" @endif>
                                                                                        {{ strtoupper($order['status']) }}
                                                                                        </option>
                                                                                                
                                                                                           
                                                                                        </select> --}}

                                                                                        <select name="inputOrderStatus"  class="form-control cForm">
                                                                                                <option value="cancelled">Canceled</option>
                                                                                                <option value="cancelledreversal">Canceled Reversal</option>
                                                                                                <option value="chargeback">Chargeback</option>
                                                                                                <option value="delivered">Delivered</option>
                                                                                                <option value="denied">Denied</option>
                                                                                                <option value="expired">Expired</option>
                                                                                                <option value="failed">Failed</option>
                                                                                                <option value="outofprint">Out of Print</option>
                                                                                                <option value="pending">Pending</option>
                                                                                                <option value="processed">Processed</option>
                                                                                                <option value="processing">Processing</option>
                                                                                                <option value="refunded">Refunded</option>
                                                                                                <option value="reversed">Reversed</option>
                                                                                                <option value="shipped" selected="selected">Shipped</option>
                                                                                                <option value="voided">Voided</option>
                                                                                                <option value="returnpending">Return Pending</option>
                                                                                                <option value="returncomplete">Return Complete</option>
                                                                                                <option value="awaitingproduct">Return Awaiting Product</option>
                                                                                        </select>

        
                                                                                  
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <div class="form-group">
                                                                                    <label>Notify User</label>
                                                                                    <input type="checkbox" checked name="inputNotifyUser" value="yes">
                                                                                    <input type="hidden"  name="order_id" value="{{$order['order_id']}}">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        </div>
                                                       

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="generalerror">
                                        </div>
                                        </div>
                                        @if(isPermitted('admin/update-order-status',Auth::user()->id))
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="text-right mrg-top-5">
                                                
                                                    <button type="submit" class="btn btn-success" id="updateOrderSubmit">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

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