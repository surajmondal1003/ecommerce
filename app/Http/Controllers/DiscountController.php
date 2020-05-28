<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function discount(){
        return view('admin.discountlist');
    }

    public function adddiscount(){
        if(isPermitted('admin/add-discount',Auth::user()->id)){
        return view('admin.addDiscount');
        }
    }

    public function saveDiscount(Request $request){
       $this->_validateDiscount($request);
		$data['discount_percent']=$request->input('inputDiscpercent');
        $data['discount_plan']=$request->input('inputDiscountplan');
        $data['is_active']='1';
        
        $id=Discount::create($data);
        return response()->json(['message' => 'Succesfully Created Discount','status'=>1]);
    }

    private function _validateDiscount(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputDiscpercent')== ''){
            $data['inputerror'][] = 'inputDiscpercent';
            $data['error_string'][] = 'Discount % is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputDiscountplan')== ''){
            $data['inputerror'][] = 'inputDiscountplan';
            $data['error_string'][] = 'Discount Plan is required';
            $data['status'] = FALSE;
           
        }
      
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }


    public function get_Discount(Request $request){

        $columns = array(
            0 =>'discount_id',
            1 =>'discount_percent',
            2=> 'discount_plan',
            3=> 'is_active',
        );
        $totalData = DB::select("SELECT * from discounts");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT * from discounts order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT * from discounts where discount_percent like '%".$search."%' or discount_plan like '%".$search."%'  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
               
                $nestedData=array();
                $nestedData['discount_percent'] =$page->discount_percent;
                $nestedData['discount_plan'] =$page->discount_plan;

                if($page->is_active == 'active')
                {
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="dvgschange_productType('."'".$page->discount_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                }
                else{
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="vdchange_productType('."'".$page->discount_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';
                }
               
               
                

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

    public function change_discount_status(Request $request){
        $id=$request->id;
        $pages=Discount::where('discount_id',$id)->first();
        if($pages->is_active=='inactive')
        Discount::where('discount_id',$id)->update(['is_active'=>'active']);
        else
        Discount::where('discount_id',$id)->update(['is_active'=>'inactive']);

        return response()->json(['message' => 'Status changed Succesfully']);
      
     }

    public function editDiscount($id){
        
        $discounts=$this->get_discount_detail($id);

        return view('admin.editprodcategory',
                    [
                        'discounts'=>$discounts,
                    ]);
    }

    
    public function get_discount_detail($discount_id){

        $pages = DB::select("SELECT * from discounts where discount_id=$discount_id");

        $data = array();
        if(!empty($pages))
        {
                $data['discount_percent'] = $pages[0]->discount_percent;
                $data['discount_plan'] = $pages[0]->discount_plan;
        }
        return  $data;
    }


}
