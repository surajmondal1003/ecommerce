<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function productCategories(){
        return view('admin.productcategorylist');
    }

    public function addproductCategory(){
        if(isPermitted('admin/add-product-category',Auth::user()->id)){
        $productCategories=Category::where('is_active','active')->get();
        return view('admin.addprdouctCategory',['productcategory'=>$productCategories]);
        }
    }

    public function saveCategory(Request $request){
        $this->_validateCategory($request);
		$data['category_parent']=$request->input('inputCParent');
		$data['category_name']=$request->input('inputCategory_name');
		$data['category_url']=$request->input('inputCUrl');
		$data['category_position']=$request->input('inputCPosition');
		$data['is_active']='active';
        
        $id=Category::create($data);
       

        $meta['category_id']=$id->id;
        $meta['ip_address']=getenv('REMOTE_ADDR');
        $meta['title']=$request->input('inputCategory_name');
        CategoryMeta::create($meta);

        return response()->json(['message' => 'Succesfully Created Category','status'=>1]);
    }

    private function _validateCategory(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputCategory_name')== ''){
            $data['inputerror'][] = 'inputCategory_name';
            $data['error_string'][] = 'Category Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputCUrl')== ''){
            $data['inputerror'][] = 'inputCUrl';
            $data['error_string'][] = 'Category Url is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputCUrl')!= ''){
            if(Category::where('category_url',$request->input('inputCUrl'))->first()){
                $data['inputerror'][] = 'inputCUrl';
                $data['error_string'][] = 'Category Url already Exists';
                $data['status'] = FALSE;
            }
           
        }
        if($request->input('inputCPosition')== ''){
            $data['inputerror'][] = 'inputCPosition';
            $data['error_string'][] = 'Position is required';
            $data['status'] = FALSE;
           
        }
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    
    
    
    public function get_productCategories(Request $request){

        $columns = array(
            0 =>'category_id',
            1=> 'category_name',
            2=> 'category_url',
            3=> 'is_active',
         
        );
        $totalData = DB::select("SELECT c.category_id,c.category_parent,c.category_url, c.category_name,c.is_active,D.category_name AS 'parent_name' FROM `categories` as c LEFT OUTER JOIN (SELECT `category_id`,`category_parent`,`category_name` FROM `categories` ) D ON c.category_parent = D.category_id");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT c.category_id,c.category_parent,c.category_url, c.category_name,c.is_active,D.category_name AS 'parent_name' FROM `categories` as c LEFT OUTER JOIN (SELECT `category_id`,`category_parent`,`category_name` FROM `categories` ) D ON c.category_parent = D.category_id order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT c.category_id,c.category_parent,c.category_url, c.category_name,c.is_active,D.category_name AS 'parent_name' FROM `categories` as c LEFT OUTER JOIN (SELECT `category_id`,`category_parent`,`category_name` FROM `categories` ) D ON c.category_parent = D.category_id where c.category_name like '%".$search."%' or D.category_name like '%".$search."%'  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
               
                $nestedData=array();
                $nestedData['category_parent'] = ($page->parent_name)?$page->parent_name:'NO PARENT';
                $nestedData['category_name'] =$page->category_name;
                $nestedData['category_url'] =$page->category_url;
            
                

                if($page->is_active == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_productType('."'".$page->category_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_productType('."'".$page->category_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';

                
                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                        
                         <a class="dropdown-item" href="../admin/edit-category-meta/'.$page->category_id.'"><i class="fa fa-eye"></i> Meta</a>
                         <a class="dropdown-item" href="../admin/edit-product-category/'.$page->category_id.'"><i class="fa fa-pencil"></i> Edit</a>
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

     public function change_productType_status(Request $request){
        $id=$request->id;
        $pages=Category::where('category_id',$id)->first();

        if($pages->is_active=='inactive')
        Category::where('category_id',$id)->update(['is_active'=>'active']);
        else
        Category::where('category_id',$id)->update(['is_active'=>'inactive']);

        return response()->json(['message' => 'Status changed Succesfully']);
      
     }

     public function get_productType_detail($category_id){

        $pages = DB::select("SELECT c.category_id,c.category_url,c.category_parent, c.category_name,c.category_position,c.is_active,D.category_id as 'parent_id',D.category_name AS 'parent_name'
         FROM `categories` as c LEFT OUTER JOIN (SELECT `category_id`,`category_parent`,`category_name` FROM `categories` ) D
          ON c.category_parent = D.category_id where c.category_id=$category_id");

        $data = array();
        if(!empty($pages))
        {
                $data['category_name'] = $pages[0]->category_name;
                $data['parent_name'] = $pages[0]->parent_name;
                $data['category_parent'] = $pages[0]->category_parent;
                $data['category_id'] = $pages[0]->category_id;
                $data['category_url'] = $pages[0]->category_url;
                $data['category_position'] = $pages[0]->category_position;
            
        }
        return  $data;
     }

    public function editProductTypecategory($id){
        $prodCategoriesList=Category::all();
        $prodCategories=$this->get_productType_detail($id);

        return view('admin.editprodcategory',
                    [
                        'prodCategories'=>$prodCategories,
                        'prodCategoriesList'=>$prodCategoriesList
                    ]);
    }

    public function updateProdcategory(Request $request){
       $this->_validateCategoryUpdate($request);
            $id=$request->id;
            $data['category_parent']=$request->input('inputEditCParent');
            $data['category_name']=$request->input('inputEditCName');
            $data['category_url']=$request->input('inputEditCUrl');
            $data['category_position']=$request->input('inputEditCPosition');
            $data['is_active']='active';
 
            Category::where('category_id',$id)->update($data);
            return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
    }


    private function _validateCategoryUpdate(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
       
        if($request->input('inputEditCName')== ''){
            $data['inputerror'][] = 'inputEditCName';
            $data['error_string'][] = 'Category Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputEditCUrl')== ''){
            $data['inputerror'][] = 'inputEditCUrl';
            $data['error_string'][] = 'Category Url is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputEditCPosition')== ''){
            $data['inputerror'][] = 'inputEditCPosition';
            $data['error_string'][] = 'Position is required';
            $data['status'] = FALSE;
           
        }
       
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function getCategoryMeta($page_id){
        $content = DB::select("SELECT m.*, p.category_name FROM `category_metas` AS m LEFT JOIN categories AS p ON p.category_id=m.category_id WHERE m.category_id=".$page_id."");

        $data = array();
        if(!empty($content))
        {
                $data['pId'] = $content[0]->category_id;
                $data['pName'] = $content[0]->category_name;
                $data['mDesc'] = $content[0]->meta_description;
                $data['pTitle'] = $content[0]->title;
                $data['mKeyWord'] = $content[0]->meta_keyword;
                $data['mRobot'] = $content[0]->meta_robot;
                $data['mRevisitAfter'] = $content[0]->meta_revisit_after;
                $data['cLink'] = $content[0]->canonical_link;
                $data['oLocal'] = $content[0]->og_locale;
                $data['oType'] = $content[0]->og_type;
                $data['oImage'] = $content[0]->og_image;
                $data['oTitle'] = $content[0]->og_title;
                $data['oDesc'] = $content[0]->og_description;
                $data['oUrl'] = $content[0]->og_url;
                $data['oSite'] = $content[0]->og_site_name;
                $data['eHeadCode'] = $content[0]->extraheadcode;
              
        }
       return $data;
    }

    public function editCategoryMeta($id){
        $pageMeta=$this->getCategoryMeta($id);
        return view('admin.editcategorymeta',['pagemeta'=>$pageMeta]);
    }

    public function updateCategoryMeta(Request $request){
            $id=$request->id;
            $dataMeta['title']=trim($request->input('inputTitle'));
			$dataMeta['meta_description']=trim($request->input('inputMetaDesc'));
			$dataMeta['meta_keyword']=trim($request->input('inputMetaKeyWord'));
			$dataMeta['meta_robot']=trim($request->input('inputMetaRobot'));
			$dataMeta['meta_revisit_after']=trim($request->input('inputRevisitAfter'));
			$dataMeta['canonical_link']=trim($request->input('inputCanonicalLink'));
			$dataMeta['og_locale']=trim($request->input('inputOglocale'));
			$dataMeta['og_type']=trim($request->input('inputOgType'));
			$dataMeta['og_image']=trim($request->input('inputOgImage'));
			$dataMeta['og_title']=trim($request->input('inputOgTitle'));
			$dataMeta['og_description']=trim($request->input('inputOgDescription'));
			$dataMeta['og_url']=trim($request->input('inputOgUrl'));
			$dataMeta['og_site_name']=trim($request->input('inputOgSiteName'));
            $dataMeta['extraheadcode']=trim($request->input('inputExtraHeadCode'));
            $dataMeta['ip_address']=$request->input('inputIP');
           
            
            CategoryMeta::where('category_id', $id)->update($dataMeta);
            
			return response()->json(['message' => 'Meta Updated Succesfully','status'=>1]);
		
	}

}
