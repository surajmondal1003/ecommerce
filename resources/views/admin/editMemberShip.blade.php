@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Edit MemberShip Plan</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="editmembershipForm">
                                                            <input type="hidden" name="membership_id" value="{{ $membership['membership_id'] }}">
                                                        <div class="row">

                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Select MemberShip Session</label>
                                                                            <select name="inputMsession"  class="form-control">
                                                                                <option value="0">Select</option>
                                                                                
                                                                                  <option value="even" @if($membership['session']=='even') selected @endif>Summer (Even Semester)</option>
                                                                                  <option value="odd" @if($membership['session']=='odd') selected @endif>Winter (Odd Semester)</option>
                                                                                 
                                                                               
                                                                            </select>
                                                                            <span class="form-error"></span>
                                                                            
                                                                        </div>
                                                                    </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Membership Name</label>
                                                                    <input type="text" name="inputMname" placeholder="This will show in Front end" 
                                                                class="form-control cForm" value="{{$membership['membership_name']}}" onblur="transformurl()">
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                           
                                                          
                                                       
                                                        </div>

                                                       
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <label>Membership Code</label>
                                                                                <input type="text" name="inputMCode" placeholder="This will show in Front end" class="form-control cForm"
                                                                        value="{{$membership['membership_cat_code']}}">
                                                                                <span class="form-error"></span>
                                                                            </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <label>Membership Wallet Reward</label>
                                                                            <input type="text" name="inputWalletValue" placeholder="" class="form-control cForm"
                                                                            value="{{$membership['wallet_value']}}">
                                                                            <span class="form-error"></span>
                                                                        </div>
                                                                </div>
                                                               
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Plan Description</label>
                                                                            
                                                                        <textarea rows="5" cols="50" name="inputMDescription"  class="form-control cForm">{{$membership['description']}}</textarea>
                                                                            <span class="form-error"></span>
                                                                            
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                        <div class="row">
                                                            
                                                            {{-- <div class="col-md-6 col-xs-6">
                                                               
                                                                    <div class="form-group">
                                                                        <label>Membership Plan</label>
                                                                        <input type="text" name="inputCUrl" placeholder="This will show in address bar" class="form-control cForm" >
                                                                        <span class="form-error"></span>
                                                                    </div>
                                                                
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                               
                                                                <div class="form-group">
                                                                    <label>MemberShip Price</label>
                                                                    <input type="text" name="inputCPosition" placeholder="This will show in address bar" class="form-control cForm" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            
                                                            </div> --}}

                                                            <table id="membershipContainer">
                                                                    <?php $j = 0; ?>
                                                                    @foreach ($membership['details'] as $item)
                                                                    <tr>
                                                                   

                                                                        <td>
                                                                               
                                                                            <div class="input-group">
                                                                                <label>Product Category</label>
                                                                                <select name="inputMProdCategory[{{$j}}][]"  class="js-example-basic-multiple" multiple="multiple">
                                                                                    <option value="0">No Category</option>
                                                                                    @foreach ($productcategory as $bc)
                                                                                            @foreach ($membership[$item['membership_detail_id']]['membershipcategories'] as $detail_item)
                                                                                        <option value="{{$bc->category_id}}" @if($detail_item->category_id==$bc->category_id) selected @endif>{{$bc->category_name}}</option>

                                                                                            @endforeach
                                                                                    @endforeach
                                                                                </select>
                                                                                <span class="form-error"></span>
                                                                                
                                                                            </div>
                                                                                    
                                                                        </td>


                                                                        <td>
                                                                                <input type="hidden" name="membership_detail_id[{{$j}}]" value="{{ $item['membership_detail_id'] }}">
                                                                                {{-- <input type="hidden" name="membership_detail_id[{{$j}}]" value="{{ $item['membership_detail_id'] }}"> --}}
                                                                                <div class="input-group">
                                                                                    <label>Membership Plan</label>
                                                                                    <input type="text" name="inputMPlan[{{$j}}]" class="form-control cForm" style="margin: 0 10px;"
                                                                                value="{{$item['membership_plan']}}">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Membership Price</label>
                                                                                    <input type="text" name="inputMPrice[{{$j}}]" class="form-control cForm" style="margin: 0 10px;"
                                                                                    value="{{$item['membership_price']}}">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Status</label>
                                                                                   
                                                                                    <select name="inputMStatus[{{$j}}]"  class="form-control" style="margin: 0 10px;">
                                                                                            <option value="0">Select</option>
                                                                                            
                                                                                              <option value="active" @if($item['status']=='active') selected @endif>Active</option>
                                                                                              <option value="inactive" @if($item['status']=='inactive') selected @endif>Inactive</option>
                                                                                    </select>
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <?php $j++; ?>
                                                                    @endforeach
                                                            </table>

                                                        <input type="button" id="addMoreMembership" value="Add More" class="btn btn-primary" style="margin: 1px 0 0 0;padding:6px 12px;">
                                                        </div>
                                                        @if(isPermitted('admin/student-membership-update',Auth::user()->id))
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="updatemembershipformsubmit">Save</button>
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

                        <?php 

                        $product_content=''; 
                        foreach($productcategory as $bc){
                            $product_content.='<option value="'.$bc->category_id.'">'.$bc->category_name.'</option>';
                                        
                        }
                        
                        ?>
@endsection

@section('scriptarea')

<script>


var i=<?php echo count($membership['details']); ?>;
// var i=<?php echo count($membership['details']); ?>;


$('#addMoreMembership').click(function(){

var div='<tr><td>'+                                                             
            '<div class="input-group">'+
                '<label>Product Category</label>'+
                '<select name="inputMProdCategory['+i+'][]"  class="js-example-basic-multiple" multiple="multiple">'+
                    '<option value="0">No Category</option>'+
                    '<?php echo $product_content; ?>'
                +'</select>'+
                '<span class="form-error"></span>'+
                '</div></td>'+
    '<td>'+
    '<td>'+
        '<div class="input-group">'+
                '<label>Membership Plan</label>'+
                '<input type="text" name="inputMPlan['+i+']" class="form-control cForm" style="margin: 0 10px;">'+
                '<span class="form-error"></span>'+
            '</div>'+
        '</td>'+
        '<td>'+
        '<div class="input-group">'+
                '<label>Membership Price</label>'+
                '<input type="text" name="inputMPrice['+i+']" class="form-control cForm" style="margin: 0 10px;">'+
                '<span class="form-error"></span>'+
            '</div>'+
        '</td>'+
        '<td><div class="input-group">'+
            '<label>Status</label><select name="inputMStatus['+i+']"  class="form-control" style="margin: 0 10px;">'+
                    '<option value="0">Select</option>'+
                    '<option value="active">Active</option>'+
                        '<option value="inactive">Inactive</option>'+
                    '</select><span class="form-error"></span></div></td>'+
        '<td><a class="btn btn-danger pull-right rmv" href="javascript:void();" >Remove</a></td></tr>';

    $('#membershipContainer').append(div);
    i++;
    $('.js-example-basic-multiple').select2();
});

$(document.body).on('click','.rmv',function(e){
    
    e.preventDefault();

   $(this).closest("tr").remove();
});


function transformurl(){
   
   var name=$('input[name=inputMname]').val();
   var smallcase=name.toLowerCase();
   var str=smallcase.replace(/[^a-zA-Z0-9 ]/g, "");
   
   var url=str.split(' ').join('-');
   url=url.replace(/-+/g,'-');
   $('input[name=inputMCode]').val(url);
   
}

</script>
<script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
</script>

@endsection