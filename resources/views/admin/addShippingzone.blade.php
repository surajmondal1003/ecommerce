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
                                                    <form id="shippingZoneForm">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="width: 50%">
                                                                    <label>Zone Name</label>
                                                                    <input type="text" name="inputZone_name"  class="form-control cForm">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                                <div class="form-group" style="width: 50%">
                                                                        <label>Usually delivered by</label>
                                                                        <input type="number" name="inputDeliveryperiod"  class="form-control cForm">
                                                                        <span class="form-error"></span>
                                                                </div>
                                                                <table id="pincodeContainer">
                                                                        <tr>
                                                                            <td>
                                                                                    <div class="input-group">
                                                                                        <label>Pincode</label>
                                                                                        <input type="text" name="inputzonePincode[0]" class="form-control cForm" style="margin: 0 10px;">
                                                                                        <span class="form-error"></span>
                                                                                    </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <label>COD available</label>
                                                                                    <select name="inputzoneCod[0]" class="form-control cForm" style="margin: 0 10px;">
                                                                                            <option value="no">No</option>
                                                                                        <option value="yes">Yes</option>
                                                                                        
                                                                                        
                                                                                    </select>
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                    </table>
                                                                    <input type="button" id="addMore" value="Add More" class="btn btn-primary" style="margin: 1px 0 0 0;padding:6px 12px;">
                                                            </div>
                                                           {{-- <div class="col-md-6">
                                                            
                                                            
                                                           </div> --}}
                    
                                                        {{-- </div>
                                                        <div class="row"> --}}
                                                                
                                                                <div class="col-md-6 col-xs-6">
                                                                        <h4 class="card-title">Price based shipping</h4>
                                                                    <table id="pricebasedContainer">
                                                                        <tr>
                                                                            <td>
                                                                                <label>Logistic Partner</label>
                                                                                <input type="text" name="inputshippingName[0]" class="form-control cForm">
                                                                                <span class="form-error"></span>
                                                                            </td>
                                                                            <td>
                                                                                    <label>Shipping Price</label>
                                                                                    <input type="text" name="inputshippingPrice[0]" class="form-control cForm">
                                                                                    <span class="form-error"></span>
                                                                            </td>
                                                                            <td>
                                                                                    <label>Minimum Price</label>
                                                                                    <input type="text" name="inputminPrice[0]" class="form-control cForm">
                                                                                    <span class="form-error"></span>
                                                                            </td>
                                                                            <td>
                                                                                    <label>Maximum Price</label>
                                                                                    <input type="text" name="inputmaxPrice[0]" class="form-control cForm">
                                                                                    <span class="form-error"></span>
                                                                            </td>
                                                                           
                                                                        </tr>
                                                                    </table>
                                                                    <input type="button" id="addMorePriceBased" value="Add More" class="btn btn-primary" style="    margin: 30px 0 0 0;padding:6px 12px;">
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="shippingZoneSubmit">Save</button>
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
@section('scriptarea')

<script>


var i=1;
var j=1;
var k=1;

$('#addMore').click(function(){

var div='<tr><td>'+
        '<div class="input-group">'+
                '<label>Pincode</label>'+
                '<input type="text" name="inputzonePincode['+i+']" class="form-control cForm" style="margin: 0 10px;">'+
                '<span class="form-error"></span>'+
            '</div>'+
        '</td> <td><div class="input-group"><label>COD available</label>'+
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