<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shippingzone;
use App\Shippingpincode;
use App\Shippingprice;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addShippingZone(){
        if(isPermitted('admin/add-shipping-zone',Auth::user()->id)){
        return view('admin.addShippingzone');
        }
    }

    public function saveShippingZone(Request $request){
        $this->_validateShipping($request);
        $zonedata['zone_name']=$request->input('inputZone_name');
        $zonedata['delivery_period']=$request->input('inputDeliveryperiod');
        $zone=Shippingzone::create($zonedata);

        $pincodedata=array();
        foreach($request->input('inputzonePincode') as $key_pincode=>$inputzonePincode){
		$tempdata['zone_id']=$zone->zone_id;
        $tempdata['pincode']=$inputzonePincode;
        $tempdata['available_cod']=$request->input('inputzoneCod')[$key_pincode];
        $pincodedata[]=$tempdata;
        }
        Shippingpincode::insert($pincodedata);

        $shippingdata=array();
        foreach($request->input('inputshippingName') as $key=>$value){
		$tempshipdata['zone_id']=$zone->zone_id;
		$tempshipdata['shipping_name']=$request->input('inputshippingName')[$key];
		$tempshipdata['shipping_price']=$request->input('inputshippingPrice')[$key];
		$tempshipdata['min_price']=$request->input('inputminPrice')[$key];
        $tempshipdata['max_price']=$request->input('inputmaxPrice')[$key];
        $shippingdata[]=$tempshipdata;
        }
        Shippingprice::insert($shippingdata);

        return response()->json(['message' => 'Succesfully Created Shipping','status'=>1]);
    }


    private function _validateShipping(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
        if($request->input('inputZone_name')== ''){
            $data['inputerror'][] = 'inputZone_name';
            $data['error_string'][] = 'Zone Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputDeliveryperiod')== ''){
            $data['inputerror'][] = 'inputDeliveryperiod';
            $data['error_string'][] = 'Delivery Period is required';
            $data['status'] = FALSE;
           
        }
        foreach($request->input('inputzonePincode') as $key=>$inputzonePincode){
            if($inputzonePincode== ''){
                $data['inputerror'][] = 'inputzonePincode['.$key.']';
                $data['error_string'][] = 'Pincode is required';
                $data['status'] = FALSE;
            
            }
         
        }
        foreach($request->input('inputshippingName') as $key=>$inputshippingName){
            if($inputshippingName== ''){
                $data['inputerror'][] = 'inputshippingName['.$key.']';
                $data['error_string'][] = 'Shipping Name is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputminPrice')[$key]== ''){
                $data['inputerror'][] = 'inputminPrice['.$key.']';
                $data['error_string'][] = 'Min Price is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputmaxPrice')[$key]== ''){
                $data['inputerror'][] = 'inputmaxPrice['.$key.']';
                $data['error_string'][] = 'Max Price is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputshippingPrice')[$key]== ''){
                $data['inputerror'][] = 'inputshippingPrice['.$key.']';
                $data['error_string'][] = 'Shipping Price is required';
                $data['status'] = FALSE;
            
            }
        }
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    



    public function get_shipping_list(Request $request){

        $columns = array(
            0 =>'zone_id',
            1 =>'zone_name',
        );
        $totalData = DB::select("select sz.zone_id,sz.zone_name,
        GROUP_CONCAT(DISTINCT(sp.pincode) SEPARATOR ',') as `pincode`,
        GROUP_CONCAT(DISTINCT(spr.shipping_name) SEPARATOR ',') as `shipping_name` 
        FROM shippingzones as sz left join shippingpincodes as sp on sp.zone_id=sz.zone_id 
        left join shippingprices as spr on spr.zone_id=sz.zone_id group by sz.zone_id,sz.zone_name");

        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select(" select sz.zone_id,sz.zone_name,GROUP_CONCAT(DISTINCT(sp.pincode) SEPARATOR ',') as `pincode`,GROUP_CONCAT(DISTINCT(spr.shipping_name) SEPARATOR ',') as `shipping_name` FROM shippingzones as sz left join 
            shippingpincodes as sp on sp.zone_id=sz.zone_id
            left join shippingprices as spr on spr.zone_id=sz.zone_id group by sz.zone_id,sz.zone_name order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("select sz.zone_id,sz.zone_name,GROUP_CONCAT(DISTINCT(sp.pincode) SEPARATOR ',') as `pincode`,GROUP_CONCAT(DISTINCT(spr.shipping_name) SEPARATOR ',') as `shipping_name` FROM shippingzones as sz left join 
            shippingpincodes as sp on sp.zone_id=sz.zone_id
            left join shippingprices as spr on spr.zone_id=sz.zone_id  where sz.zone_name like '%".$search."%' or sp.pincode like '%".$search."%' or spr.shipping_name like '%".$search."%' group by sz.zone_name,sz.zone_id  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
                $nestedData['zone_name'] = $page->zone_name;
                $nestedData['shipping_name'] = str_limit($page->shipping_name,50);
                $nestedData['pincode'] =str_limit($page->pincode,50);
               
                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="/update-content/'.$page->zone_id.'"><i class="fa fa-eye"></i> Content</a>
                         <a class="dropdown-item" href="/update-page-meta/'.$page->zone_id.'"><i class="fa fa-eye"></i> Meta</a>
                         <a class="dropdown-item" href="../admin/edit-shipping-zone/'.$page->zone_id.'"><i class="fa fa-pencil"></i> Edit</a>
                 </div>
             </div>';
                

                $data[] = $nestedData;
            }
        }
        $json_data = array(
        "draw"            => intval($request->input('draw')),
        "recordsTotal"    => intval(count($totalData)),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
        );

        return response()->json($json_data);

    
     }

    public function shipping(){
        return view('admin.shipping_list');
    }

    public function get_shipping_detail($zone_id){

        $pages = DB::select("select *
        FROM shippingzones as sz left join shippingpincodes as sp on sp.zone_id=sz.zone_id 
        WHERE sz.zone_id=".$zone_id."");

        $prices = DB::select("select *
        FROM shippingzones as sz 
        left join shippingprices as spr on spr.zone_id=sz.zone_id WHERE sz.zone_id=".$zone_id."");

        $data = array();
        if(!empty($pages))
        {
                $data['zone_name'] = $pages[0]->zone_name;
                $data['delivery_period'] = $pages[0]->delivery_period;
                $data['zone_id'] = $pages[0]->zone_id;
                $data['pincodes']=array();
                foreach($pages as $eachItem){
                    $pincode['pincode']=$eachItem->pincode;
                    $pincode['zone_pincode_id']=$eachItem->zone_pincode_id;
                    $pincode['available_cod']=$eachItem->available_cod;
                    $data['pincodes'][]=$pincode;
                }
                $data['shipping_price']=array();

                
                foreach($prices as $pricesItem){
                    $shippingPrice['shippingprice_id']=$pricesItem->shippingprice_id;
                    $shippingPrice['shipping_name']=$pricesItem->shipping_name;
                    $shippingPrice['shipping_price']=$pricesItem->shipping_price;
                    $shippingPrice['min_price']=$pricesItem->min_price;
                    $shippingPrice['max_price']=$pricesItem->max_price;
                    $data['shipping_price'][]=$shippingPrice;
                }
                // echo '<pre>';
                // print_r($data);die;
                // echo '</pre>';
        }
        return  $data;
     }

     public function editShipping($zone_id){
        $shippingDetail=$this->get_shipping_detail($zone_id);

        return view('admin.editShippingZone',
                    [
                        'shippingDetail'=>$shippingDetail
                    ]);
    }


    public function updateShipping(Request $request){
       $this->_validateShippingUpdate($request);
        $zone_id=$request->zone_id;
        $zonedata['zone_name']=$request->input('inputZone_name');
        $zonedata['delivery_period']=$request->input('inputDeliveryperiod');

        $zone=Shippingzone::where('zone_id',$zone_id)->update($zonedata);

        $pincodedata=array();
        foreach($request->input('inputzonePincode') as $pinkey=>$value){
            if(isset($request->input('zone_pincode_id')[$pinkey])){
            $updtdata['zone_id']=$zone_id;
            $updtdata['pincode']=$request->input('inputzonePincode')[$pinkey];
            $updtdata['available_cod']=$request->input('inputzoneCod')[$pinkey];
    
            Shippingpincode::where('zone_pincode_id',$request->input('zone_pincode_id')[$pinkey])->update($updtdata);
            }
            else{
                $tempdata['zone_id']=$zone_id;
                $tempdata['pincode']=$request->input('inputzonePincode')[$pinkey];
                $tempdata['available_cod']=$request->input('inputzoneCod')[$pinkey];
                $pincodedata[]=$tempdata;
            }
        }
        Shippingpincode::insert($pincodedata);

        $shippingdata=array();
        foreach($request->input('inputshippingName') as $key=>$value){
            if(isset($request->input('shippingprice_id')[$key])){
                $updtshipdata['zone_id']=$zone_id;
                $updtshipdata['shipping_name']=$request->input('inputshippingName')[$key];
                $updtshipdata['shipping_price']=$request->input('inputshippingPrice')[$key];
                $updtshipdata['min_price']=$request->input('inputminPrice')[$key];
                $updtshipdata['max_price']=$request->input('inputmaxPrice')[$key];
                Shippingprice::where('shippingprice_id',$request->input('shippingprice_id')[$key])->update($updtshipdata);
            }
            else{
                $tempshipdata['zone_id']=$zone_id;
                $tempshipdata['shipping_name']=$request->input('inputshippingName')[$key];
                $tempshipdata['shipping_price']=$request->input('inputshippingPrice')[$key];
                $tempshipdata['min_price']=$request->input('inputminPrice')[$key];
                $tempshipdata['max_price']=$request->input('inputmaxPrice')[$key];
                $shippingdata[]=$tempshipdata;
            }
        }
        Shippingprice::insert($shippingdata);

        return response()->json(['message' => 'Succesfully Updated Shipping','status'=>1]);
    }



    private function _validateShippingUpdate(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
        if($request->input('inputZone_name')== ''){
            $data['inputerror'][] = 'inputZone_name';
            $data['error_string'][] = 'Zone Name is required';
            $data['status'] = FALSE;
           
        }
        foreach($request->input('inputzonePincode') as $key=>$inputzonePincode){
            if($inputzonePincode== ''){
                $data['inputerror'][] = 'inputzonePincode['.$key.']';
                $data['error_string'][] = 'Pincode is required';
                $data['status'] = FALSE;
            
            }
        }
        foreach($request->input('inputshippingName') as $key=>$inputshippingName){
            if($inputshippingName== ''){
                $data['inputerror'][] = 'inputshippingName['.$key.']';
                $data['error_string'][] = 'Shipping Name is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputminPrice')[$key]== ''){
                $data['inputerror'][] = 'inputminPrice['.$key.']';
                $data['error_string'][] = 'Min Price is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputmaxPrice')[$key]== ''){
                $data['inputerror'][] = 'inputmaxPrice['.$key.']';
                $data['error_string'][] = 'Max Price is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputshippingPrice')[$key]== ''){
                $data['inputerror'][] = 'inputshippingPrice['.$key.']';
                $data['error_string'][] = 'Shipping Price is required';
                $data['status'] = FALSE;
            
            }
        }
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }



}
