<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Admin;
use App\AdminPermission;
use Illuminate\Support\Facades\Hash;

class AdminSubadminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function adminusers(){
        return view('admin.adminuser_list');
    }


    public function get_adminuser_list(Request $request){

        $columns = array(
            0 =>'id',
            1=> 'name',
            2=> 'email',
          
           
         
        );
        $totalData = DB::select("SELECT * FROM admins");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT * FROM admins order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT * FROM admins where name like '%".$search."%' or email like '%".$search."%'    order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


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

                if($page->status == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_AdminUser('."'".$page->id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_AdminUser('."'".$page->id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';


               

                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                        
                         <a class="dropdown-item" href="../admin/edit-admin-user-detail/'.$page->id.'"><i class="fa fa-pencil"></i> Edit</a>
                        
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

     public function change_adminUser_status(Request $request){
        $id=$request->id;
        $pages=Admin::where('id',$id)->first();

        if($pages->status=='inactive')
        Admin::where('id',$id)->update(['status'=>'active']);
        else
        Admin::where('id',$id)->update(['status'=>'inactive']);

        return response()->json(['message' => 'Status changed Succesfully']);
      
     }



     public function get_adminuser_detail($user_id){

        $user=Admin::where('id',$user_id)->first();
       
        $data = array();
        if(!empty($user))
        {
                $data['id'] = $user->id;
                $data['name'] = $user->name;
                $data['email'] = $user->email;
               
                $data['password'] = $user->password;
            
        }
        
        return  $data;
     }

     public function adminuserDetailPage($id){
        
        $user=$this->get_adminuser_detail($id);
        
        return view('admin.adminuser_detail',
                    [
                        'user'=>$user,
                       
                    ]);
    }

    public function adminuserUpdate(Request $request){
        $this->_validateadminUserUpdate($request);
             $id=$request->id;
             $data['name']=$request->input('inputUserName');
             $data['email']=$request->input('inputEmail');
            
             if($request->input('inputPassword')){
                $data['password']=Hash::make($request->input('inputPassword'));
             }
             Admin::where('id',$id)->update($data);
             return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
     }

     private function _validateadminUserUpdate(Request $request){
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
        
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function addadminUserPage(){
        if(isPermitted('admin/add-admin-user',Auth::user()->id)){
        return view('admin.add_adminuser');
        }
    }

    public function adminuserSave(Request $request){
        $this->_validateadminUserSave($request);
             $id=$request->id;
             $data['name']=$request->input('inputUserName');
             $data['email']=$request->input('inputEmail');
            
             $data['password']=Hash::make($request->input('inputPassword'));
             $data['status']='active';
             
             Admin::create($data);
             return response()->json(['message' => 'created Succesfully','status'=>true]);
     }

     private function _validateadminUserSave(Request $request){
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

    public function addPermissions(Request $request){
        $admins = \DB::select(\DB::raw('SELECT * from admins'));

        return view('admin.addAdminPermission',['admins'=>$admins]);
    }


    public function getPermissions(Request $request){
        $permissionArr=[
            'admin/add-product-category'=>'Add Product Category',
            'admin/update-prod-category'=>'Update Product category',
            'admin/add-product'=>'Add Product',
            'admin/update-product'=>'Update Product',
            'admin/add-discount'=>'Add Discount',
            'admin/add-attribute'=>'Add Product Attribute',
            'admin/add-shipping-zone'=>'Add Shopping Zone',
            'admin/update-shipping-zone'=>'Update Shopping Zone',
            'admin/update-shipping-zone'=>'Update Shopping Zone',
            'admin/add-student-membership'=>'Add Membership Plan',
            'admin/student-membership-update'=>'Update Membership Plan',
            'admin/add-student-member'=>'Add Student Member',
            'admin/update-student-membership-detail'=>'Update Student Member',
            'admin/update-order-status'=>'Update Order Status',
            'admin/save-stock'=>'Update Stock',
            'admin/add-user'=>'Add Customer',
            'admin/update-user'=>'Update Customer',
            'admin/add-user-address'=>'Add Customer Address',
            'admin/update-user-address-list-detail'=>'Update Customer Address',
            'admin/add-admin-user'=>'Add Subadmin User',
            'admin/update-admin-user'=>'Update Subadmin User',
        ];
        $permissions = \DB::select(\DB::raw('SELECT * from admin_permissions where admin_id='.$request->admin_id.' order by permission_id'));
        $userPermissionsArr=[];
        foreach($permissions as $item){
            $userPermissionsArr[]=$item->permission_url;
        }
       
        $permissionsDiv='<table border="1">';
        foreach($permissionArr as $key=>$value){
            $checked='';
            if(in_array($key,$userPermissionsArr)){
                $checked='checked';
            }
            $permissionsDiv.='<tr>
            <td><input type="checkbox" value="'.$key.'" '.$checked.' name="inputAdminPermission[]">'.$value.'</td>
            </tr>';
        }
        $permissionsDiv.='</table>';
        
        return response()->json(['message' => 'Success','status'=>true,'permissionsDiv'=>$permissionsDiv]);
    }


    public function savePermissions(Request $request){
        $data=array();
        foreach($request->input('inputAdminPermission') as $key=>$value){
            $tempdata['admin_id']=$request->input('inputadmin');
            $tempdata['permission_url']=$request->input('inputAdminPermission')[$key];
            $data[]=$tempdata;
        }
        AdminPermission::where('admin_id',$request->input('inputadmin'))->delete();
        AdminPermission::insert($data);

        return response()->json(['message' => 'Success','status'=>true,]);
    }
}
