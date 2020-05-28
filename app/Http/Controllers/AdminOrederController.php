<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Useraddress;
use App\User;
use App\Order;
use App\Orderdetail;
use App\OrderStatus;
use App\Studentmembershipproducts;
use App\Mail\OrderStatusUpdate;
use PDF;

class AdminOrederController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function orders(){
        return view('admin.order_list');
    }


    public function get_order_list(Request $request){

        $columns = array(
            0 =>'order_id',
            1=> 'order_no',
            2=> 'name',
            3=> 'total',
           
         
        );
        $status_query="";
        if($request->inputOrderStatus!=''){
            $status_query=" and o.status='".$request->inputOrderStatus."'";
        }

        $totalData = DB::select("SELECT o.*,u.name,sm.student_unique_no from orders as o left join users as u on u.id=o.user_id
        left join studentmemberships as sm on sm.user_id =o.user_id where 1 ".$status_query);
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = ($request->input('order.0.dir'))?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT o.*,u.name,sm.student_unique_no from orders as o left join users as u on u.id=o.user_id
            left join studentmemberships as sm on sm.user_id =o.user_id where 1 ".$status_query."  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT o.*,u.name,sm.student_unique_no from orders as o left join users as u on u.id=o.user_id
            left join studentmemberships as sm on sm.user_id =o.user_id  where  1 ".$status_queryo." and order_no like '%".$search."%' or o.net_total like '%".$search."%' or u.name like '%".$search."%' or o.status like '%".$search."%'  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
                $nestedData['order_id'] = '<input type="checkbox" name="order['.$page->order_id.']" value="'.$page->order_id.'" class="itemcheck"><span class="help-block"></span>';
                $nestedData['order_no'] = $page->order_no;
                if($page->type=='membership')
                $nestedData['type'] = 'Student Member';
                else
                $nestedData['type'] = 'Normal Order';

                $nestedData['name'] =$page->name;
                $nestedData['total'] =$page->net_total;
                $nestedData['created_at'] =$page->created_at;
                $nestedData['status'] =$page->status;

                if($page->type=='membership')
                    $nestedData['membership_no'] =$page->student_unique_no;
                else
                    $nestedData['membership_no'] ='';

                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="/admin/get-order-details/'.$page->order_id.'"><i class="fa fa-eye"></i> View</a>
                         <a class="dropdown-item" href="../admin/get-order-details/'.$page->order_id.'"><i class="fa fa-pencil"></i> Edit</a>
                         <a class="dropdown-item" target="_blank" href="../admin/print-order-details/'.$page->order_id.'"><i class="fa fa-pencil"></i> Print</a>
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


     public function get_Order_detail($order_id){

        $order = DB::table('orders')
        ->leftJoin('orderdetails', 'orderdetails.order_id', '=', 'orders.order_id')
        ->leftJoin('users', 'users.id', '=', 'orders.user_id')
        ->leftJoin('useraddresses','useraddresses.user_address_id','=','orders.address_id')
        ->leftJoin('products','products.product_id','=','orderdetails.product_id')
        ->leftJoin('studentmemberships','studentmemberships.user_id','=','orders.user_id')
        ->select('orders.*','orderdetails.*','users.name','users.email','users.mobile',
        'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
        'useraddresses.country','useraddresses.phone_no','products.*','studentmemberships.student_unique_no')
        ->where('orders.order_id',$order_id)
        ->get();
        // echo '<pre>';
        // print_r($order);die;
        // echo '<pre>';
        $data = array();
        if(!empty($order))
        {
                $data['order_id'] = $order[0]->order_id;
                $data['order_no'] = $order[0]->order_no;
                $data['invoice_no'] = $order[0]->invoice_no;
                $data['name'] = $order[0]->name;
                $data['email'] = $order[0]->email;
                $data['mobile'] = $order[0]->mobile;
                $data['net_total'] = $order[0]->net_total;
                $data['itemtotal'] = $order[0]->itemtotal;
                $data['delivery_charge'] = $order[0]->delivery_charge;
                $data['type'] = $order[0]->type;
                if($order[0]->type=='membership')
                    $data['student_unique_no'] = $order[0]->student_unique_no;
                else
                    $data['student_unique_no'] = '';
                $data['status'] = $order[0]->status;
                $data['created_at'] = $order[0]->created_at;
                $data['updated_at'] = $order[0]->updated_at;
                if($order[0]->paymentmode=='cod')
                $data['paymentmode'] = 'Cash on Delivery';
                if($order[0]->paymentmode=='instamojo')
                $data['paymentmode'] = 'PREPAID';
                if($order[0]->paymentmode=='membership')
                $data['paymentmode'] = 'Shopinway Student Member';
               
              
                $data['address'] = $order[0]->address;
                $data['landmark'] = $order[0]->landmark;
                $data['city'] = $order[0]->city;
                $data['pincode'] = $order[0]->pincode;
                $data['phone_no'] = $order[0]->phone_no;
                
              
                
                foreach($order as $detailItem){
                    $productdata['product_name']=$detailItem->product_name;
                    $productdata['qty']=$detailItem->qty;
                    $productdata['subtotal']=$detailItem->subtotal;
                    // $productdata['order_status']=$detailItem->order_status;
                    // $productdata['date_notified']=$detailItem->date_notified;
                   

                    $data['products'][]=$productdata;
                }
                
                $order_status=OrderStatus::where('order_id',$order[0]->order_id)->get();
                $data['order_status']=$order_status;

                // print_r($data);die;
                // $all_status = DB::table('orders')
                //             ->select('status')
                //             ->get();
                // $data['all_status']=$all_status;
        }
        
        return  $data;
     }

    public function orderDetailPage($id){
        
        $order=$this->get_Order_detail($id);
        
        return view('admin.order_detail',
                    [
                        'order'=>$order,
                       
                    ]);
    }


    public function change_Order_status(Request $request){
        $order_id=$request->order_id;
        
        $order=Order::where('order_id',$order_id)->first();
        if($order->status != $request->inputOrderStatus){
            $order->status=$request->inputOrderStatus;
            $order->save();

            OrderStatus::create(array('order_id'=>$order_id,'status'=>$request->inputOrderStatus));
            $order_detail = DB::table('orders')
                            ->leftJoin('orderdetails', 'orderdetails.order_id', '=', 'orders.order_id')
                            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
                            ->leftJoin('useraddresses','useraddresses.user_address_id','=','orders.address_id')
                            ->leftJoin('studentmemberships','studentmemberships.user_id','=','orders.user_id')
                            ->leftJoin('products','products.product_id','=','orderdetails.product_id')
                            ->select('orders.*','orderdetails.*','users.name','users.email','users.mobile',
                            'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
                            'useraddresses.country','useraddresses.phone_no','products.*','studentmemberships.student_unique_no')
                            ->where('orders.order_id',$order_id)
                            ->get();

            if($order->type=='membership' && $request->inputOrderStatus=='delivered'){

                $membership_products = DB::table('studentmemberships')
                ->leftJoin('studentmembershipproducts', 'studentmembershipproducts.member_id', '=', 'studentmemberships.student_member_id')
                ->select('studentmembershipproducts.*')
                ->where('studentmemberships.user_id',$order_detail[0]->user_id)
                ->where('studentmembershipproducts.product_id',$order_detail[0]->product_id)
                ->update(['studentmembershipproducts.status'=>'delivered']);

                

            }

            // if($request->inputOrderStatus=='delivered'){
            //     Order::where('order_id',$order_id)->update(['invoice_no'=>'INV10'.$order_id]);
            // }

           
            if($request->input('inputNotifyUser')=='yes'){
                foreach($order_detail as $detail_item){
                $data['order_id'] = $order_detail[0]->order_id;
                $data['order_no'] = $order_detail[0]->order_no;
               
                $data['invoice_no'] = $order_detail[0]->invoice_no;

                $data['name'] = $order_detail[0]->name;
                $data['email'] = $order_detail[0]->email;
                $data['mobile'] = $order_detail[0]->mobile;
                $data['net_total'] = $order_detail[0]->net_total;
                $data['itemtotal'] = $order_detail[0]->itemtotal;
                $data['delivery_charge'] = $order_detail[0]->delivery_charge;
                $data['type'] = $order_detail[0]->type;
                if($order_detail[0]->type=='membership')
                    $data['student_unique_no'] = $order_detail[0]->student_unique_no;
                else
                    $data['student_unique_no'] = '';
                $data['status'] = $order_detail[0]->status;
                $data['created_at'] = $order_detail[0]->created_at;
                $data['updated_at'] = $order_detail[0]->updated_at;

                $data['paymentmode']='';
                if($order_detail[0]->paymentmode=='cod')
                $data['paymentmode'] = 'Cash on Delivery';
                if($order_detail[0]->paymentmode=='instamojo')
                $data['paymentmode'] = 'PREPAID';
                if($order_detail[0]->paymentmode=='membership')
                $data['paymentmode'] = 'Shopinway Student Member';

               
              
                $data['address'] = $order_detail[0]->address;
                $data['landmark'] = $order_detail[0]->landmark;
                $data['city'] = $order_detail[0]->city;
                $data['pincode'] = $order_detail[0]->pincode;
                $data['phone_no'] = $order_detail[0]->phone_no;
                
              
                
                foreach($order_detail as $detailItem){
                    $product_images = DB::table('product_images')
                                                    ->select('product_images.image_name')
                                                    ->where('product_images.product_id',$order_detail[0]->product_id)
                                                    ->where('product_images.is_primary','1')
                                                    ->first();
                    $productdata['product_name']=$detailItem->product_name;
                    $productdata['image_name']=$product_images->image_name;
                    $productdata['qty']=$detailItem->qty;
                    $productdata['subtotal']=$detailItem->subtotal;
                    $data['products'][]=$productdata;
                   
                }
               
                }
                Mail::to($data['email'])
                ->send(new OrderStatusUpdate($data));
            }
        }
        return response()->json(['message' => 'Status changed Succesfully','status'=>true]);
      
     }



     public function print_orderdetail(Request $request,$order_id){
        $order=$this->get_Order_detail($order_id);
        
        // $pdf= PDF::loadView('admin.print_order_detail',
        //             [
        //                 'order'=>$order,
                       
        //             ]);
        return view('admin.print_order_detail',
                    [
                        'order'=>$order,
                       
                    ]);
        // return $pdf->download('invoice.pdf');
        // return $pdf->stream('invoice.pdf', array('Attachment'=>0));     
     }

     
     public function printShippingDetail(Request $request){
      
        $order_ids=$request->input('order');
      

        $orderMain = DB::table('orders')
        ->leftJoin('users', 'users.id', '=', 'orders.user_id')
        ->leftJoin('useraddresses','useraddresses.user_address_id','=','orders.address_id')
        ->leftJoin('studentmemberships','studentmemberships.user_id','=','orders.user_id')
        ->select('orders.*','users.name','users.email','users.mobile',
        'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
        'useraddresses.country','useraddresses.phone_no','studentmemberships.student_unique_no')
        ->whereIn('orders.order_id',$order_ids)
        ->get();

        
       
        $data = array();
        if(!empty($order))
        {
                $data['order_id'] = $order[0]->order_id;
                $data['order_no'] = $order[0]->order_no;
                $data['invoice_no'] = $order[0]->invoice_no;
                $data['name'] = $order[0]->name;
                $data['email'] = $order[0]->email;
                $data['mobile'] = $order[0]->mobile;
                $data['net_total'] = $order[0]->net_total;
                $data['itemtotal'] = $order[0]->itemtotal;
                $data['delivery_charge'] = $order[0]->delivery_charge;
                $data['type'] = $order[0]->type;
                if($order[0]->type=='membership')
                    $data['student_unique_no'] = $order[0]->student_unique_no;
                else
                    $data['student_unique_no'] = '';
                $data['status'] = $order[0]->status;
                $data['created_at'] = $order[0]->created_at;
                $data['updated_at'] = $order[0]->updated_at;
                if($order[0]->paymentmode=='cod')
                $data['paymentmode'] = 'Cash on Delivery';
                if($order[0]->paymentmode=='instamojo')
                $data['paymentmode'] = 'PREPAID';
                if($order[0]->paymentmode=='membership')
                $data['paymentmode'] = 'Shopinway Student Member';
               
              
                $data['address'] = $order[0]->address;
                $data['landmark'] = $order[0]->landmark;
                $data['city'] = $order[0]->city;
                $data['pincode'] = $order[0]->pincode;
                $data['phone_no'] = $order[0]->phone_no;


        }
        
        return  view('admin.print_shipping_detail',['orderMain'=>$orderMain]);
     }


     public function orderReportPage(){
        return  view('admin.order_report_page'); 
     }
     
     public function orderReportList(Request $request){

        $inputStartDate=$request->input('inputStartDate');
        $inputEndDate=$request->input('inputEndDate');
        $inputGroupBy=$request->input('inputGroupBy');
        $inputOrderStatus=$request->input('inputOrderStatus');
        $datequery="(o.created_at >='".$inputStartDate."' and o.created_at <='".$inputEndDate."') 
        ";
        $orderStatusquery='';
        if($inputOrderStatus!='0')
            $orderStatusquery=" and o.status='".$inputOrderStatus."'";
        $day_number=0;
        if($inputGroupBy=='DAY')
            $day_number=1;
        if($inputGroupBy=='WEEK')
            $day_number=7;
        if($inputGroupBy=='MONTH')
            $day_number=30;
        if($inputGroupBy=='YEAR')
            $day_number=365;
    

        $columns = array(
            0 =>'order_id',
            1=> 'order_no',
            2=> 'name',
            3=> 'total',
           
         
        );
       
         $totalData = DB::select("SELECT  COUNT(o.order_id) AS ordercount, 
         CONCAT(o.created_at, ' - ', o.created_at + INTERVAL ".$day_number." DAY) AS day_range,
         sum(o.net_total) as net_total
         FROM orders as o 
         where ".$datequery."
         ".$orderStatusquery."
         GROUP BY ".$inputGroupBy."(o.created_at)
         ORDER BY ".$inputGroupBy."(o.created_at)");
      
        
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = ($request->input('order.0.dir'))?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT  COUNT(o.order_id) AS ordercount, 
            CONCAT(o.created_at, ' - ', o.created_at + INTERVAL ".$day_number." DAY) AS day_range,
            sum(o.net_total) as net_total
            FROM orders as o 
            where ".$datequery."
            ".$orderStatusquery."
            GROUP BY ".$inputGroupBy."(o.created_at)
            ORDER BY ".$inputGroupBy."(o.created_at)");
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT  COUNT(o.order_id) AS ordercount, 
            CONCAT(o.created_at, ' - ', o.created_at + INTERVAL ".$day_number." DAY) AS day_range,
            sum(o.net_total) as net_total
            FROM orders as o 
            where ".$datequery."
            ".$orderStatusquery."
            GROUP BY ".$inputGroupBy."(o.created_at)
            ORDER BY ".$inputGroupBy."(o.created_at)");


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
               
                
                $nestedData['day_range'] =$page->day_range;
                $nestedData['ordercount'] = $page->ordercount;
                // $nestedData['prodcount'] =$page->prodcount;
               
                $nestedData['net_total'] =$page->net_total;
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
