<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BlogCategory;
use App\BlogPost;
use App\BlogMeta;
use Storage;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function blogCategories(){
        return view('admin.blogcategorylist');
    }
    public function editblogcategory($id){
        $blogCategoriesList=BlogCategory::all();
        $blogCategories=$this->get_blog_category_detail($id);
        return view('admin.editblogcategory',['categorydetails'=>$blogCategories,'categoryList'=>$blogCategoriesList]);
    }
    public function addblogCategory(){
        $blogCategories=BlogCategory::where('is_active','active')->get();
        return view('admin.addblogcategory',['blogcategory'=>$blogCategories]);
    }
    public function addblog(){
        $blogCategories=BlogCategory::where('is_active','active')->get();
        return view('admin.newblogpost',['blogcategories'=>$blogCategories]);
    }
    public function bloglist(){
        return view('admin.bloglist');
    }

    public function saveBlogCategory(Request $request){
        
		$data['category_name']=$request->input('inputName');
		$data['category_url']=$request->input('inputUrl');
		$data['parent_id']=$request->input('inputParent');
		$data['is_active']='active';
        $data['ip_address']=getenv('REMOTE ADDR');
        
        $id=BlogCategory::create($data);

		return response()->json(['message' => 'Succesfully Created Blog Categories','status'=>1]);
		
    }
    
    public function get_blog_categories(Request $request){

        $columns = array(
            0 =>'category_name',
            1=> 'category_url',
            2=> 'parent_name',
            3=> 'is_active',
            4=> 'Active',
            
        );
        $totalData = DB::select("SELECT m.blog_category_id, m.category_name, m.category_url,m.parent_id,m.is_active, D.category_name as parent_name FROM `blog_categories` m LEFT OUTER JOIN (SELECT `blog_category_id`,`parent_id`, `category_name` FROM `blog_categories` ) D ON m.parent_id = D.blog_category_id");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
       
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
        
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value')))
        {
           
            $categories = DB::select("SELECT m.blog_category_id, m.category_name, m.category_url,m.parent_id,m.is_active, D.category_name as parent_name FROM `blog_categories` m LEFT OUTER JOIN (SELECT `blog_category_id`,`parent_id`, `category_name` FROM `blog_categories` ) D ON m.parent_id = D.blog_category_id order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $categories = DB::select("SELECT m.blog_category_id, m.category_name, m.category_url,m.parent_id,m.is_active, D.category_name as parent_name FROM `blog_categories` m LEFT OUTER JOIN (SELECT `blog_category_id`,`parent_id`, `category_name` FROM `blog_categories` ) D ON m.parent_id = D.blog_category_id where category_name like '%".$search."%' or category_url like '%".$search."%' or parent_id like '%".$search."%' order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);

            $totalFiltered =count($categories);
        }

        $data = array();
        if(!empty($categories))
        {
            foreach ($categories as $category)
            {
                //$nestedData['id'] = $page->id;
                $nestedData=array();
                $nestedData['category_name'] = $category->category_name;
                $nestedData['category_url'] = $category->category_url;
                $nestedData['parent_name'] = $category->parent_name;
                if($category->is_active == 'active')
				$nestedData['status'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_blog_category('."'".$category->blog_category_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['status'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_blog_category('."'".$category->blog_category_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';

                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="'.url('admin/edit-blog-category').'/'.$category->blog_category_id.'"><i class="fa fa-pencil"></i> Edit</a>
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


   public function get_blog_category_detail($category_id){

        $category = DB::select("SELECT * FROM blog_categories WHERE blog_category_id=".$category_id."");

        $data = array();
        if(!empty($category))
        {
                $data['ctName'] = $category[0]->category_name;
                $data['ctId'] = $category[0]->blog_category_id;
                $data['ctUrl'] = $category[0]->category_url;
                $data['ctParent'] = $category[0]->parent_id;
                $data['isActive'] = $category[0]->is_active;
                $data['ctCreatedAt'] = $category[0]->created_at;
                $data['ctIP'] = $category[0]->ip_address;
            
        }
        // $json_data = array("data" => $data);
        
        // return response()->json($json_data);
        return $data;
   }
    
    public function updateBlogCategory(Request $request){
        
        $id=$request->id;
		$data['category_name']=$request->input('inputName');
		$data['category_url']=$request->input('inputUrl');
		$data['parent_id']=$request->input('inputParent');
		$data['is_active']='active';
        $data['ip_address']=getenv('REMOTE_ADDR');
        
        BlogCategory::where('blog_category_id', $id)->update($data);
		return response()->json(['status'=>true,'message' => 'Succesfully Updated Blog Cateogry']);
    }
    
    public function changeBlogCategoryStatus(Request $request){

        $id=$request->id;
        $category=BlogCategory::where('blog_category_id',$id)->first();

        if($category->is_active=='inactive')
        BlogCategory::where('blog_category_id',$id)->update(['is_active'=>'active']);
        else
        BlogCategory::where('blog_category_id',$id)->update(['is_active'=>'inactive']);

        return response()->json(['status'=>true,'message' => 'Status changed Succesfully','status'=>true]);
    }
    
    public function saveBlogPost(Request $request){
        // $this->validate($request, [

        //     'inputLargeImage' => 'required',
        //     'inputLargeImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'inputSmallImage' => 'required',
        //     'inputSmallImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        //     ]);

            $this->_validateBlogPost($request);
            $dataSave['blog_category_id']=$request->input('inputBlogCategory');
			$dataSave['blog_title']=$request->input('inputName');
			$dataSave['blog_url']=$request->input('inputUrl');
			$dataSave['blog_content']=$request->input('pageeditor');
			$dataSave['blog_large_image']=$request->input('inputLImage');
			$dataSave['blog_small_image']=$request->input('inputSImage');
			$dataSave['blog_image_alt']=$request->input('inputAlt');
			$dataSave['date_created']=date('Y-m-d H:i:s');
			$dataSave['is_active']='active';
            $dataSave['is_featured']='1';
 
            $id=BlogPost::create($dataSave);
            $dataId['blog_id']=$id->id;
		    $dataId['ip_address']=getenv('REMOTE_ADDR');
            
            BlogMeta::create($dataId);
            return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
    }

    public function updateBlogPost(Request $request){
        // $this->validate($request, [

        //     'inputLargeImage' => 'required',
        //     'inputLargeImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'inputSmallImage' => 'required',
        //     'inputSmallImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        //     ]);

            //$this->_validateBlogPost($request);
            $id=$request->id;
            $dataSave['blog_category_id']=$request->input('inputBlogCategory');
			$dataSave['blog_title']=$request->input('inputName');
			$dataSave['blog_url']=$request->input('inputUrl');
			$dataSave['blog_content']=$request->input('pageeditor');
			$dataSave['blog_large_image']=$request->input('inputLImage');
			$dataSave['blog_small_image']=$request->input('inputSImage');
			$dataSave['blog_image_alt']=$request->input('inputAlt');
			$dataSave['is_active']='active';
            $dataSave['is_featured']='1';
 
            BlogPost::where('id',$id)->update($dataSave);
            return response()->json(['message' => 'Blog created Succesfully','status'=>true]);
    }


    private function _validateBlogPost(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputBlogCategory') == '0')
		{
			$data['inputerror'][] = 'inputBlogCategory';
			$data['error_string'][] = 'Blog Category is required';
			$data['status'] = FALSE;
        }
		if($request->input('inputName') == '')
		{
			$data['inputerror'][] = 'inputName';
			$data['error_string'][] = 'Blog Title is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputLImage') == '')
		{
			$data['inputerror'][] = 'inputLImage';
			$data['error_string'][] = 'Blog Large image is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputSImage') == '')
		{
			$data['inputerror'][] = 'inputSImage';
			$data['error_string'][] = 'Blog Small image is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputUrl') == '')
		{
			$data['inputerror'][] = 'inputUrl';
			$data['error_string'][] = 'Blog URL is required';
			$data['status'] = FALSE;
        }
        
        if($request->input('inputUrl') != '')
		{
            $pages=array();
            $pages=BlogPost::where('blog_url',$request->input('inputUrl'))->get();
            if (count($pages)>0)
            {
                $data['inputerror'][] = 'inputUrl';
			    $data['error_string'][] = 'Blog URL must be unique';
			    $data['status'] = FALSE;
            }
        }
        if($request->input('inputAlt') == '')
		{
			$data['inputerror'][] = 'inputAlt';
			$data['error_string'][] = 'Image Alt is required';
			$data['status'] = FALSE;
        }
        if($request->input('pageeditor') == '')
		{
			$data['inputerror'][] = 'pageeditor';
			$data['error_string'][] = 'Blog content is required';
			$data['status'] = FALSE;
        }
		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }


    public function getBlogPosts(Request $request){

        $columns = array(
            0 =>'blog_small_image',
            1=> 'blog_title',
            2=> 'blog_url',
            3=> 'category',
            4=> 'is_featured',
            5=> 'is_active',
            6=> 'Action',
            
        );
        $totalData = DB::select("select b.id,b.blog_category_id,b.blog_title,b.blog_url,b.blog_small_image,b.is_active,b.is_featured,bc.category_name from blog_posts as b left join blog_categories as bc on b.blog_category_id=bc.blog_category_id ");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
       
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
        
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value')))
        {
           
            $categories = DB::select("select b.id,b.blog_category_id,b.blog_title,b.blog_url,b.blog_small_image,b.is_active,b.is_featured,bc.category_name from blog_posts as b left join blog_categories as bc on b.blog_category_id=bc.blog_category_id  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $categories = DB::select("select b.id,b.blog_category_id,b.blog_title,b.blog_url,b.blog_small_image,b.is_active,b.is_featured,bc.category_name from blog_posts as b left join blog_categories as bc on b.blog_category_id=bc.blog_category_id  where bc.category_name like '%".$search."%' or b.blog_title like '%".$search."%'  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);

            $totalFiltered =count($categories);
        }

        $data = array();
        if(!empty($categories))
        {
            foreach ($categories as $category)
            {
                //$nestedData['id'] = $page->id;
                $nestedData=array();
                $imgPath=asset($category->blog_small_image);
                $nestedData['image'] = '<img src="'. $imgPath .'" style="height:100px;">';
                $nestedData['blog_title'] = $category->blog_title;
                $nestedData['blog_url'] = $category->blog_url;
                $nestedData['category'] = $category->category_name;
                if($category->is_featured == '1')
				$nestedData['is_featured'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="No" onclick="featured('."'".$category->id."'".')"><i class="fa fa-thumbs-up"></i> Yes</a>';
                else
				$nestedData['is_featured'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Yes" onclick="featured('."'".$category->id."'".')"><i class="fa fa-thumbs-down"></i> No</a>';

                if($category->is_active == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_blog('."'".$category->id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_blog('."'".$category->id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';

                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="'.url('admin/edit-blog').'/'.$category->id.'"><i class="fa fa-pencil"></i> Edit</a>
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

    public function updateBlogMeta(Request $request){

			$dataMeta['blog_title']=trim($request->input('inputTitle'));
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
            
            $id=BlogMeta::where('blog_id', $id)->update($dataMeta);
            
			return response()->json(['message' => 'Blog Meta Created Succesfully','status'=>true]);
			
		
    }
    
    public function changeBlogPostStatus(Request $request){

        $id=$request->id;
        $category=BlogPost::where('id',$id)->first();

        if($category->is_active=='inactive')
        BlogPost::where('id',$id)->update(['is_active'=>'active']);
        else
        BlogPost::where('id',$id)->update(['is_active'=>'inactive']);

        return response()->json(['message' => 'Status changed Succesfully','status'=>true]);
    }
    
    public function changeBlogPostFeature(Request $request){

        $id=$request->id;
        $category=BlogPost::where('id',$id)->first();

        if($category->is_featured=='0')
        BlogPost::where('id',$id)->update(['is_featured'=>'1']);
        else
        BlogPost::where('id',$id)->update(['is_featured'=>'0']);

        return response()->json(['message' => 'Status changed Succesfully','status'=>true]);
    }

    public function editblog($id){
        $blogCategories=BlogCategory::where('is_active','active')->get();
        $blogDetails=BlogPost::where('id',$id)->first();
        return view('admin.editblog',['blogdetails'=>$blogDetails,'blogcategories'=>$blogCategories]);
    }

}
