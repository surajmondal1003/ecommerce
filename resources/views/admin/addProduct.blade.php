@extends('layouts.admin') @section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-heading border bottom">
                <h4 class="card-title">Add New Prdouct</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <form id="addproductForm">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-block">

                                                <div class="tab-info">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a href="#default-tab-1" class="nav-link active" role="tab" data-toggle="tab" aria-expanded="true">Prdouct Info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-2" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Product Category</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-3" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Product Discount</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-4" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Product Attributes</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-5" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Product Images</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-6" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Free Shipping Pincodes</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#default-tab-7" class="nav-link" role="tab" data-toggle="tab" aria-expanded="false">Non Deliverable Pincodes</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane fade in active show" id="default-tab-1" aria-expanded="true">
                                                          
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Prdouct Name</label>
                                                                            <input type="text" name="inputPrdouct_name" placeholder="This will show in Front end" 
                                                                            class="form-control cForm" onblur="transformurl()">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Product URL</label>
                                                                            <input type="text" name="inputPUrl" placeholder="This will show in address bar" class="form-control cForm">
                                                                            <span class="form-error"></span>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <label>Product Code</label>
                                                                            <input type="text" name="inputPCode" placeholder="This will show in Front end" class="form-control cForm">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <label>SKU</label>
                                                                            <input type="text" name="inputPsku" placeholder="This will show in Front end" class="form-control cForm">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <label>Regular Price</label>
                                                                            <input type="text" name="inputPregular_price" placeholder="This will show in Front end" class="form-control cForm">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <label>Discount Price</label>
                                                                            <input type="text" name="inputPdiscount_price" placeholder="This will show in Front end" class="form-control cForm">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <label>Quantity</label>
                                                                            <input type="text" name="inputPqty" placeholder="This will show in Front end" class="form-control cForm">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <label>Taxable</label>
                                                                            <select name="inputPtaxable" class="form-control cForm">
                                                                                <option value=" ">Select</option>
                                                                                <option value="1">Yes</option>
                                                                                <option value="0">No</option>
                                                                            </select>
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Product Description</label>
                                                                            {{-- <input type="text" name="inputPdesc" placeholder="This will show in address bar" class="form-control cForm"> --}}
                                                                            <textarea name="inputPdesc" rows="5" cols="50" class="form-control cForm"></textarea>
                                                                            <span class="form-error"></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">
                                                                            <div class="form-group">
                                                                                <label>Is Supreme Product</label>
                                                                                <select name="inputPsupreme" class="form-control cForm">
                                                                                    <option value=" ">Select</option>
                                                                                    <option value="1">Yes</option>
                                                                                    <option value="0">No</option>
                                                                                </select>
                                                                                <span class="form-error"></span>
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                                
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-2" aria-expanded="false">
                                                                <div id="categoryerror">
                                                                    </div>
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                                <?php display_category(0,1); ?>
                                                            </div>
                                                            
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-3" aria-expanded="false">
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                                @foreach ($discount as $bc)
                                                                <label>{{$bc->discount_plan}}</label><input type="checkbox" name="inputDiscountPlan[{{$bc->discount_id}}]" value="{{$bc->discount_id}}">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-4" aria-expanded="false">
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                            <table>
                                                                @foreach($attributes as $attribute)
                                                                <tr>
                                                                    <td><input type="hidden" name="inputAttrid[{{$attribute->attr_id}}]" value="{{$attribute->attr_id}}">{{$attribute->attr_name}} : </td>
                                                                    <td><input type="text" name="inputAttrval[{{$attribute->attr_id}}]" placeholder="Enter Value" class="form-control cForm"></td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-5" aria-expanded="false">
                                                            <div class="pdd-horizon-15 pdd-vertical-20" >
                                                                    <table id="imgContainer">
                                                                        <tr>
                                                                            <td>
                                                                            <div class="input-group">
                                                                                    <span class="input-group-btn">
                                                                                    <a id="lfm_0" data-input="thumbnail_0" data-preview="holder_0" class="btn bt" onClick="test()">
                                                                                        <i class="fa fa-picture-o"></i> Choose
                                                                                    </a>
                                                                                    </span>
                                                                                    <input id="thumbnail_0" class="form-control cForm" type="text" name="filepath[0]">
                                                                                    <span class="form-error"></span>
                                                                            </div>
                                                                            
                                                                                <img id="holder_0" style="margin-top:15px;max-height:100px;">
                                                                            </td>
                                                                            <td>
                                                                                <label>Set this Featured Image</label><input type="radio" name="featuredImg" value="0" class="fetaureimgcheck">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <input type="button" id="addMore" value="Add More" class="btn btn-primary">
                                                            </div>
                                                            <div id="featureimagerror">
                                                            </div>
                                                           
                                                        </div>

                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-6" aria-expanded="false">
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                                <table id="freeshiipngpincode">
                                                                    <tr>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Pincode</label>
                                                                                    <input type="text" name="inputFPincode[0]" class="form-control cForm" style="margin: 0 10px;">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                </table>
                                                                <input type="button" id="addFreeShippingMore" value="Add More" class="btn btn-primary" style="margin: 1px 0 0 0;padding:6px 12px;">
                                                            </div>
                                                        </div>

                                                        <div role="tabpanel" class="tab-pane fade" id="default-tab-7" aria-expanded="false">
                                                            <div class="pdd-horizon-15 pdd-vertical-20">
                                                                <table id="nonshippingpincode">
                                                                    <tr>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Pincode</label>
                                                                                    <input type="text" name="inputNonPincode[0]" class="form-control cForm" style="margin: 0 10px;">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                </table>
                                                                <input type="button" id="addNonShippingMore" value="Add More" class="btn btn-primary" style="margin: 1px 0 0 0;padding:6px 12px;">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="generalerror">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-success" id="prodsubmit">Save</button>
                                                </div>
                                            </div>
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
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>


var i=1;
var j=1;
var k=1;

$('#addMore').click(function(){

var div='<tr><td>'+
        '<div class="input-group">'+
                '<span class="input-group-btn">'+
                    '<a id="lfm_'+i+'" data-input="thumbnail_'+i+'" data-preview="holder_'+i+'" onClick="test()" class="btn bt">'+
                    '<i class="fa fa-picture-o"></i> Choose'+
                    '</a>'+
                '</span>'+
                '<input id="thumbnail_'+i+'" class="form-control cForm" type="text" name="filepath['+i+']"> <span class="form-error"></span>'+
        '</div>'+
        '<img id="holder_'+i+'" style="margin-top:15px;max-height:100px;">'+
        '</td><td><label>Set this Featured Image</label><input type="radio" name="featuredImg" class="fetaureimgcheck" value="'+i+'"></td>'+
        '<td><a class="btn btn-danger pull-right rmv" href="javascript:void();">Remove Row</a></td></tr>';

    $('#imgContainer').append(div);
    i++;
});

$('#addFreeShippingMore').click(function(){
var freeshiipngpincode='<tr><td>'+
        '<div class="input-group">'+
                '<label>Pincode</label>'+
                '<input type="text" name="inputFPincode['+j+']" class="form-control cForm" style="margin: 0 10px;">'+
                '<span class="form-error"></span>'+
            '</div>'+
        '</td><td><a class="btn btn-danger pull-right rmv" href="javascript:void();" >Remove</a></td></tr>';

    $('#freeshiipngpincode').append(freeshiipngpincode);
    j++;
});


$('#addNonShippingMore').click(function(){
var nonshiipngpincode='<tr><td>'+
        '<div class="input-group">'+
                '<label>Pincode</label>'+
                '<input type="text" name="inputNonPincode['+k+']" class="form-control cForm" style="margin: 0 10px;">'+
                '<span class="form-error"></span>'+
            '</div>'+
        '</td><td><a class="btn btn-danger pull-right rmv" href="javascript:void();" >Remove</a></td></tr>';

    $('#nonshippingpincode').append(nonshiipngpincode);
    k++;
});





function test(){
    var domain = "";
 $('.bt').filemanager('image', {prefix: domain});
}

function transformurl(){
    var name=$('input[name=inputPrdouct_name]').val();
    var smallcase=name.toLowerCase();
    var str=smallcase.replace(/[^a-zA-Z0-9 ]/g, "");
    
    var url=str.split(' ').join('-');
    url=url.replace(/-+/g,'-');
    $('input[name=inputPUrl]').val(url);
    
}

$(document.body).on('change','.categorycheck',function(){
    
    if(this.checked){
      
        $('#categoryerror').html('');
    }
   
    });

$(document.body).on('change','.fetaureimgcheck',function(){
    
    if(this.checked){
      
        $('#featureimagerror').html('');
    }
   
    });

$(document.body).on('click','.rmv',function(e){
    
    e.preventDefault();

   $(this).closest("tr").remove();
});
    
    
</script>
@endsection

