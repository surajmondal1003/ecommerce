<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdate;
use App\Useraddress;
use App\User;
use App\Order;
use App\Orderdetail;
use App\OrderStatus;
use App\Stock;
use App\OrderReturn;
use App\UserWallet;
use Lubusin\Mojo\Mojo;

class OrderController  extends FrontController
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    

    public function checkOut(Request $request){

        $subtotal=0;
        $itemtotal=0;
        $total=0;
        $subdeliveryChrg=0;
        $deliveryCharge=0;
        $totaldeliveryCharg=0;
        $paidshippingcount=0;
        $outofstock='0';
        
        $itemdata=array();
        foreach($request->session()->get('cart') as $item){
            $prodDetails=DB::table('products')
                        ->leftJoin('product_images','product_images.product_id','=','products.product_id')
                        ->leftJoin('stocks','stocks.product_id','=','products.product_id')
                        ->select('*')->where('products.product_id',$item['product_id'])
                        ->where('product_images.is_primary','1')
                        ->first();
                    if($prodDetails->qty < 1.00 || $prodDetails->qty < $item['qty']){
                        $outofstock='1';
                    }

                    $subtotal = $prodDetails->discount_price*$item['qty'];
                    $itemtotal=$itemtotal+$subtotal;

                    $tempdata['image_name']=$prodDetails->image_name;
                    $tempdata['product_name']=$prodDetails->product_name;
                    $tempdata['product_id']=$prodDetails->product_id;
                    $tempdata['discount_price']=$prodDetails->discount_price;
                    $tempdata['qty']=$item['qty'];
                    $tempdata['subtotal']=$subtotal;
                   

                   
                    $itemdata[]=$tempdata;

                    if($request->session()->get('pincode')){
                        $freeshippingresult = \DB::select(\DB::raw(' SELECT free_shipping_id FROM free_shipping_pincodes 
                        WHERE pincode='.$request->session()->get('pincode').' and product_id='.$item['product_id']));
                        if($freeshippingresult)
                        {
                            
                            $subdeliveryChrg=0;
                           
                        }
                        else{
                           
                        $shippingresult = \DB::select(\DB::raw(' SELECT sp.shipping_price,sp.shipping_name,s.zone_name FROM shippingzones as s LEFT join shippingpincodes as spc 
                        on spc.zone_id=s.zone_id left join shippingprices as sp on sp.zone_id=s.zone_id 
                        WHERE spc.pincode='.$request->session()->get('pincode').' and sp.min_price<='.$subtotal.' and sp.max_price>='.$subtotal));
                       

                        $subdeliveryChrg=!empty($shippingresult)?$shippingresult[0]->shipping_price:$subdeliveryChrg;
                        $paidshippingcount++;
                        }

                        $totaldeliveryCharg +=$subdeliveryChrg;
                    }
                    
        }

            if($paidshippingcount > 0){
            $totaldeliveryCharg=$totaldeliveryCharg/$paidshippingcount;
            }
            $total=$itemtotal+$totaldeliveryCharg;
            if(!$request->session()->get('pincode')){
                $deliveryCharge='EXTRA..';
            }
            else{
            $deliveryCharge='₹'.number_format($totaldeliveryCharg);
            }

        $count=0;
        if($request->session()->get('cart')){
            $count=count($request->session()->get('cart'));
        }

        $returndata=array();
        $returndata['itemdata']=$itemdata;
        $returndata['itemtotal']=$itemtotal;
        $returndata['total']=$total;
        $returndata['deliveryCharge']=$deliveryCharge;
        $returndata['count']=$count;
        $returndata['outofstock']=$outofstock;

        return $returndata;
       

    }

    public function checkOutPage(Request $request){
        $useraddress = DB::table('useraddresses')
                    ->select('useraddresses.*')
                    ->where('useraddresses.user_id',Auth::user()->id)
                    ->get();
        

        // $data=$this->checkOut($request);
        $user_wallet=UserWallet::where('user_id',Auth::user()->id)->first();
        $user_wallet=($user_wallet)?$user_wallet->wallet_value:0;
       
        $data=FrontController::cartItems($request);
        $count=0;
        if($request->session()->get('cart')){
            $count=count($request->session()->get('cart'));
        }

        return view('front.checkout',['user'=>Auth::user(),
                    'useraddress'=>$useraddress,
                    'total'=>$data['total'],
                    'deliveryCharge'=>$data['deliveryCharge'],
                    'count'=>$count,
                    'itemtotal'=>$data['itemtotal'],
                    'carttable'=>$data['carttable'],
                    'itemTable'=>$data['itemTable'],
                    'isDeliverable'=>$data['isDeliverable'],
                    'delivery_period'=>$data['delivery_period'],
                    'available_cod'=>$data['available_cod'],
                    'user_wallet'=>$user_wallet
                    ]);
    }

    public function paymentrequest(Request $request){
        $cartdata=$this->checkOut($request);


        if($cartdata['outofstock']=='0'){
                if($request->inputPaymentmode=='instamojo'){

                    $debitamount=$cartdata['total'];
                   
                    if($cartdata['total']>$request->inputWalletBalance){    
                        $debitamount=($cartdata['total']-$request->inputWalletBalance);

                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                        curl_setopt($ch, CURLOPT_HTTPHEADER,
                                    array("X-Api-Key:a09d95ece5b184b1ba46351783ffaebe",
                                        "X-Auth-Token:d3e14b1f927b6004185a3565bc246ee5"));
                        $payload = Array(
                            'purpose' => 'PURCHASE',
                            'amount' => $debitamount,
                            'phone' => Auth::user()->mobile,
                            'buyer_name' => Auth::user()->name,
                            'redirect_url' => url('/final-order-place/?address_id='.$request->address_id.'&inputPaymentmode='.$request->inputPaymentmode.'&inputWalletBalance='.$request->inputWalletBalance.'&total='.$cartdata['total']),
                            'send_email' => true,
                            'webhook' => url(''),
                            'send_sms' => false,
                            'email' => 'keya@gmail.com',
                            'allow_repeated_payments' => false
                        );
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                        $response = curl_exec($ch);
                        curl_close($ch); 
                        $data=json_decode($response);

                        return response()->json(['message' => 'Success','status'=>1,'redurl'=>$data->payment_request->longurl]);
                    }
                    
                    else{
                        $success=$this->finalOrderPlace($request);
                        return response()->json(['message' => $success['message'],'status'=>$success['status'],'redurl'=>$success['redurl']]);
                    }
                }
            else{
                $success=$this->finalOrderPlace($request);
            
                return response()->json(['message' => $success['message'],'status'=>$success['status'],'redurl'=>$success['redurl']]);
            }
        }
        else{
            return response()->json(['message' => 'Products are Out of Stock','status'=>false,'outofstock'=>'1']);
        }  
    }

    public function finalOrderPlace(Request $request){
        $paymentmode=$request->inputPaymentmode;
        if($paymentmode== 'instamojo'){
            if($request->total > $request->inputWalletBalance){
           
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/'.$request->payment_id);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                            array("X-Api-Key:a09d95ece5b184b1ba46351783ffaebe",
                                "X-Auth-Token:d3e14b1f927b6004185a3565bc246ee5"));

                $response = curl_exec($ch);
                curl_close($ch); 

                $jsondata=json_decode($response);

                    if($jsondata->success==true){
                    
                        $data=$this->orderfunction($request);
                    }

                    return redirect('thank-you-order');
                }
                else{
                    $data=$this->orderfunction($request);
                    return $data;
                }
            }
            else{

                $data=$this->orderfunction($request);
                return $data;
            }
        
    }


    public function orderfunction(Request $request){
        $data=$this->checkOut($request);
        if($request->total > $request->inputWalletBalance){
            
            $user_wallet=UserWallet::where('user_id',Auth::user()->id)->first();
            // $user_wallet->wallet_value =$data['total']-$request->inputWalletBalance;
            $user_wallet->wallet_value =0.00;
            $user_wallet->save();
        }
        if($request->total < $request->inputWalletBalance){
            $user_wallet=UserWallet::where('user_id',Auth::user()->id)->first();
            $user_wallet->wallet_value =$user_wallet->wallet_value-$data['total'];
            $user_wallet->save();
        }
        
        $count=DB::table('orders')->get()->count()+1;
        $orderData['user_id']=Auth::user()->id;
        $orderData['address_id']=$request->address_id;
        // $orderData['order_no']='OD13'.$count;
        $orderData['net_total']=$data['total'];
        $orderData['delivery_charge']=preg_replace("/[^0-9]/", "", $data['deliveryCharge'] );
        $orderData['itemtotal']=$data['itemtotal'];
        $orderData['paymentmode']=$request->inputPaymentmode;
        $orderData['status']='pending';
        $orderData['type']='normal';
        $orderData['payment_id']=$request->payment_id;

       
        $order=Order::create($orderData);
        $order->order_no='OD13'.$order->order_id;
        $order->invoice_no='INV10'.$order->order_id;
        $order->save();
        $orderDetailArr=array();
        foreach($data['itemdata'] as $orderItem){
            $orderDetailData['order_id']=$order->order_id;
            $orderDetailData['product_id']=$orderItem['product_id'];
            $orderDetailData['price']=$orderItem['discount_price'];
            $orderDetailData['qty']=$orderItem['qty'];
            $orderDetailData['subtotal']=$orderItem['subtotal'];

            $orderDetailArr[]=$orderDetailData;

            $stock=Stock::where('product_id',$orderItem['product_id'])->first();
                           
            $stock->qty=$stock->qty-$orderItem['qty'];
            $stock->save();
        }
        Orderdetail::insert($orderDetailArr);
        OrderStatus::create(array('order_id'=>$order->order_id,'status'=>'pending'));
        
        if($order){
        $order_detail = DB::table('orders')
        ->leftJoin('orderdetails', 'orderdetails.order_id', '=', 'orders.order_id')
        ->leftJoin('users', 'users.id', '=', 'orders.user_id')
        ->leftJoin('useraddresses','useraddresses.user_address_id','=','orders.address_id')
        ->leftJoin('products','products.product_id','=','orderdetails.product_id')
        ->select('orders.*','orderdetails.*','users.name','users.email','users.mobile',
        'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
        'useraddresses.country','useraddresses.phone_no','products.*')
        ->where('orders.order_id',$order->order_id)
        ->get();

        $maildata['order_id'] = $order_detail[0]->order_id;
        $maildata['order_no'] = $order_detail[0]->order_no;
        $maildata['invoice_no'] = $order_detail[0]->invoice_no;
        $maildata['name'] = $order_detail[0]->name;
        $maildata['email'] = $order_detail[0]->email;
        $maildata['mobile'] = $order_detail[0]->mobile;
        $maildata['net_total'] = $order_detail[0]->net_total;
        $maildata['itemtotal'] = $order_detail[0]->itemtotal;
        $maildata['delivery_charge'] = $order_detail[0]->delivery_charge;
        $maildata['type'] = $order_detail[0]->type;
        if($order_detail[0]->type=='membership')
            $maildata['student_unique_no'] = $order_detail[0]->student_unique_no;
        else
            $maildata['student_unique_no'] = '';
        $maildata['status'] = $order_detail[0]->status;
        $maildata['created_at'] = $order_detail[0]->created_at;
        $maildata['updated_at'] = $order_detail[0]->updated_at;
        $maildata['paymentmode'] = $order_detail[0]->paymentmode;
       
      
        $maildata['address'] = $order_detail[0]->address;
        $maildata['landmark'] = $order_detail[0]->landmark;
        $maildata['city'] = $order_detail[0]->city;
        $maildata['pincode'] = $order_detail[0]->pincode;
        $maildata['phone_no'] = $order_detail[0]->phone_no;

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
            $maildata['products'][]=$productdata;
           
        }

        
        Mail::to($maildata['email'])
        ->send(new OrderStatusUpdate($maildata));
    
        }


        $request->session()->forget('cart');

        return array('message' => 'Succesfully Created Order','status'=>1,'redurl'=>url('thank-you-order'));
    }


   public function checkOrderPincode(Request $request){
    $address=Useraddress::where('user_address_id',$request->input('address_id'))->first();
   
    $request->session()->put('pincode',$address->pincode);
    $data=FrontController::cartItems($request);

    $count=0;
    if($request->session()->get('cart')){
        $count=count($request->session()->get('cart'));
    }

         return response()->json(array(
             'status'=>true,
            'total'=>$data['total'],
            'deliveryCharge'=>$data['deliveryCharge'],
            'count'=>$count,
            'itemtotal'=>$data['itemtotal'],
            'carttable'=>$data['carttable'],
            'itemTable'=>$data['itemTable'],
            'isDeliverable'=>$data['isDeliverable'],
            'isBlacklistPin'=>$data['isBlacklistPin'],
            'blacklistPins'=>$data['blacklistPins'],
            'delivery_period'=>$data['delivery_period'],
            'available_cod'=>$data['available_cod'],
            'outofstock'=>$data['outofstock'],
            'outofstockProds'=>$data['outofstockProds'],
            ));
    }

    public function thankyou(Request $request){
        return view('front.thankyou_order');
    }


    public function myOrders(Request $request){
        $order_detail = DB::table('orders')
                            ->leftJoin('orderdetails', 'orderdetails.order_id', '=', 'orders.order_id')
                            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
                            ->leftJoin('products','products.product_id','=','orderdetails.product_id')
                            ->select('orders.*','orderdetails.product_id','orderdetails.product_id','orderdetails.price',
                            'orderdetails.qty','orderdetails.subtotal',
                            'users.name','users.email','users.mobile',
                            'products.product_name')
                            ->where('orders.user_id',Auth::user()->id)
                            ->orderby('orders.order_id','DESC')
                            ->get();

        $orderDiv='';
        $i=0;
        foreach($order_detail as $detail_item){

            $diff=date_diff(date_create($detail_item->updated_at),date_create(date('Y-m-d H:i:s')));
            $diff=$diff->format("%a");

                    $product_images = DB::table('product_images')
                                        ->select('product_images.image_name')
                                        ->where('product_images.product_id',$detail_item->product_id)
                                        ->where('product_images.is_primary','1')
                                        ->first();
                $orderno='';
                $cancelBtn='';
                if($detail_item->type!='membership' && ($detail_item->status=='pending'||$detail_item->status=='processing'||$detail_item->status=='processed')){
                    $cancelBtn='<a href="javascript:void(0);" id="cancelOrderBtn" onclick="cancelOrder(\''.$detail_item->order_id.'\')" style="display: inline-block;
                    float: right;
                    margin: -30px 0 0 0;
                    padding: 0;
                    position: relative;">Cancel Order</a>';
                }
                if($detail_item->type!='membership' && $detail_item->status=='delivered' && $diff <= 3){
                    $cancelBtn='<a href="javascript:void(0);" id="returnOrderBtn" onclick="returnOrder(\''.$detail_item->order_id.'\')" style="display: inline-block;
                    float: right;
                    margin: -30px 0 0 0;
                    padding: 0;
                    position: relative;">Return</a>';
                }

                if($i>0){            
                    if($detail_item->order_id!=$order_detail[$i-1]->order_id){
                    $orderno='<h5>ORDER NO : '.$detail_item->order_no.'</h5>'.$cancelBtn.'';
                    }
                }
                if($i==0){ 
                    $orderno='<h5>ORDER NO : '.$detail_item->order_no.'</h5>'.$cancelBtn.'';
                }
               

                $orderDiv.= ''.$orderno.'<div class="account-dp orders">
                <div class="lt-top">
                <div class="ic-box book">
                    <img src="'.asset($product_images->image_name).'" alt="">
                </div>
                <div class="rt-txt">
                    <h2>'.$detail_item->product_name.'</h2>
                    <h2>Qty : '.$detail_item->qty.'</h2>
                
                <h2 class="acc-add"><b>Rs : '.number_format($detail_item->price).'</b></h2><br>
                <p class="acc-add-dec"><b>'.strtoupper($detail_item->status).'</b>('.$detail_item->updated_at.')</p>
                </div>
                </div>
            </div>';
            $i++;
        }


        return response()->json(['orderDiv' => $orderDiv,'status'=>true]);
    }


    public function cancelorder(Request $request){
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
                            ->leftJoin('products','products.product_id','=','orderdetails.product_id')
                            ->select('orders.*','orderdetails.*','users.name','users.email','users.mobile',
                            'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
                            'useraddresses.country','useraddresses.phone_no','products.*')
                            ->where('orders.order_id',$order_id)
                            ->get();

           
           
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

                if($order_detail[0]->paymentmode=='instamojo'){
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/refunds/');
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                            array("X-Api-Key:a09d95ece5b184b1ba46351783ffaebe",
                            "X-Auth-Token:d3e14b1f927b6004185a3565bc246ee5"));
                $payload = Array(
                    'payment_id' => $order_detail[0]->payment_id,
                    'type' => 'QFL',
                    'body' => "Customer isn't satisfied with the quality"
                );
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                $response = curl_exec($ch);
                curl_close($ch); 
                }
                // echo $response;

                

            
        }
        return response()->json(['message' => 'Status changed Succesfully','status'=>true]);
      
     }



     public function returnorder(Request $request){
        $order_id=$request->order_id;
        OrderReturn::create([
            'order_id'=>$order_id,
            'return_reason'=>$request->return_reason,
            
        ]);

        $order=Order::where('order_id',$order_id)->first();
        if($order->status != $request->inputOrderStatus){
            $order->status=$request->inputOrderStatus;
            $order->save();

            OrderStatus::create(array('order_id'=>$order_id,'status'=>$request->inputOrderStatus));
            $order_detail = DB::table('orders')
                            ->leftJoin('orderdetails', 'orderdetails.order_id', '=', 'orders.order_id')
                            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
                            ->leftJoin('useraddresses','useraddresses.user_address_id','=','orders.address_id')
                            ->leftJoin('products','products.product_id','=','orderdetails.product_id')
                            ->select('orders.*','orderdetails.*','users.name','users.email','users.mobile',
                            'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
                            'useraddresses.country','useraddresses.phone_no','products.*')
                            ->where('orders.order_id',$order_id)
                            ->get();

           
           
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
        return response()->json(['message' => 'Status changed Succesfully','status'=>true]);
      
     }

}
