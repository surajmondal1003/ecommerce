<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Stock;
class StockController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
       
    }
    
    public function get_stock(){
        
        return view('admin.addStock');
        
    }


    public function get_stock_list(Request $request){

        $columns = array(
            0 =>'stock_id',
            1 =>'product_name',
            2=> 'sku',
            3=> 'description',
            4=> 'regular_price',
            5=> 'discount_price',
            6=> 'qty',
         
        );
        $stock_query="";
        if($request->outofstock_qty!=''){
            $stock_query=" and s.qty<=0";
        }
        $totalData = DB::select("select p.*,s.qty as `qty` from products
         as p left join stocks as s on s.product_id=p.product_id where 1 ".$stock_query);

        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select(" select p.*,s.qty as `qty` from products
             as p left join stocks as s on s.product_id=p.product_id where 1 ".$stock_query."  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("select p.*,s.qty as `qty` from products
             as p left join stocks as s on s.product_id=p.product_id 
             where 1 ".$stock_query." and product_name like '%".$search."%' or sku like '%".$search."%' or description like '%".$search."%' or regular_price like '%".$search."%' or discount_price like '%".$search."%' order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
                $nestedData['product_id'] = '<input type="checkbox" name="product['.$page->product_id.']" value="'.$page->product_id.'" class="itemcheck"><span class="help-block"></span>';
                $nestedData['product_name'] = $page->product_name;
                $nestedData['sku'] =$page->sku;
                $nestedData['description'] =str_limit($page->description);
                $nestedData['regular_price'] =$page->regular_price;
                $nestedData['discount_price'] =$page->discount_price;
                $nestedData['existing_qty'] =$page->qty;
                
				$nestedData['new_qty'] = '<input type="text" name="new_qty['.$page->product_id.']" class="form-control cForm"><span class="form-error"></span>';
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


      public function saveStock(Request $request){
        $this->_validateStock($request);
        foreach($request->input('product') as $key=>$value){
            $data['product_id']=$request->input('product')[$key];
            $data['qty']=$request->input('new_qty')[$key];
            $stock=Stock::where('product_id',$data['product_id'])->first();
            if($stock){
                $stock->qty=$stock->qty+$data['qty'];
                $stock->save();
            }
            else{
                $id=Stock::create($data);
            }
           

        }
       
        return response()->json(['message' => 'Succesfully Created Product','status'=>1]);
      }


      private function _validateStock(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;

         if(empty($request->input('product'))){
                $data['status'] = FALSE;
                $data['valid'] = false;
        }

        if(!empty($request->input('product'))){
            foreach($request->input('product') as $key=>$value){
                if($request->input('product')[$key] != '')
                {
                    if($request->input('new_qty')[$key] == ''){
                        $data['inputerror'][] = 'new_qty['.$key.']';
                        $data['error_string'][] = 'Quantity is required';
                        $data['status'] = FALSE;
                       
                    }
                }
            
            }
        }
      
       
        
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }


}
