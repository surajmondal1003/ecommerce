@extends('layouts.admin')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <form id="stockForm">
                                        <input type="checkbox" name="outofstock_qty" value="0" id="checkoutofstock">
                                        <label>Out of Stock Products</label>
                                    <div class="card-block">
                                    <div class="table-overflow">
                                            <table id="tablestocklist" class="table table-lg table-hover">
                                                <thead>
                                                        
                                                        <th>Check Item</th>
                                                        <th>Name</th>
                                                        <th>SKU</th>
                                                        <th>Description</th>
                                                        <th>Regular Price</th>
                                                        <th>Discount Price</th>
                                                        <th>Exisiting Quantity</th>
                                                        <th>New Quantity</th>
                                                       
                                                 
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                    </div>
                                    <div id="error">
                                    </div>
                                    @if(isPermitted('admin/save-stock',Auth::user()->id))
                                    <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-success" id="stockSubmit">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
@endsection

@section('scriptarea')

<script>
    // $('.itemcheck').on('click',function(){
    //     alert();
    //     $('#error').html('');
    // });
        
    $(document.body).on('change','.itemcheck',function(){
    
    if(this.checked){
      
        $('#error').html('');
    }
   
    });
    
</script>
@endsection