@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-md-12">
            <div class="card-block">
                <form id="orderSearchForm">
                    <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Date Start</label>
                                            {{-- <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' class="form-control"  name="inputStartDate" >
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div> --}}
                                            
                                            <input type="text" name="inputStartDate" class="form-control cForm" > 
                                            
                                        <span class="form-error"></span>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Date End</label>
                                            <input type="text" name="inputEndDate" class="form-control cForm">
                                            
                                        <span class="form-error"></span>
                                    </div>
                                </div>
                           
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label>Group By</label>
                                        <select name="inputGroupBy" class="form-control cForm">
                                      
                                           
                                        <option value="YEAR">Years</option>
                                        <option value="MONTH">Months</option>
                                        <option value="WEEK">Weeks</option>
                                        <option value="DAY">Days</option>
                                           
                                        </select>
                                        
                                    <span class="form-error"></span>
                                </div>
                            </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label>Order Status</label>
                                        <select name="inputOrderStatus"  class="form-control cForm">
                                                <option value="0">All Statuses</option>
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
                                        </select>
                                        
                                    <span class="form-error"></span>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <a class="btn btn-success" href="javascript:void(0)" id="orderSearch">Search</a>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">List of Orders </h4>
                                      
                                    </div>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="orderreportlist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>Date Start - Date End</th>
                                                        <th>No. Orders</th>
                                                        {{-- <th>No. Products</th> --}}
                                                        <th>Total</th>
                                                        
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection


@section('scriptarea')

<script>
    // $(function () {
    // $('#datetimepicker1').datetimepicker();
    // });
</script>
@endsection