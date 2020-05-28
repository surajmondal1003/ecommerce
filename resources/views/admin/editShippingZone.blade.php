
@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add New Shipping Zone</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-12 ml-auto mr-auto">
                                                    <form id="updateshippingZoneForm">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="width: 50%">
                                                                    <label>Zone Name</label>
                                                                <input type="text" name="inputZone_name"  class="form-control cForm" value="{{ $shippingDetail['zone_name'] }}">
                                                                <input type="hidden" name="zone_id" value="{{ $shippingDetail['zone_id'] }}">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                                <div class="form-group" style="width: 50%">
                                                                        <label>Usually delivered by</label>
                                                                        <input type="number" name="inputDeliveryperiod"  class="form-control cForm" value="{{ $shippingDetail['delivery_period'] }}">
                                                                        <span class="form-error"></span>
                                                                </div>
                                                                <table id="pincodeContainer">
                                                                        <?php $i = 0; ?>
                                                                        @foreach ($shippingDetail['pincodes'] as $item)
                                                                        <tr>
                                                                            <td>
                                                                                    <div class="input-group">
                                                                                        <label>Pincode</label>
                                                                                        <input type="text" name="inputzonePincode[{{$i}}]" class="form-control cForm" 
                                                                                    style="margin: 0 10px;" value="{{$item['pincode']}}">
                                                                                    <span class="form-error"></span>
                                                                                    <input type="hidden" name="zone_pincode_id[{{$i}}]" value="{{ $item['zone_pincode_id'] }}"> 
                                                                                        
                                                                                    </div>
                                                                            </td>
                                                                            <td>
                                                                                    <div class="input-group">
                                                                                        <label>COD available</label>
                                                                                        <select name="inputzoneCod[{{$i}}]" class="form-control cForm" style="margin: 0 10px;">
                                                                                                <option value="no" @if($item['available_cod']=='no') selected @endif>No</option>
                                                                                            <option value="yes" @if($item['available_cod']=='yes') selected @endif>Yes</option>
                                                                                            
                                                                                            
                                                                                        </select>
                                                                                        <span class="form-error"></span>
                                                                                    </div>
                                                                            </td>
                                                                        
                                                                        </tr>
                                                                        <?php $i++; ?>
                                                                        @endforeach
                                                                    </table>
                                                                    <input type="button" id="addMore" value="Add More" class="btn btn-primary" style="margin: 1px 0 0 0;padding:6px 12px;">
                                                            </div>
                                                         
                                                                
                                                                <div class="col-md-6 col-xs-6">
                                                                        <h4 class="card-title">Price based shipping</h4>
                                                                    <table id="pricebasedContainer">
                                                                            <?php $j = 0; ?>
                                                                        @foreach ($shippingDetail['shipping_price'] as $priceitem)
                                                                        <tr>
                                                                            <td>
                                                                                <label>Logistic Partner</label>
                                                                            <input type="text" name="inputshippingName[{{$j}}]" class="form-control cForm" value="{{$priceitem['shipping_name']}}">
                                                                            <input type="hidden" name="shippingprice_id[{{$j}}]" value="{{ $priceitem['shippingprice_id'] }}">    
                                                                            <span class="form-error"></span>
                                                                            </td>
                                                                            <td>
                                                                                    <label>Shipping Price</label>
                                                                                    <input type="text" name="inputshippingPrice[{{$j}}]" class="form-control cForm" value="{{$priceitem['shipping_price']}}">
                                                                                    <span class="form-error"></span>
                                                                            </td>
                                                                            <td>
                                                                                    <label>Minimum Price</label>
                                                                                    <input type="text" name="inputminPrice[{{$j}}]" class="form-control cForm" value="{{$priceitem['min_price']}}">
                                                                                    <span class="form-error"></span>
                                                                            </td>
                                                                            <td>
                                                                                    <label>Maximum Price</label>
                                                                                    <input type="text" name="inputmaxPrice[{{$j}}]" class="form-control cForm" value="{{$priceitem['max_price']}}">
                                                                                    <span class="form-error"></span>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <?php $j++; ?>
                                                                        @endforeach

                                                                    </table>
                                                                    <input type="button" id="addMorePriceBased" value="Add More" class="btn btn-primary" style="    margin: 30px 0 0 0;padding:6px 12px;">
                                                                </div>
                                                        </div>
                                                        @if(isPermitted('admin/update-shipping-zone',Auth::user()->id))
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="updateshippingZoneSubmit">Save</button>
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
@section('scriptarea')

<script>


var i=<?php echo count($shippingDetail['pincodes']); ?>;
var j=<?php echo count($shippingDetail['shipping_price']); ?>;
var k=1;

$('#addMore').click(function(){

var div='<tr><td>'+
        '<div class="input-group">'+
                '<label>Pincode</label>'+
                '<input type="text" name="inputzonePincode['+i+']" class="form-control cForm" style="margin: 0 10px;">'+
                '<span class="form-error"></span>'+
            '</div>'+
        '</td><td><div class="input-group"><label>COD available</label>'+
                '<select name="inputzoneCod['+i+']" class="form-control cForm" style="margin: 0 10px;">'+
                        '<option value="no">No</option>'+
                    '<option value="yes">Yes</option>'+
                    '</select><span class="form-error"></span></div></td>'+
        '<td><a class="btn btn-danger pull-right rmv" href="javascript:void();" >Remove</a></td></tr>';

    $('#pincodeContainer').append(div);
    i++;
});


$('#addMorePriceBased').click(function(){

var div1='<tr><td><label>Logistic Partner</label>'+
'<input type="text" name="inputshippingName['+j+']" class="form-control cForm">'+
'<span class="form-error"></span></td><td><label>Shipping Price</label>'+
'<input type="text" name="inputshippingPrice['+j+']" class="form-control cForm">'+
'<span class="form-error"></span></td><td><label>Minimum Price</label>'+
'<input type="text" name="inputminPrice['+j+']" class="form-control cForm">'+
'<span class="form-error"></span></td><td><label>Maximum Price</label>'+
'<input type="text" name="inputmaxPrice['+j+']" class="form-control cForm">'+
 '<span class="form-error"></span></td>'+
 '<td><a class="btn btn-danger pull-right rmv" href="javascript:void();">Remove</a></td></tr>';

    $('#pricebasedContainer').append(div1);
    j++;
});


$(document.body).on('click','.rmv',function(e){
    
     e.preventDefault();

    $(this).closest("tr").remove();
});

</script>
@endsection