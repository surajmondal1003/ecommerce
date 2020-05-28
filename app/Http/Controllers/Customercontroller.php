<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Useraddress;
use App\User;
use App\Wishlist;
use App\Membership;
use App\MembershipDetail;
use App\Category;
use App\Studentmemberships;
use App\Studentmembershipproducts;
use App\Order;
use App\Orderdetail;
use App\Stock;
use App\OrderStatus;
use App\UserWallet;
use App\Mail\MembershipJoin;
use App\Mail\OrderStatusUpdate;
use Illuminate\Support\Facades\DB;


class Customercontroller extends FrontController
{
    //
    private $cartService;
   
    public function __construct()
    {
        $this->middleware('auth');
        $user=Auth::user();
        $memberdata=array();
       
    }
    
    public function myprofile(){
        
        $default_address=Useraddress::where('user_id',Auth::user()->id)
                    ->where('is_default','1')
                    ->first();
        if(!$default_address){
            $address='NO Addresses Yet';
        }
        else{
            $address=$default_address->address;
        }
        $user = DB::table('users')
                    ->leftJoin('useraddresses', 'useraddresses.user_id', '=','users.id' )
                    ->select('users.*', 'useraddresses.*')
                    ->where('users.id',Auth::user()->id)
                    ->get();
        $is_member='0'; 
        if(Studentmemberships::where(['user_id'=>Auth::user()->id,'is_expired'=>'0'])->first()){
            $is_member='1'; 
        }
        return view('front.myprofile',['user'=>$user,'default_address'=>$address,'is_member'=>$is_member]);
    }

    public function saveCustomerAddress(Request $request){
        $this->_validateCustomerAddress($request);
        $default_address=Useraddress::where('user_id',Auth::user()->id)->first();
        if(!$default_address){
            $data['is_default']='1';
        }
        $data['user_id']=Auth::user()->id;
        $data['address']=$request->input('inputAddress');
        $data['landmark']=$request->input('inputLandmark');
        $data['city']=$request->input('inputCity');
        $data['pincode']=$request->input('inputPincode');
        $data['country']=$request->input('inputCountry');
        $data['phone_no']=$request->input('inputPhone');
        $address=Useraddress::create($data);

        if($address->is_default=='1'){
            $request->session()->put('pincode', $address->pincode);
        }


        return response()->json(['message' => 'Succesfully Created Address','status'=>1]);
    }

    private function _validateCustomerAddress(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputAddress') == '')
		{
			$data['inputerror'][] = 'inputAddress';
			$data['error_string'][] = 'Address is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputLandmark') == '')
		{
			$data['inputerror'][] = 'inputLandmark';
			$data['error_string'][] = 'Landmark is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputCity') == '')
		{
			$data['inputerror'][] = 'inputCity';
			$data['error_string'][] = 'City image is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputPincode') == '')
		{
			$data['inputerror'][] = 'inputPincode';
			$data['error_string'][] = 'Pincode is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputCountry') == '')
		{
			$data['inputerror'][] = 'inputCountry';
			$data['error_string'][] = 'Country is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputPhone') == '')
		{
			$data['inputerror'][] = 'inputPhone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
        }
        
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }


    public function updateCustomerAccount(Request $request){
        $this->_validateCustomerAccount($request);
      
        $data['id']=Auth::user()->id;
        $data['name']=$request->input('inputEditName');
        $data['mobile']=$request->input('inputEditMobile');
        User::where('id',Auth::user()->id)->update($data);

        return response()->json(['message' => 'Succesfully Updated Account','status'=>1]);
    }

    private function _validateCustomerAccount(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputEditName') == '')
		{
			$data['inputerror'][] = 'inputEditName';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditMobile') == '')
		{
			$data['inputerror'][] = 'inputEditMobile';
			$data['error_string'][] = 'Mobile is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditMobile') != '')
		{
            $user=User::where('id','!=',Auth::user()->id)
                        ->where('mobile',$request->input('inputEditMobile'))
                        ->first();
            if($user){
                $data['inputerror'][] = 'inputEditMobile';
                $data['error_string'][] = 'Mobile Already exists';
                $data['status'] = FALSE;
            }
        }
        
        
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function getAddressDetail(Request $request){
        $address_id=$request->address_id;
        $user_address=Useraddress::where('user_address_id',$address_id)->first();
        if($user_address){
            $addressDetail['address_id']=$user_address->user_address_id;
            $addressDetail['address']=$user_address->address;
            $addressDetail['landmark']=$user_address->landmark;
            $addressDetail['city']=$user_address->city;
            $addressDetail['pincode']=$user_address->pincode;
            $addressDetail['country']=$user_address->country;
            $addressDetail['phone_no']=$user_address->phone_no;
        }
       
        //  print_r($address_id);die;
        return response()->json(['message' => 'Succesfully Updated Account',
                                'status'=>true,
                                'addressDetail'=>$addressDetail]);
    }

    public function updateAddressDetail(Request $request){
        $this->_validateCustomerUpdateAddress($request);
        $address_id=$request->edit_address_id;
            $addressDetail['address']=$request->input('inputEditAddress');
            $addressDetail['landmark']=$request->input('inputEditLandmark');
            $addressDetail['city']=$request->input('inputEditCity');
            $addressDetail['pincode']=$request->input('inputEditPincode');
            $addressDetail['country']=$request->input('inputEditCountry');
            $addressDetail['phone_no']=$request->input('inputEditPhone');
            
        $user_address=Useraddress::where('user_address_id',$address_id)->first();
        $user_address->update($addressDetail);
        if($user_address->is_default=='1'){
            $request->session()->put('pincode', $user_address->pincode);
        }
        //  print_r($address_id);die;
        return response()->json(['message' => 'Succesfully Updated Account',
                                'status'=>true,
                                'addressDetail'=>$addressDetail]);
    }


    private function _validateCustomerUpdateAddress(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputEditAddress') == '')
		{
			$data['inputerror'][] = 'inputEditAddress';
			$data['error_string'][] = 'Address is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditLandmark') == '')
		{
			$data['inputerror'][] = 'inputEditLandmark';
			$data['error_string'][] = 'Landmark is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditCity') == '')
		{
			$data['inputerror'][] = 'inputEditCity';
			$data['error_string'][] = 'City is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditPincode') == '')
		{
			$data['inputerror'][] = 'inputEditPincode';
			$data['error_string'][] = 'Pincode is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditCountry') == '')
		{
			$data['inputerror'][] = 'inputEditCountry';
			$data['error_string'][] = 'Country is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputEditPhone') == '')
		{
			$data['inputerror'][] = 'inputEditPhone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
        }
        
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }


    public function setDefaultAddress(Request $request){
        $address_id=$request->address_id;
        Useraddress::where('user_id',Auth::user()->id)
                                    ->update(array('is_default'=>'0'));
        $useraddress=Useraddress::where('user_address_id',$address_id)->first();

        $useraddress->update(array('is_default'=>'1'));

        $request->session()->put('pincode', $useraddress->pincode);

        return response()->json(['message' => 'Succesfully Updated',
                                'status'=>true,]
                                );
    }

    public function addToWishList(Request $request){
        $result = \DB::select(\DB::raw('SELECT product_id FROM `products` 
        WHERE product_url ="'.$request->input('product_url').'"'));

        $product_id=$result[0]->product_id;

        $presentcart=$request->session()->get('cart');
        if(!empty($presentcart)){

            foreach($presentcart as $key=>$cartItem){
                if($product_id==$cartItem['product_id']){
                        $request->session()->forget('cart.'.$key.'', $cartItem);
                }
            }
        }

        if(!Wishlist::where('product_id',$product_id)
            ->where('user_id',Auth::user()->id)->first()){
       
            $wishlist['user_id']=Auth::user()->id;
            $wishlist['product_id']=$product_id;
            Wishlist::create($wishlist);
           
        }
        $count=0;
        if($request->session()->get('cart')){
            $count=count($request->session()->get('cart'));
        }

        $data=FrontController::cartItems($request);
        return response()->json(['message' => 'Succesfully Added',
                                        'status'=>true,
                                        'count'=>$count,
                                        'carttable'=>$data['carttable'],
                                        'itemTable'=>$data['itemTable'],
                                        'isDeliverable'=>$data['isDeliverable'],
                                        'isBlacklistPin'=>$data['isBlacklistPin'],
                                        'blacklistPins'=>$data['blacklistPins'],
                                        'delivery_period'=>$data['delivery_period'],
                                        'available_cod'=>$data['available_cod'],
                                ]);
    }

    public function wishlistItems(Request $request){
        $wishlist = \DB::select(\DB::raw('SELECT * FROM `wishlists` as w
        left join `products` as p on p.product_id=w.product_id       
        left join product_images as pi on pi.product_id=p.product_id   
        where pi.is_primary="1" AND w.user_id='.Auth::user()->id.' GROUP by p.product_id'));
        $category_url='wishlist-products';
    //    print_r($wishlist);die;
        
        $wishlistContent='';
        if($wishlist){
        foreach($wishlist as $row){
            $wishlistContent.=' <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="hi-icon-wrap hi-icon-effect wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="200ms">
            <div class="big-box">
              <div class="img-sec">
                <img src="'.asset($row->image_name).'">
              </div>
              <div class="txt-sec">
                <div class="box">
                  <div class="row">
                    <div class="col-md-9 col-sm-10 col-xs-9">
                    <a href="'. url($category_url.'/'.$row->product_url) .'"><h4>'.str_limit($row->product_name,50).'</h4>
                    </a>
                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-3">
                      <div class="icon">
                        <span class="active-wishlist"><i class="fa fa-heart" aria-hidden="true"></i></span>
                      </div>
                    </div>
                  </div>
                  <p>'.str_limit($row->description,90).'</p>
                  <h3 class="lft-price"><strike>Rs-'.$row->regular_price.'/-</strike></h3><h3 class="rgt-price">Rs-'.$row->discount_price.'/-</h3>
                  <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-5"><a href=" '.url($category_url.'/'.$row->product_url).' " class="adcrt">Details</a></div>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                      <a href="javascript:void(0);" class="adcrt" onclick="movetoCart(\''.$row->product_url.'\')">
                        move to cart
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>';
            }
        }
        else{
            $wishlistContent='<h4>No Items in Wishlist</h4>';
        }
        $data=array();
        $data['wishlistContent']=$wishlistContent;
        return $data;
    }

    public function userWishList(Request $request){
            $data=$this->wishlistItems($request);

            return response()->json(['status' => true,
            'wishlistContent'=>$data['wishlistContent']]
            );
    }

    public function moveToCart(Request $request){
        $result = \DB::select(\DB::raw('SELECT product_id FROM `products` 
        WHERE product_url ="'.$request->input('product_url').'"'));

        $product_id=$result[0]->product_id;

        Wishlist::where('product_id',$product_id)
                ->where('user_id',Auth::user()->id)->first()->delete();

        FrontController::addToCart($request);
        $count=0;

        if($request->session()->get('cart')){
            $count=count($request->session()->get('cart'));
        }

        $wishlistdata=$this->wishlistItems($request);
        return response()->json(['status' => true,
        'wishlistContent'=>$wishlistdata['wishlistContent'],'count'=>$count]
        );
    }

   

    public function getMembershipForm($membership_cat_code){
        
        $is_member = DB::table('studentmemberships')
            ->leftJoin('membership_details', 'membership_details.membership_detail_id', '=', 'studentmemberships.membership_plan_id')
            ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
            ->select('membership_details.membership_plan','memberships.membership_name')
            ->where('studentmemberships.user_id',Auth::user()->id)
            ->first();
       

        $membership=Membership::where('membership_cat_code',$membership_cat_code)->first();
        
        $membershipdetail=MembershipDetail::where(['membership_id'=>$membership->membership_id,'status'=>'active'])->get();

        // $categories=Category::where(['category_parent'=>$membership->category_id,'is_active'=>'active'])->get();

        $categories = DB::table('categories')
            ->leftJoin('membershipcategories', 'membershipcategories.category_id', '=', 'categories.category_id')
            ->leftJoin('membership_details', 'membership_details.membership_detail_id', '=', 'membershipcategories.membership_detail_id')
            ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
            ->select('categories.*')
            ->where('membership_details.membership_id',$membership->membership_id)
            ->where('membershipcategories.status','active')
            ->where('categories.is_active','active')
            ->where('memberships.status','active')
            ->where('membership_details.status','active')
            ->groupBy('categories.category_id')
            ->get();

      

       
        $useraddress = DB::table('useraddresses')
        ->select('useraddresses.*')
        ->where('useraddresses.user_id',Auth::user()->id)
        ->get();

        return view('front.savemembershipform',['membershipdetail'=>$membershipdetail,
        'membership'=>$membership,'categories'=>$categories,
        'is_member'=>$is_member,'user'=>Auth::user(),'useraddress'=>$useraddress]);
    }

    public function getSemester(Request $request){
        
        $categories = DB::table('membership_details')
        ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
        ->leftJoin('membershipcategories', 'membershipcategories.membership_detail_id', '=', 'membership_details.membership_detail_id')
        ->select('membership_details.*')
        ->where('membershipcategories.category_id',$request->category_id)
        ->where('memberships.membership_id',$request->membership_id)
        ->where('memberships.status','active')
        ->where('membership_details.status','active')
        ->where('membershipcategories.status','active')
        ->get();

        $semesterDiv='<select  name="inputPlan" class="form-control" onchange="changePlan(this.value)">
       <option value="0">Select Semesters</option>';
        foreach($categories as $value){
            $semesterDiv.=' <option value="'.$value->membership_detail_id.'">'.$value->membership_plan.'</option>';
        }
        $semesterDiv.='</select>';


        $stream = DB::table('categories')->where('categories.category_parent',$request->category_id)->get();
        
        if(count($stream)>0){
        $streamDiv='<select  name="inputStream" class="form-control">
        <option value="0">Select Stream</option>';
         foreach($stream as $streamvalue){
             $streamDiv.=' <option value="'.$streamvalue->category_id.'">'.$streamvalue->category_name.'</option>';
         }
         $streamDiv.='</select>';
        }
        else{
            $streamDiv='<div class="form-group">
            <input type="hidden" name="inputStream" readonly placeholder="Name" class="form-control" value="'.$request->category_id.'">
            </div>';
        }

        return response()->json(['status' => true,'semesterDiv'=>$semesterDiv,'streamDiv'=>$streamDiv]);
    }

   


    public function getPlanPrice(Request $request){
        $plan_detail=MembershipDetail::where('membership_detail_id',$request->input('inputPlan'))->first();
       
        $planprice='You must have to pay the Membership Dues of Rs. '.$plan_detail->membership_price;

        $priceDecimal=$plan_detail->membership_price;

        return response()->json(['status' => true,'planprice'=>$planprice,'priceDecimal'=>$priceDecimal]);
    }


    public function membershipPaymentRequest(Request $request){
        $this->validateMembershipForm($request);
            $plan_detail=MembershipDetail::where('membership_detail_id',$request->input('inputPlan'))->first();
          
            $request->session()->put('member.user_member_id',Auth::user()->id);
            $request->session()->put('member.membership_plan_id',$request->input('inputPlan'));
            $request->session()->put('member.student_name',$request->input('inputSname'));
            $request->session()->put('member.student_email',$request->input('inputSemail'));
            $request->session()->put('member.student_mobile',$request->input('inputSphone'));
            $request->session()->put('member.address_id',$request->input('inputSaddress'));
            $request->session()->put('member.referral_id',$request->input('inputSrefferal'));
            $request->session()->put('member.college',$request->input('inputSrefferal'));
            $request->session()->put('member.dept',$request->input('inputStream'));

           

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
                'amount' => $plan_detail->membership_price,
                'phone' => Auth::user()->mobile,
                'buyer_name' => Auth::user()->name,
                'redirect_url' => url('/join-student-membership-save'),
                'send_email' => true,
                'webhook' => url('/join-student-membership-save'),
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




    public function saveMembership(Request $request){

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

        $tempdata['user_id']=$request->session()->get('member.user_member_id');
        $tempdata['membership_plan_id']=$request->session()->get('member.membership_plan_id');
        $tempdata['student_name']=$request->session()->get('member.student_name');
        $tempdata['student_email']=$request->session()->get('member.student_email');
        $tempdata['student_mobile']=$request->session()->get('member.student_mobile');
        $tempdata['address_id']=$request->session()->get('member.address_id');
       
        $tempdata['referral_id']=$request->session()->get('member.referral_id');
        $tempdata['is_expired']='0';
        $tempdata['date_joined']=date('Y-m-d H:i:s a');
        $tempdata['college']=$request->session()->get('member.college');
        $tempdata['dept']=$request->session()->get('member.dept');
        
        
        $student_id=Studentmemberships::create($tempdata);

        
        $student_id->update(array('student_unique_no'=>'SEPL#'.$student_id->student_member_id));
    
        $membership_products = DB::table('productcategory_relations')
        ->select('product_id')
        ->where('category_id',$tempdata['dept'])
        ->get();

       

        $memberporoductdata=array();
        foreach($membership_products as $membershipitem){
            $tempdetaildata['member_id']=$student_id->student_member_id;
            $tempdetaildata['product_id']=$membershipitem->product_id;
            $tempdetaildata['status']='notapplicable';
            $tempdetaildata['is_orderable']='no';

            $memberporoductdata[]=$tempdetaildata;
        }

            Studentmembershipproducts::insert($memberporoductdata);

        if($request->session()->get('member.referral_id') != '')
        {
            $refferal_reward = DB::table('membership_details')
            ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
            ->select('memberships.wallet_value')
            ->where('membership_detail_id',$request->session()->get('member.membership_plan_id'))
            ->first();

            $refferaluser=Studentmemberships::where('student_unique_no',$request->session()->get('member.referral_id'))
                                    ->where('is_expired','0')
                                    ->first();
            $user_wallet=UserWallet::where('user_id',$refferaluser->user_id)->first();
            if($user_wallet){
                $user_wallet->wallet_value+=$refferal_reward->wallet_value;
                $user_wallet->save();
            }
            else{
                UserWallet::create(['user_id'=>$refferaluser->user_id,'wallet_value'=>$refferal_reward->wallet_value]);
            }
            
        }


            if($student_id){
                $maildata['student_unique_no']=$student_id->student_unique_no;
                $maildata['student_name']=$tempdata['student_name'];
                $maildata['student_email']=$tempdata['student_email'];
                $maildata['student_mobile']=$tempdata['student_mobile'];
                $maildata['date_joined']=$tempdata['date_joined'];
                $maildata['college']=$tempdata['college'];
                $maildata['referral_id']=$tempdata['referral_id'];
               
                
                $mdept=Category::where('category_id',$tempdata['dept'])->first();

                $mDetail = DB::table('memberships')
                ->leftJoin('membership_details', 'membership_details.membership_id', '=', 'memberships.membership_id')
                ->select('memberships.membership_name','membership_details.membership_plan','membership_details.membership_price')
                ->where('membership_details.membership_detail_id',$tempdata['membership_plan_id'])
                ->first();
               
                $user_address=Useraddress::where('user_address_id',$tempdata['address_id'])->first();
                
                $maildata['address']=$user_address->address.','.$user_address->landmark.','.$user_address->city.','
                                    .$user_address->country.','.$user_address->pincode;

                $maildata['address_phone_no']= $user_address->phone_no;   
                $maildata['category_name']=$mdept->category_name;
                $maildata['membership_name']=$mDetail->membership_name;
                $maildata['membership_plan']=$mDetail->membership_plan;
                $maildata['membership_price']=$mDetail->membership_price;

                Mail::to($maildata['student_email'])
                ->send(new MembershipJoin($maildata));
            }


            return redirect('thank-you-order');
        
        }
       $request->session()->forget('member');
        return response()->json(['status' => true]);
    }


    public function validateMembershipForm(Request $request){

        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputStream') == '0')
		{
			$data['inputerror'][] = 'inputStream';
			$data['error_string'][] = 'Stream is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputSdept') == '0')
		{
			$data['inputerror'][] = 'inputSdept';
			$data['error_string'][] = 'Degree is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputPlan') == '0')
		{
			$data['inputerror'][] = 'inputPlan';
			$data['error_string'][] = 'Semester is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputScollege') == '')
		{
			$data['inputerror'][] = 'inputScollege';
			$data['error_string'][] = 'College is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputSname') == '')
		{
			$data['inputerror'][] = 'inputSname';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputSemail') == '')
		{
			$data['inputerror'][] = 'inputSemail';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputSphone') == '')
		{
			$data['inputerror'][] = 'inputSphone';
			$data['error_string'][] = 'Phone No is required';
			$data['status'] = FALSE;
        }
      
        if($request->input('inputSrefferal') != '')
        {
            
             if(!Studentmemberships::where('student_unique_no',$request->input('inputSrefferal'))
             ->where('is_expired','0')
             ->first()) 
             {         
                $data['inputerror'][] = 'inputSrefferal';
                $data['error_string'][] = 'Please Enter valid Refferal Id';
                $data['status'] = FALSE;
             }
        }
        
        
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function membershipProducts(Request $request){
        $membership_products = DB::table('products')
        ->leftJoin('product_images', 'product_images.product_id', '=', 'products.product_id')
        ->leftJoin('studentmembershipproducts', 'studentmembershipproducts.product_id', '=', 'products.product_id')
        ->leftJoin('studentmemberships', 'studentmemberships.student_member_id', '=', 'studentmembershipproducts.member_id')
        ->where('studentmemberships.user_id',Auth::user()->id)
        ->where('product_images.is_primary','1')
        ->groupBy('products.product_id')
        ->get();

       
        $category_url='membership-products';
       
        $product_list='';
        $studentString='';

        if(count($membership_products)>0){

        foreach($membership_products as $row){
           

            if($row->is_orderable=='yes' && $row->status=='pending')
            $orderbtn='<a href="javascript:void(0)" id="membershipOrder" onclick="membershipproductsorder(\''.$row->product_url.'\')">Place Order</a>';
            if($row->is_orderable=='yes' && $row->status=='ordered')
            $orderbtn='Ordered';
            if($row->is_orderable=='yes' && $row->status=='delivered')
            $orderbtn='Delivered';
            if($row->is_orderable=='no' && $row->status=='notapplicable')
            $orderbtn='<p style="color:#f00; border:none; margin:0; padding:0;">Not applicable </p>';
            if($row->is_orderable=='no' && $row->status=='pending')
            $orderbtn='Pending ';

            $product_list.='<div class="col-md-3 col-sm-6 col-xs-6">
            <div class="hi-icon-wrap hi-icon-effect wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="200ms">
            <div class="big-box">
              <div class="img-sec">
                <a href="javascript:void(0)"><img src="'.asset($row->image_name).'" ></a>
              </div>
              <div class="txt-sec">
                <div class="box">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="javascript:void(0)"><h4>'.str_limit($row->product_name,50).'</h4>
                    </a>
                    </div>
                  </div>
                  <div class="prc"><h3 class="lft-price">'.$orderbtn.'
                  </h3></div>
                  <div class="supreme">
                    <img src="'.asset('assets/images/sup.png').'" alt="supreme">
                  </div>
                
                </div>
              </div>
            </div>
          </div>
          </div>';

        }

        $userAddress=Useraddress::where('user_address_id',$membership_products[0]->address_id)->first();
        $studentdata=array();
        $studentdata['student_name']=$membership_products[0]->student_name;
        $studentdata['student_email']=$membership_products[0]->student_email;
        $studentdata['student_mobile']=$userAddress->phone_no;
        $studentdata['address']=$userAddress->address;
        $studentdata['landmark']=$userAddress->landmark;
        $studentdata['city']=$userAddress->city;
        $studentdata['pincode']=$userAddress->pincode;
        $studentdata['country']=$userAddress->country;
        $studentdata['student_unique_no']=$membership_products[0]->student_unique_no;
        $studentdata['date_joined']=$membership_products[0]->date_joined;

        $studentString='<div class="account-dp">
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="lt-top">
           <div class="ic-box">
             <img src="images/.jpg" alt="">
           </div>
           <div class="rt-txt">
             <h2>'.$studentdata['student_name'].'</h2>
             <p class="ml-sz">'.$studentdata['student_email'].'</p>
           </div>
         </div>
         <div class="ac-desc">
           <h2>Date Joined :</h2>
         <p>'.$studentdata['date_joined'].'</p>
         <h2 class="acc-add">Membership ID :</h2>
         <p class="acc-add-dec">'.$studentdata['student_unique_no'].'</p>
           
           
         </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="lt-top">
           <div class="rt-txt">
             <h2>Address :'.$studentdata['address'].','.$studentdata['landmark'].'</h2>
             <p class="ml-sz">'.$studentdata['city'].','.$studentdata['country'].'</p>
             
           </div>
         </div>
         <div class="ac-desc new">
           <h2>Pincode :'.$studentdata['pincode'].'</h2>
           <h2 class="acc-add">Mobile :</h2>
           <p class="acc-add-dec">'.$studentdata['student_mobile'].'</p>
          
           
         </div>
         </div>
        </div>
        
       </div>';
        }
       

        return response()->json(['status' => true,'products'=>$product_list,'studentString'=>$studentString]);
        
    }

   

    public function orderMembershipProducts(Request $request){
        $product=DB::table('products')->select('product_id')
        ->where('product_url',$request->prod_url)->first();
        $stock=Stock::where('product_id',$product->product_id)->first();

        $is_member = DB::table('studentmemberships')
        ->leftJoin('studentmembershipproducts', 'studentmembershipproducts.member_id', '=', 'studentmemberships.student_member_id')
        ->select('studentmembershipproducts.membership_product_id','studentmemberships.address_id')
        ->where('studentmemberships.user_id',Auth::user()->id)
        ->where('studentmembershipproducts.product_id',$product->product_id)
        ->first();

        if($stock->qty > 0.00){
            $in_stock='1';
        
        $count=DB::table('orders')->get()->count()+1;
        $orderData['user_id']=Auth::user()->id;
        $orderData['address_id']=$is_member->address_id;
        // $orderData['order_no']='OR/'.date('Y-m-d').'/00'.$count;
        $orderData['net_total']=0;
        $orderData['delivery_charge']=0;
        $orderData['itemtotal']=0;
        $orderData['paymentmode']='membership';
        $orderData['status']='pending';
        $orderData['type']='membership';

        $order=Order::create($orderData);
        $order->order_no='OD13'.$order->order_id;
        $order->invoice_no='INV10'.$order->order_id;
        $order->save();

            $orderDetailData['order_id']=$order->order_id;
            $orderDetailData['product_id']=$product->product_id;
            $orderDetailData['price']=0;
            $orderDetailData['qty']=1;
            $orderDetailData['subtotal']=0;

            $stock->qty=$stock->qty-1;
            $stock->save();

        Orderdetail::insert($orderDetailData);
        OrderStatus::create(array('order_id'=>$order->order_id,'status'=>'pending'));
        Studentmembershipproducts::where('membership_product_id',$is_member->membership_product_id)->update(['status'=>'ordered']);
       

        if($order){
            $order_detail = DB::table('orders')
            ->leftJoin('orderdetails', 'orderdetails.order_id', '=', 'orders.order_id')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('useraddresses','useraddresses.user_address_id','=','orders.address_id')
            ->leftJoin('studentmemberships','studentmemberships.user_id','=','orders.user_id')
            ->leftJoin('products','products.product_id','=','orderdetails.product_id')
            ->select('orders.*','orderdetails.*','users.name','users.email','users.mobile',
            'useraddresses.address','useraddresses.landmark','useraddresses.city','useraddresses.pincode',
            'useraddresses.country','useraddresses.phone_no','products.*','studentmemberships.student_unique_no')
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

        return response()->json(['message' => 'Succesfully Created Order','status'=>true,'in_stock'=>'1']);
        }
        else{
            return response()->json(['message' => 'Item Out of Stock','status'=>true,'in_stock'=>'0']);
        }
    }

    public function myWallet(Request $request){
        $wallet_value=0;
        $wallet=UserWallet::where('user_id',Auth::user()->id)->first();
        if($wallet){
            $wallet_value=$wallet->wallet_value;
        }
        return response()->json(['wallet_value' => $wallet_value,'status'=>true]);
    }

}
