<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Attributes;

class AttributeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function productAttributes(){
        return view('admin.prodAttributeList');
    }

    public function addproductAttribute(){
        if(isPermitted('admin/add-attribute',Auth::user()->id)){
        return view('admin.addprdouctAttribute');
        }
    }

    public function saveAttribute(Request $request){
        $this->_validateAttribute($request);
		$data['attr_name']=$request->input('inputAttribute_name');
		$data['is_active']='active';
        
        $id=Attributes::create($data);
       

        return response()->json(['message' => 'Succesfully Created Attribute','status'=>1]);
    }

    private function _validateAttribute(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputAttribute_name')== ''){
            $data['inputerror'][] = 'inputAttribute_name';
            $data['error_string'][] = 'Attribute Name is required';
            $data['status'] = FALSE;
           
        }
    
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function get_attributes(Request $request){

        $columns = array(
            0 =>'attr_id',
            1 =>'attr_name',
            2=> 'is_active',
         
        );
        $totalData = DB::select("SELECT * FROM attributes");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT * FROM attributes order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT  * FROM attributes WHERE attr_name like '%".$search."%'  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
               
                $nestedData=array();
               
                $nestedData['attr_name'] =$page->attr_name;

                if($page->is_active == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="ffchange_productType('."'".$page->attr_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="fffchange_productType('."'".$page->attr_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';

                

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
}
