<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Membership;
use App\MembershipDetail;
use App\Category;
use App\Studentmemberships;
use App\Studentmembershipproducts;
use App\Useraddress;
use App\Membershipcategories;
use App\User;
use App\UserWallet;

class AdminMembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addstudentMembership(){
        if(isPermitted('admin/add-student-membership',Auth::user()->id)){
        $prodCategoriesList=Category::where('is_active','active')->get();

        return view('admin.addMembership',['productcategory'=>$prodCategoriesList]);
        }
    }


    public function saveMemberShipPlan(Request $request){
        
        $this->_validateMemberShipPlan($request);

        $membership['session']=$request->input('inputMsession');
        $membership['membership_name']=$request->input('inputMname');
        $membership['membership_cat_code']=$request->input('inputMCode');
        $membership['wallet_value']=$request->input('inputWalletValue');
        $membership['description']=$request->input('inputMDescription');
        $membership['status']='active';
        $membership_main=Membership::create($membership);

        $detaildata=array();
        foreach($request->input('inputMPlan') as $key=>$mplan){
		$tempdata['membership_id']=$membership_main->membership_id;
        $tempdata['membership_plan']=$mplan;
        $tempdata['membership_price']=$request->input('inputMPrice')[$key];
        $tempdata['membership_plan_code']=$mplan;
        $tempdata['status']=$request->input('inputMStatus')[$key];

        $membership_detail=MembershipDetail::create($tempdata);
        
            if(!empty($request->input('inputMProdCategory')[$key])){
                foreach($request->input('inputMProdCategory')[$key] as $ckey=>$cvalue){
                    $caetgory['membership_detail_id']=$membership_detail->membership_detail_id;
                    $caetgory['category_id']=$cvalue;
                    $caetgory['status']='active';
                    Membershipcategories::create($caetgory);
                
                }
            }

       
        }
        
        return response()->json(['message' => 'Succesfully Created Membership','status'=>1]);

    }

    private function _validateMemberShipPlan(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
        if($request->input('inputMsession')== '0'){
            $data['inputerror'][] = 'inputMsession';
            $data['error_string'][] = 'Membership Session is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputMname')== ''){
            $data['inputerror'][] = 'inputMname';
            $data['error_string'][] = 'Membership Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputMDescription')== ''){
            $data['inputerror'][] = 'inputMDescription';
            $data['error_string'][] = 'Description is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputMCode')== ''){
            $data['inputerror'][] = 'inputMCode';
            $data['error_string'][] = 'Code is required';
            $data['status'] = FALSE;
           
        }
        

       
        foreach($request->input('inputMPlan') as $key=>$inputshippingName){
            if($inputshippingName== ''){
                $data['inputerror'][] = 'inputMPlan['.$key.']';
                $data['error_string'][] = 'Membership Plan is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputMPrice')[$key]== ''){
                $data['inputerror'][] = 'inputMPrice['.$key.']';
                $data['error_string'][] = 'Membership Price is required';
                $data['status'] = FALSE;
            
            }
            if($request->input('inputMStatus')[$key]== '0'){
                $data['inputerror'][] = 'inputMStatus['.$key.']';
                $data['error_string'][] = 'Membership Status is required';
                $data['status'] = FALSE;
            
            }
            if(empty($request->input('inputMProdCategory')[$key])){
                $data['inputerror'][] = 'inputMProdCategory['.$key.']';
                $data['error_string'][] = 'Category is required';
                $data['status'] = FALSE;
               
            }
          
        }
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function studentMembership(){
        return view('admin.membershipList');
    }

    public function get_MemberShipList(Request $request){

        $columns = array(
            0 =>'membership_id',
            1=> 'membership_name',
            2=> 'membership_cat_code',
            3=> 'session',
            3=> 'status',
         
        );
        $totalData = DB::select("SELECT m.* FROM `memberships` as m  ");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT m.* FROM `memberships` as m   order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT m.* FROM `memberships` as m  where membership_name like '%".$search."%' or membership_cat_code like '%".$search."%'  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
               
                $nestedData=array();
                $nestedData['session'] = strtoupper($page->session);
                $nestedData['membership_name'] =$page->membership_name;
                $nestedData['membership_cat_code'] =$page->membership_cat_code;
                

                if($page->status == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_Membership('."'".$page->membership_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_Membership('."'".$page->membership_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';


                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="../admin/edit-membership-detail/'.$page->membership_id.'"><i class="fa fa-pencil"></i> Edit</a>
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

     public function change_membership_status(Request $request){
        $id=$request->id;
        $pages=Membership::where('membership_id',$id)->first();

        if($pages->status=='inactive')
        Membership::where('membership_id',$id)->update(['status'=>'active']);
        else
        Membership::where('membership_id',$id)->update(['status'=>'inactive']);

        return response()->json(['message' => 'Status changed Succesfully']);
      
     }

     public function get_Membership_detail($membership){

        $membership = DB::table('memberships')
        ->leftJoin('membership_details', 'membership_details.membership_id', '=', 'memberships.membership_id')
        ->select('memberships.*','membership_details.*')
        ->where('memberships.membership_id',$membership)
        ->get();

        $data = array();
        if(!empty($membership))
        {
                $data['membership_id'] = $membership[0]->membership_id;
                $data['session'] = $membership[0]->session;
                $data['membership_name'] = $membership[0]->membership_name;
                $data['membership_cat_code'] = $membership[0]->membership_cat_code;
                $data['description'] = $membership[0]->description;
                $data['wallet_value'] = $membership[0]->wallet_value;
              
                $detaildata=array();
                foreach($membership as $detailItem){
                    $detaildata['membership_plan']=$detailItem->membership_plan;
                    $detaildata['membership_price']=$detailItem->membership_price;
                    $detaildata['membership_detail_id']=$detailItem->membership_detail_id;
                    $detaildata['status']=$detailItem->status;

                    $membershipcategories = DB::table('membershipcategories')
                    ->select('membershipcategories.*')
                    ->where('membershipcategories.membership_detail_id',$detailItem->membership_detail_id)
                    ->get();
                    $data[$detailItem->membership_detail_id]['membershipcategories']=$membershipcategories;

                    $data['details'][]=$detaildata;
                }
            
        }

        // print_r($data);die;
        return  $data;
     }

    public function editmemberShip($id){
        
        $membership=$this->get_Membership_detail($id);
        // print_r($membership);die;
        $prodCategoriesList=Category::all();

        return view('admin.editMemberShip',
                    [
                        'membership'=>$membership,
                        'productcategory'=>$prodCategoriesList,
                        
                    ]);
    }


    public function updateMembership(Request $request){
        
        $membership_id=$request->membership_id;
        $membership['session']=$request->input('inputMsession');
        $membership['membership_name']=$request->input('inputMname');
        $membership['membership_cat_code']=$request->input('inputMCode');
        $membership['wallet_value']=$request->input('inputWalletValue');
        $membership['description']=$request->input('inputMDescription');
        $membership['status']='active';
       
        $membership_main=Membership::where('membership_id',$membership_id)->update($membership);

       
        foreach($request->input('inputMPlan') as $key=>$value){
            if(isset($request->input('membership_detail_id')[$key])){
                $updtdata['membership_id']=$membership_id;
                $updtdata['membership_plan']=$request->input('inputMPlan')[$key];
                $updtdata['membership_price']=$request->input('inputMPrice')[$key];
                $updtdata['membership_plan_code']=$request->input('inputMPlan')[$key];
                $updtdata['status']=$request->input('inputMStatus')[$key];
    
               
                $membership_detail=MembershipDetail::where('membership_detail_id',$request->input('membership_detail_id')[$key])->update($updtdata);
                Membershipcategories::where('membership_detail_id',$request->input('membership_detail_id')[$key])->delete();
                if(!empty($request->input('inputMProdCategory')[$key])){
                    foreach($request->input('inputMProdCategory')[$key] as $ckey=>$cvalue){
                        $caetgory['membership_detail_id']=$request->input('membership_detail_id')[$key];
                        $caetgory['category_id']=$cvalue;
                        $caetgory['status']='active';
                       
                        Membershipcategories::create($caetgory);
                    
                    }
                }
            }
            else{
                $tempdata['membership_id']=$membership_id;
                $tempdata['membership_plan']=$request->input('inputMPlan')[$key];
                $tempdata['membership_price']=$request->input('inputMPrice')[$key];
                $tempdata['membership_plan_code']=$request->input('inputMPlan')[$key];
                $tempdata['status']=$request->input('inputMStatus')[$key];

                $membership_detail=MembershipDetail::create($tempdata);
                // Membershipcategories::where('membership_detail_id',$request->input('membership_detail_id')[$key])->delete();

                if(!empty($request->input('inputMProdCategory')[$key])){
                    foreach($request->input('inputMProdCategory')[$key] as $ckey=>$cvalue){
                        $caetgory['membership_detail_id']=$membership_detail->membership_detail_id;
                        $caetgory['category_id']=$cvalue;
                        $caetgory['status']='active';
                       
                        Membershipcategories::create($caetgory);
                    
                    }
                }

                
            }
        }
        // MembershipDetail::insert($membershipdetaildata);
        // $membershipdetaildata[]=$tempdata;

        
        
        

        return response()->json(['message' => 'Succesfully Created Membership','status'=>1]);


    }


    public function getStudentmemberspage(Request $request){
        return view('admin.studentMembersList');
    }


    public function get_StudentMemberShipList(Request $request){

        $columns = array(
            0 =>'student_member_id',
            1=> 'student_name',
            2=> 'membership_name',
            3=> 'membership_plan',
            4=> 'date_joined',
         
         
        );
        $totalData = DB::select("SELECT sm.student_name,sm.date_joined,sm.student_member_id,
        mp.membership_plan,m.membership_name,sm.student_unique_no,sm.is_expired,m.session
          from studentmemberships as sm
          left join membership_details as mp on mp.membership_detail_id=sm.membership_plan_id
          left join memberships as m on m.membership_id=mp.membership_id
          ");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT sm.student_name,sm.date_joined,sm.student_member_id,mp.membership_plan,
            m.membership_name,sm.student_unique_no,sm.is_expired,m.session
             from studentmemberships as sm
            left join membership_details as mp on mp.membership_detail_id=sm.membership_plan_id
            left join memberships as m on m.membership_id=mp.membership_id order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT sm.student_name,sm.date_joined,sm.student_member_id,mp.membership_plan,
            m.membership_name,sm.student_unique_no,sm.is_expired,m.session
             from studentmemberships as sm
            left join membership_details as mp on mp.membership_detail_id=sm.membership_plan_id
            left join memberships as m on m.membership_id=mp.membership_id
             where sm.student_name like '%".$search."%' or sm.student_unique_no like '%".$search."%' or m.membership_name like '%".$search."%' or mp.membership_plan like '%".$search."%' or m.session like '%".$search."%'
             order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
               
                $nestedData=array();
                $nestedData['student_unique_no'] = strtoupper($page->student_unique_no);
                $nestedData['student_name'] =$page->student_name;
                $nestedData['session'] =$page->session;
                $nestedData['membership_name'] =$page->membership_name;
                $nestedData['membership_plan'] =$page->membership_plan;
                $nestedData['date_joined'] =$page->date_joined;

                if($page->is_expired == '0')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_Studentmembership_status('."'".$page->student_member_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_Studentmembership_status('."'".$page->student_member_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';


                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="../admin/edit-student-membership-detail/'.$page->student_member_id.'"><i class="fa fa-pencil"></i> Edit</a>
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

     public function change_Studentmembership_status(Request $request){
        $id=$request->id;
        $pages=Studentmemberships::where('student_member_id',$id)->first();

        if($pages->is_expired=='0')
        Studentmemberships::where('student_member_id',$id)->update(['is_expired'=>'1']);
        else
        Studentmemberships::where('student_member_id',$id)->update(['is_expired'=>'0']);

        return response()->json(['message' => 'Status changed Succesfully']);
      
     }


     public function get_StudentMembership_detail($member_id){

        $membership = DB::table('studentmemberships')
        ->leftJoin('membership_details', 'membership_details.membership_detail_id', '=', 'studentmemberships.membership_plan_id')
        ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
        ->leftJoin('studentmembershipproducts', 'studentmembershipproducts.member_id', '=', 'studentmemberships.student_member_id')
        ->leftJoin('products', 'products.product_id', '=', 'studentmembershipproducts.product_id')
        ->select('products.product_name','products.product_id','studentmembershipproducts.*','studentmemberships.*','memberships.session','memberships.membership_name','membership_details.membership_plan')
        ->where('studentmemberships.student_member_id',$member_id)
        ->get();

    //    print_r($membership);die;
        $data = array();
        if(!empty($membership))
        {
                $data['student_unique_no'] = $membership[0]->student_unique_no;
                $data['student_name'] = $membership[0]->student_name;
                $data['membership_name'] = $membership[0]->membership_name;
                $data['membership_plan'] = $membership[0]->membership_plan;
                $data['date_joined'] = $membership[0]->date_joined;
                $data['is_expired'] = $membership[0]->is_expired;
                $data['session'] = $membership[0]->session;
                $user_address=Useraddress::where('user_address_id',$membership[0]->address_id)->first();
                $data['address'] = $user_address->address.','.$user_address->landmark.','.$user_address->pincode.','.$user_address->country;
                $data['phone_no'] = $user_address->phone_no;
              
                $detaildata=array();
                foreach($membership as $detailItem){
                   
                    $detaildata['product_id']=$detailItem->product_id;
                    $detaildata['product_name']=$detailItem->product_name;
                    $detaildata['membership_product_id']=$detailItem->membership_product_id;
                    $detaildata['is_orderable']=$detailItem->is_orderable;
                    $detaildata['status']=$detailItem->status;
                    
                    $data['details'][]=$detaildata;
                    
                }
            
        }
       
        
        return  $data;
     }

    public function editStudentmemberShip($id){
        
        $membership=$this->get_StudentMembership_detail($id);
        

        return view('admin.editStudentMemberShip',
                    [
                        'membership'=>$membership,
                       
                    ]);
    }

    public function UpdateStudentmemberShip(Request $request){
        $this->_validateUpdateStudentMembership($request);
        foreach($request->input('inputStatus') as $key=>$value){
            
            if(empty($request->input('inputAvailableOrder')[$key])){
                Studentmembershipproducts::where('membership_product_id',$key)
                ->update([
                    'status'=>$request->input('inputStatus')[$key],
                ]);
            }
            else{
            Studentmembershipproducts::where('membership_product_id',$key)
                    ->update([
                        'is_orderable'=>$request->input('inputAvailableOrder')[$key],
                        'status'=>$request->input('inputStatus')[$key],
                    ]);
            }
        }
       
        return response()->json(['message' => 'Status changed Succesfully','status'=>true]);

    }

    private function _validateUpdateStudentMembership(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        foreach($request->input('product_id') as $key=>$value){
            if($request->input('inputStatus') == '')
            {
                $data['inputerror'][] = 'inputStatus['.$key.']';
                $data['error_string'][] = 'Product Against Status is required';
                $data['status'] = FALSE;
            }
        }
    
       
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function addStudentmember(){
        if(isPermitted('admin/add-student-member',Auth::user()->id)){
        $user = \DB::select(\DB::raw('SELECT u.id,u.name,u.email from users as u
        where u.id NOT IN (select user_id from studentmemberships where is_expired="0") and u.status="active"'));
       
        $membership=Membership::where('status','active')->get();
       
        return view('admin.addStudentMember',['user'=>$user,'membership'=>$membership]);
        }
    }
    public function getAddress(Request $request){
        $useraddress=Useraddress::where('user_id',$request->user_id)->get();
        $addressDiv='<label>User Address</label><select  name="inputUserAddress" class="form-control" >
        <option value="0">Select Address</option>';

         foreach($useraddress as $value){
             $addressDiv.=' <option value="'.$value->user_address_id.'">'.$value->address.','.$value->landmark.','.$value->pincode.'</option>';
         }
         $addressDiv.='</select> <span class="form-error"></span>';
 
         return response()->json(['status' => true,'addressDiv'=>$addressDiv]);
    }
    
    public function getCategories(Request $request){
        $categories = DB::table('categories')
            ->leftJoin('membershipcategories', 'membershipcategories.category_id', '=', 'categories.category_id')
            ->leftJoin('membership_details', 'membership_details.membership_detail_id', '=', 'membershipcategories.membership_detail_id')
            ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
            ->select('categories.*')
            ->where('membership_details.membership_id',$request->membership_id)
            ->where('membershipcategories.status','active')
            ->where('categories.is_active','active')
            ->groupBy('categories.category_id')
            ->get();
        $categoryDiv='<label>Select Degree</label><select  name="inputSdept" class="form-control" onchange="getSemester(this.value)">
                        <option value="0">Select Degree</option>';

         foreach($categories as $value){
             $categoryDiv.=' <option value="'.$value->category_id.'">'.$value->category_name.'</option>';
         }
         $categoryDiv.='</select> <span class="form-error"></span>';
 
         return response()->json(['status' => true,'categoryDiv'=>$categoryDiv]);
    }


    public function getSemester(Request $request){
        
        $categories = DB::table('membership_details')
        ->leftJoin('membershipcategories', 'membershipcategories.membership_detail_id', '=', 'membership_details.membership_detail_id')
        ->select('membership_details.*')
        ->where('membershipcategories.category_id',$request->category_id)
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


    public function saveStudentmembership(Request $request){
        $this->_validatesaveStudentmembership($request);
        
        $user=User::where('id',$request->input('inputuser'))->first();
        $tempdata['user_id']=$request->input('inputuser');
        $tempdata['membership_plan_id']=$request->input('inputPlan');
        $tempdata['student_name']=$user->name;
        $tempdata['student_email']=$user->email;
        $tempdata['student_mobile']=$user->mobile;
        $tempdata['address_id']=$request->input('inputUserAddress');
       
        $tempdata['referral_id']=$request->input('inputSreferral');
        $tempdata['is_expired']='0';
        $tempdata['date_joined']=date('Y-m-d H:i:s a');
        $tempdata['college']=$request->input('inputScollege');
        $tempdata['dept']=$request->input('inputStream');
        
        
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
            
        if($request->input('inputSreferral') != '')
        {
            $refferal_reward = DB::table('membership_details')
            ->leftJoin('memberships', 'memberships.membership_id', '=', 'membership_details.membership_id')
            ->select('memberships.wallet_value')
            ->where('membership_detail_id',$request->input('inputPlan'))
            ->first();

            $refferaluser=Studentmemberships::where('student_unique_no',$request->input('inputSreferral'))
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
            return response()->json(['message' => 'Success','status'=>true]);
    }


    private function _validatesaveStudentmembership(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
       
            if($request->input('inputuser') == '0')
            {
                $data['inputerror'][] = 'inputuser';
                $data['error_string'][] = 'User is required';
                $data['status'] = FALSE;
            }
            if($request->input('inputPlan') == '0')
            {
                $data['inputerror'][] = 'inputPlan';
                $data['error_string'][] = 'Semester Status is required';
                $data['status'] = FALSE;
            }
            if($request->input('inputUserAddress') == '0')
            {
                $data['inputerror'][] = 'inputUserAddress';
                $data['error_string'][] = 'Address is required';
                $data['status'] = FALSE;
            }
           
            if($request->input('inputScollege') == '')
            {
                $data['inputerror'][] = 'inputScollege';
                $data['error_string'][] = 'College Status is required';
                $data['status'] = FALSE;
            }
            if($request->input('inputStream') == '0')
            {
                $data['inputerror'][] = 'inputStream';
                $data['error_string'][] = 'Department Status is required';
                $data['status'] = FALSE;
            }
            if($request->input('inputSreferral') != '')
            {
                
                 if(!Studentmemberships::where('student_unique_no',$request->input('inputSreferral'))
                 ->where('is_expired','0')
                 ->first()) 
                 {         
                    $data['inputerror'][] = 'inputSreferral';
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
   

    

}
