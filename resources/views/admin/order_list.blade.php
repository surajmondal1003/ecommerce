@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <form id="orderListForm" method="POST" target="_blank" action="/admin/print-shipping-details">
                                    @csrf
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Orders </h4>
                                        
                                            <div class="col-md-4">
                                                <div class="col text-right">
                                                <label>Order Status</label>
                                                <select name="inputOrderStatus"  class="form-control cForm" onchange="reloadorderlist(this.value)">
                                                        <option value="">All Statuses</option>
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
                                                        <option value="shipped">Shipped</option>
                                                        <option value="voided">Voided</option>
                                                        <option value="returnpending">Return Pending</option>
                                                        <option value="returncomplete">Return Complete</option>
                                                        <option value="awaitingproduct">Return Awaiting Product</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col text-right"><button type="submit" class="btn btn-success" id="printShippingInvoice">Print Shipping Invoice</button></div>
                                            
                                            {{-- <div class="col text-right"><a class="btn btn-success" href="{{ url('admin/add-product') }}">Add New Order</a></div> --}}
                                          
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tableorderlist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>Check Order</th>
                                                        <th>Order No</th>
                                                        <th>Customer Type</th>
                                                        <th>Customer</th>
                                                        <th>Membership Number</th>
                                                        <th>Total</th>
                                                        <th>Date Added</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                 
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                    </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
@endsection