@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-heading border bottom">
                                        <h4 class="card-title">Add New MemberShip Plan</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="mrg-top-40">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <form id="addmembershipForm">
                                                        <div class="row">

                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Select MemberShip Session</label>
                                                                            <select name="inputMsession"  class="form-control">
                                                                                <option value="0">Select</option>
                                                                                
                                                                                  <option value="even">Summer (Even Semester)</option>
                                                                                  <option value="odd">Winter (Odd Semester)</option>
                                                                                 
                                                                               
                                                                            </select>
                                                                            <span class="form-error"></span>
                                                                            
                                                                        </div>
                                                                    </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Membership Name</label>
                                                                    <input type="text" name="inputMname" placeholder="This will show in Front end" class="form-control cForm" onblur="transformurl()" >
                                                                    <span class="form-error"></span>
                                                                </div>
                                                            </div>
                                                           
                                                          
                                                       
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <label>Membership Code</label>
                                                                                <input type="text" name="inputMCode" placeholder="This will show in Front end" class="form-control cForm">
                                                                                <span class="form-error"></span>
                                                                            </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <label>Membership Wallet Reward</label>
                                                                                <input type="text" name="inputWalletValue" placeholder="" class="form-control cForm">
                                                                                <span class="form-error"></span>
                                                                            </div>
                                                                </div>
                                                               
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Plan Description</label>
                                                                            
                                                                            <textarea rows="5" cols="50" name="inputMDescription"  class="form-control cForm"></textarea>
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
                                                                    <tr>
                                                                        <td>
                                                                               
                                                                            <div class="input-group">
                                                                                <label>Product Category</label>
                                                                                <select name="inputMProdCategory[0][]"  class="js-example-basic-multiple" multiple="multiple">
                                                                                    <option value="0">No Category</option>
                                                                                    @foreach ($productcategory as $bc)
                                                                                        <option value="{{$bc->category_id}}">{{$bc->category_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span class="form-error"></span>
                                                                                
                                                                            </div>
                                                                                    
                                                                        </td>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Membership Plan</label>
                                                                                    <input type="text" name="inputMPlan[0]" class="form-control cForm" style="margin: 0 10px;">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Membership Price</label>
                                                                                    <input type="text" name="inputMPrice[0]" class="form-control cForm" style="margin: 0 10px;">
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        <td>
                                                                                <div class="input-group">
                                                                                    <label>Status</label>
                                                                                   
                                                                                    <select name="inputMStatus[0]"  class="form-control" style="margin: 0 10px;">
                                                                                            <option value="0">Select</option>
                                                                                            
                                                                                              <option value="active">Active</option>
                                                                                              <option value="inactive">Inactive</option>
                                                                                    </select>
                                                                                    <span class="form-error"></span>
                                                                                </div>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                            </table>

                                                        <input type="button" id="addMoreMembership" value="Add More" class="btn btn-primary" style="margin: 1px 0 0 0;padding:6px 12px;">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6">
                                                                <div class="text-right mrg-top-5">
                                                                    <button type="submit" class="btn btn-success" id="membershipformsubmit">Save</button>
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

                        <?php 

            $product_content=''; 
            foreach($productcategory as $bc){
                $product_content.='<option value="'.$bc->category_id.'">'.$bc->category_name.'</option>';
                            
            }
            
            ?>
@endsection

@section('scriptarea')

<script>


var i=1;



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