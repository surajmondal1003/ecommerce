<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Useraddress;
use App\User;
use App\Order;
use App\Orderdetail;
use App\OrderStatus;
use App\Studentmembershipproducts;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function users(){
        return view('admin.user_list');
    }


    public function get_user_list(Request $request){

        $columns = array(
            0 =>'id',
            1=> 'name',
            2=> 'email',
            3=> 'mobile',
           
         
        );
        $totalData = DB::select("SELECT * FROM users");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT * FROM users order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT * FROM users where name like '%".$search."%' or email like '%".$search."%' or mobile like '%".$search."%'   order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
              
              
                $nestedData['name'] =$page->name;
                $nestedData['email'] =$page->email;
                $nestedData['mobile'] =$page->mobile;

                if($page->status == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_User('."'".$page->id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_User('."'".$page->id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';


               

                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="/admin/edit-user-detail/'.$page->id.'"><i class="fa fa-eye"></i> View</a>
                         <a class="dropdown-item" href="../admin/edit-user-detail/'.$page->id.'"><i class="fa fa-pencil"></i> Edit</a>
                         <a class="dropdown-item" href="../admin/edit-user-address-list/?user_id='.$page->id.'" ><i class="fa fa-pencil"></i> View Address</a>
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

     public function change_User_status(Request $request){
        $id=$request->id;
        $pages=User::where('id',$id)->first();

        if($pages->status=='inactive')
        User::where('id',$id)->update(['status'=>'active']);
        else
        User::where('id',$id)->update(['status'=>'inactive']);

        return response()->json(['message' => 'Status changed Succesfully']);
      
     }



     public function get_user_detail($user_id){

        $user=User::where('id',$user_id)->first();
       
        $data = array();
        if(!empty($user))
        {
                $data['id'] = $user->id;
                $data['name'] = $user->name;
                $data['email'] = $user->email;
                $data['mobile'] = $user->mobile;
                $data['password'] = $user->password;
            
        }
        
        return  $data;
     }

     public function userDetailPage($id){
        
        $user=$this->get_user_detail($id);
        
        return view('admin.user_detail',
                    [
                        'user'=>$user,
                       
                    ]);
    }

    public function userUpdate(Request $request){
        $this->_validateUserUpdate($request);
             $id=$request->id;
             $data['name']=$request->input('inputUserName');
             $data['email']=$request->input('inputEmail');
             $data['mobile']=$request->input('inputMobile');
             if($request->input('inputPassword')){
                $data['password']=Hash::make($request->input('inputPassword'));
             }
             User::where('id',$id)->update($data);
             return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
     }

     private function _validateUserUpdate(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputUserName')== ''){
            $data['inputerror'][] = 'inputUserName';
            $data['error_string'][] = 'User Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputEmail')== ''){
            $data['inputerror'][] = 'inputEmail';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputMobile')== ''){
            $data['inputerror'][] = 'inputMobile';
            $data['error_string'][] = 'Mobile is required';
            $data['status'] = FALSE;
           
        }
        
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function addUserPage(){
        if(isPermitted('admin/add-user',Auth::user()->id)){
        return view('admin.addUser');
        }
    }

    public function userSave(Request $request){
        $this->_validateUserSave($request);
             $id=$request->id;
             $data['name']=$request->input('inputUserName');
             $data['email']=$request->input('inputEmail');
             $data['mobile']=$request->input('inputMobile');
             $data['password']=Hash::make($request->input('inputPassword'));
             $data['activation_key']=hash_hmac('sha256', str_random(40), config('app.key'));
             $data['status']='active';
            
             
             User::create($data);
             return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
     }

     private function _validateUserSave(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputUserName')== ''){
            $data['inputerror'][] = 'inputUserName';
            $data['error_string'][] = 'User Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputEmail')== ''){
            $data['inputerror'][] = 'inputEmail';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputMobile')== ''){
            $data['inputerror'][] = 'inputMobile';
            $data['error_string'][] = 'Mobile is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPassword')== ''){
            $data['inputerror'][] = 'inputPassword';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
           
        }
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    public function userAddressPage(Request $request){
       
        // echo $request->user_id;die;

        $columns = array(
            0 =>'user_address_id',
            1=> 'address',
            2=> 'landmark',
            3=> 'city',
            4=> 'pincode',
            5=> 'country',
           
         
        );
        $totalData = DB::select("SELECT * FROM useraddresses where user_id=".$request->user_id);
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT * FROM useraddresses where user_id=".$request->user_id."  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT * FROM useraddresses where user_id=".$request->user_id." and address like '%".$search."%' or landmark like '%".$search."%' or city like '%".$search."%'   order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
              
              
                $nestedData['address'] =$page->address;
                $nestedData['landmark'] =$page->landmark;
                $nestedData['city'] =$page->city;
                $nestedData['country'] =$page->country;
                $nestedData['pincode'] =$page->pincode;
                $nestedData['phone_no'] =$page->phone_no;


                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         
                         <a class="dropdown-item" href="/admin/edit-user-address-list-detail/'.$page->user_address_id.'"><i class="fa fa-pencil"></i> Edit</a>
       
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

    public function users_address(Request $request){
        return view('admin.user_address_list',['user_id'=>$request->user_id]);
    }

    public function get_user_addressdetail($address_id){

        $user=Useraddress::where('user_address_id',$address_id)->first();
        $user_name=User::where('id',$user->user_id)->first();
       
        $data = array();
        if(!empty($user))
        {
                $data['user_address_id'] = $user->user_address_id;
                $data['address'] = $user->address;
                $data['landmark'] = $user->landmark;
                $data['city'] = $user->city;
                $data['country'] = $user->country;
                $data['pincode'] = $user->pincode;
                $data['phone_no'] = $user->phone_no;
                $data['name'] = $user_name->name;
            
        }
        
        return  $data;
     }

     public function users_address_detail($address_id){
        
        $useraddress=$this->get_user_addressdetail($address_id);
        
        return view('admin.user_address_detail',
                    [
                        'useraddress'=>$useraddress,
                       
                    ]);
    }

    public function useraddressUpdate(Request $request){
        $this->_validateUserAddressSave($request);
             $user_address_id=$request->user_address_id;
             $data['address']=$request->input('inputAddress');
             $data['landmark']=$request->input('inputLanmark');
             $data['city']=$request->input('inputCity');
             $data['country']=$request->input('inputCountry');
             $data['pincode']=$request->input('inputPin');
             $data['phone_no']=$request->input('inputPhone');
            
             Useraddress::where('user_address_id',$user_address_id)->update($data);
             return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
     }


     private function _validateUserAddressSave(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputAddress')== ''){
            $data['inputerror'][] = 'inputAddress';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputLanmark')== ''){
            $data['inputerror'][] = 'inputLanmark';
            $data['error_string'][] = 'Lanmark is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputCity')== ''){
            $data['inputerror'][] = 'inputCity';
            $data['error_string'][] = 'City is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputCountry')== ''){
            $data['inputerror'][] = 'inputCountry';
            $data['error_string'][] = 'Country is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPin')== ''){
            $data['inputerror'][] = 'inputPin';
            $data['error_string'][] = 'Pincode is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPhone')== ''){
            $data['inputerror'][] = 'inputPhone';
            $data['error_string'][] = 'Phone Number is required';
            $data['status'] = FALSE;
           
        }
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function useraddressAdd(Request $request){

        if(isPermitted('admin/add-user-address',Auth::user()->id)){
        $user=User::where('id',$request->user_id)->first();
        return view('admin.add_user_address',['user'=>$user]);
        }
    }


    public function useraddressSave(Request $request){
        $this->_validateUserAddressSave($request);
             
             $data['user_id']=$request->input('user_id');
             $data['address']=$request->input('inputAddress');
             $data['landmark']=$request->input('inputLanmark');
             $data['city']=$request->input('inputCity');
             $data['country']=$request->input('inputCountry');
             $data['pincode']=$request->input('inputPin');
             $data['phone_no']=$request->input('inputPhone');
            
             Useraddress::create($data);
             return response()->json(['message' => 'Address created Succesfully','status'=>true]);
     }


    //  private function _validateUserAddressSave(Request $request){
    //     $data = array();
	// 	$data['error_string'] = array();
	// 	$data['inputerror'] = array();
	// 	$data['status'] = TRUE;
    //     $data['valid']=true;
       
    //     if($request->input('inputAddress')== ''){
    //         $data['inputerror'][] = 'inputAddress';
    //         $data['error_string'][] = 'Address is required';
    //         $data['status'] = FALSE;
           
    //     }
    //     if($request->input('inputLanmark')== ''){
    //         $data['inputerror'][] = 'inputLanmark';
    //         $data['error_string'][] = 'Lanmark is required';
    //         $data['status'] = FALSE;
           
    //     }
    //     if($request->input('inputCity')== ''){
    //         $data['inputerror'][] = 'inputCity';
    //         $data['error_string'][] = 'City is required';
    //         $data['status'] = FALSE;
           
    //     }
    //     if($request->input('inputCountry')== ''){
    //         $data['inputerror'][] = 'inputCountry';
    //         $data['error_string'][] = 'Country is required';
    //         $data['status'] = FALSE;
           
    //     }
    //     if($request->input('inputPin')== ''){
    //         $data['inputerror'][] = 'inputPin';
    //         $data['error_string'][] = 'Pincode is required';
    //         $data['status'] = FALSE;
           
    //     }
    //     if($request->input('inputPhone')== ''){
    //         $data['inputerror'][] = 'inputPhone';
    //         $data['error_string'][] = 'Phone Number is required';
    //         $data['status'] = FALSE;
           
    //     }
       
       
	// 	if($data['status'] === FALSE || $data['valid'] === false)
	// 	{
    //         echo json_encode($data);
    //         exit();
			
	// 	}
    // }


}
