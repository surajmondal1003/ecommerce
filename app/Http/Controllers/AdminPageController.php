<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pages;
use App\PageBanner;
use App\PageContent;
use App\PageMeta;
class AdminPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pagelist');
    }
    public function newPage(){
        return view('admin.newpage');
    }

    public function savePage(Request $request){
        $this->_validatePage($request);
		$data['page_name']=$request->input('inputName');
		$data['page_url']=$request->input('inputUrl');
		$data['parent_id']=$request->input('inputParent');
		$data['location']=$request->input('inputLocation');
		$data['position']=$request->input('inputPosition');
		$data['is_active']='active';
        $data['ip_address']=getenv('REMOTE_ADDR');
        
        $id=Pages::create($data);
        $dataId['page_id']=$id->page_id;
		$dataId['ip_address']=getenv('REMOTE_ADDR');
		PageContent::create($dataId);
		PageBanner::create($dataId);
		PageMeta::create($dataId);

        return response()->json(['status'=>true,'message' => 'Succesfully Created Pages','status'=>1]);
	}

    public function get_pages(Request $request){

        $columns = array(
            0 =>'page_name',
            1=> 'page_url',
            2=> 'parent_name',
            3=> 'location',
            4=> 'position',
            5=> 'status',
            6=> 'Action',
            
        );
        $totalData = DB::select("SELECT m.page_id, m.page_name, m.page_url,m.parent_id,m.location,m.position ,m.is_active, D.page_name as parent_name FROM `pages` m LEFT OUTER JOIN (SELECT `page_id`,`parent_id`, `page_name` FROM `pages` ) D ON m.parent_id = D.page_id");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
        // return response()->json($request);
        // die;
        // if($request->input('order.1.column')){
            
        // $order = $columns[$request->input('order.1.column')];
        // }
        // else{
        //     $order = $columns[0];
        // }
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
        // echo $order;die;
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select("SELECT m.page_id, m.page_name, m.page_url,m.parent_id,m.location,m.position,m.is_active,D.page_name as parent_name FROM `pages` m LEFT OUTER JOIN (SELECT `page_id`,`parent_id`, `page_name` FROM `pages` ) D ON m.parent_id = D.page_id order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT m.page_id, m.page_name, m.page_url,m.parent_id,m.location,m.position,m.is_active,D.page_name as parent_name FROM `pages` m LEFT OUTER JOIN (SELECT `page_id`,`parent_id`, `page_name` FROM `pages` ) D ON m.parent_id = D.page_id where m.page_name like '%".$search."%' or m.page_url like '%".$search."%' or m.position like '%".$search."%' or m.location like '%".$search."%' or D.page_name like '%".$search."%' order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                //$nestedData['id'] = $page->id;
               // $nestedData=array();
                $nestedData['page_name'] = $page->page_name;
                $nestedData['page_url'] = $page->page_url;
                $nestedData['parent_name'] = $page->parent_name;
                $nestedData['location'] = $page->location;
                $nestedData['position'] = $page->position;
                

                if($page->is_active == 'active')
				$nestedData['status'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="change_page('."'".$page->page_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['status'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="change_page('."'".$page->page_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';


                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="'.url('admin/edit-content').'/'.$page->page_id.'"><i class="fa fa-eye"></i> Content</a>
                         <a class="dropdown-item" href="'.url('admin/edit-banner').'/'.$page->page_id.'"><i class="fa fa-image"></i> Banner</a>
                         <a class="dropdown-item" href="'.url('admin/edit-page-meta').'/'.$page->page_id.'"><i class="fa fa-code"></i> Meta</a>
                         <a class="dropdown-item" href="'.url('admin/edit-page').'/'.$page->page_id.'"><i class="fa fa-pencil"></i> Edit</a>
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

        // $data = array();
        // if(!empty($roomtypes))
        // {
        //         //print_r($roomtypes);die;
            
        //     foreach($roomtypes as $roomtype){
                
        //         $nestedData['page_id'] = $roomtype->id;
        //         $nestedData['page_name'] = $roomtype->page_name;
        //         $nestedData['page_url'] = $roomtype->page_url;
        //         $nestedData['parent_id'] = $roomtype->parent_id;
               
        //         $data[] = $nestedData;
        //     }
            
        // }
    
     }


     public function get_page_detail($page_id){

        $pages = DB::select("SELECT m.page_id, m.page_name, m.page_url,m.parent_id,m.location,m.position ,m.is_active, D.page_name as parent_name FROM `pages` m LEFT OUTER JOIN (SELECT `page_id`,`parent_id`, `page_name` FROM `pages` ) D ON m.parent_id = D.page_id WHERE m.page_id=".$page_id."");

        $data = array();
        if(!empty($pages))
        {
                $data['pName'] = $pages[0]->page_name;
                $data['pUrl'] = $pages[0]->page_url;
                $data['pParent'] = $pages[0]->parent_name;
                $data['pParentId'] = $pages[0]->parent_id;
                $data['pLocation'] = strtolower($pages[0]->location);
                $data['pPosition'] = $pages[0]->position;
            
        }
        $json_data = array("data" => $data);
        
        return response()->json($json_data);

     }
     public function editpage($id){
         $parentList=Pages::get();
         $pageDetail=Pages::where('page_id',$id)->first();
         return view('admin.editpage',['pagedetails'=>$pageDetail,'parentList'=>$parentList]);
     }

     public function updatePage(Request $request){
        
        $this->_validateUpdatePage($request);
        $id=$request->id;
		$data['page_name']=$request->input('inputName');
		$data['page_url']=$request->input('inputUrl');
		$data['parent_id']=$request->input('inputParent');
		$data['location']=$request->input('inputLocation');
		$data['position']=$request->input('inputPosition');
		$data['is_active']='active';
		$data['ip_address']=getenv('REMOTE_ADDR');
       
        Pages::where('page_id', $id)->update($data);
        return response()->json(['message' => 'Succesfully Updated Pages','status'=>1]);
		
    }

    public function getContent($page_id){
        $content = DB::select("SELECT c.page_id, c.page_content,p.page_name FROM `page_contents` AS c LEFT JOIN pages AS p ON p.page_id=c.page_id WHERE c.page_id=".$page_id."");

        $data = array();
        if(!empty($content))
        {
                $data['pId'] = $content[0]->page_id;
                $data['pName'] = $content[0]->page_name;
                $data['pContent'] = $content[0]->page_content;
               
        }
        $json_data = array("data" => $data);
        
        return response()->json($json_data);

    }

    public function editContent($id){
        //$pageContent=PageContent::where('page_id',$id)->first();
       $pageContent= DB::table('pages')
            ->leftJoin('page_contents', 'pages.page_id', '=', 'page_contents.page_id')
            ->select('pages.page_name','pages.page_id','page_contents.*')
            ->where('pages.page_id','=',$id)
            ->first();
        return view('admin.pagecontent',['content'=>$pageContent]);
    }
    
	public function updateContent(Request $request){
        $id=$request->id;
        $data['page_content']=$request->input('pageeditor');
        $data['ip_address']=getenv('REMOTE_ADDR');
        PageContent::where('page_id', $id)->update($data);
        //return response()->json(['message' => 'Content Updated Succesfully','status'=>1]);
        return redirect('admin/page-list');
        
    }

    public function getMeta($page_id){
        $content = DB::select("SELECT m.*, p.page_name FROM `page_metas` AS m LEFT JOIN pages AS p ON p.page_id=m.page_id WHERE m.page_id=".$page_id."");

        $data = array();
        if(!empty($content))
        {
                $data['pId'] = $content[0]->page_id;
                $data['pName'] = $content[0]->page_name;
                $data['mDesc'] = $content[0]->meta_description;
                $data['pTitle'] = $content[0]->page_title;
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

    public function editPageMeta($id){
        $pageMeta=$this->getMeta($id);
        return view('admin.editpagemeta',['pagemeta'=>$pageMeta]);
    }

    public function updatePageMeta(Request $request){
            $id=$request->id;
            $dataMeta['page_title']=trim($request->input('inputTitle'));
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
           
            
            PageMeta::where('page_id', $id)->update($dataMeta);
            
			return response()->json(['message' => 'Meta Updated Succesfully','status'=>1]);
		
	}
    

    public function pages_dropdown(){
       
        $pages = DB::select("select * from pages");
        $data = array();
        $nestedData['page_id'] = 0;
        $nestedData['page_name']="No Parent";
        $data[]=$nestedData;
        if(!empty($pages))
        {
            foreach($pages as $page){
                
                $nestedData['page_id'] = $page->page_id;
                $nestedData['page_name'] = $page->page_name;
                
                $data[] = $nestedData;
            }

        }
        $options="";
        foreach($data as $d){
            $options.='<option value="'.$d["page_id"].'">'.$d["page_name"].'</option>';
        }

       
        $json_data = array('status'=>true,"data" => $options);
        
        return response()->json($json_data);

    }

    
	

    public function change_page_status(Request $request){
        $id=$request->id;
        $pages=Pages::where('page_id',$id)->first();

        if($pages->is_active=='inactive')
        Pages::where('page_id',$id)->update(['is_active'=>'active']);
        else
        Pages::where('page_id',$id)->update(['is_active'=>'inactive']);

        return response()->json(['status'=>true,'message' => 'Status changed Succesfully']);
      
     }

   
    private function _validatePage(Request $request){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputName') == '')
		{
			$data['inputerror'][] = 'inputName';
			$data['error_string'][] = 'Page Name is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputUrl') == '')
		{
			$data['inputerror'][] = 'inputUrl';
			$data['error_string'][] = 'Page URL is required';
			$data['status'] = FALSE;
        }
        
        if($request->input('inputUrl') != '')
		{
            $pages=array();
            $pages=Pages::where('page_url',$request->input('inputUrl'))->get();
            if (count($pages)>0)
            {
                $data['inputerror'][] = 'inputUrl';
			    $data['error_string'][] = 'Page URL must be unique';
			    $data['status'] = FALSE;
            }
		}

		if($request->input('inputParent') == '')
		{
			$data['inputerror'][] = 'inputParent';
			$data['error_string'][] = 'Parent  is required';
			$data['status'] = FALSE;
		}
		
	
		if($request->input('inputPosition') == '')
		{
			$data['inputerror'][] = 'inputPosition';
			$data['error_string'][] = 'Position is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    
    private function _validateUpdatePage(Request $request){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($request->input('inputName') == '')
		{
			$data['inputerror'][] = 'inputName';
			$data['error_string'][] = 'Page Name is required';
			$data['status'] = FALSE;
        }
        if($request->input('inputUrl') == '')
		{
			$data['inputerror'][] = 'inputUrl';
			$data['error_string'][] = 'Page URL is required';
			$data['status'] = FALSE;
        }
        
        if($request->input('inputUrl') != '')
		{
            $pages=Pages::where('page_url',$request->input('inputUrl'))
                        ->where('page_id','!=',$request->id)
                        ->get();
            if (count($pages)>0)
            {
                $data['inputerror'][] = 'inputUrl';
			    $data['error_string'][] = 'Page URL must be unique';
			    $data['status'] = FALSE;
            }
		}

		// if($request->input('inputParent') == '0')
		// {
		// 	$data['inputerror'][] = 'inputParent';
		// 	$data['error_string'][] = 'Parent  is required';
		// 	$data['status'] = FALSE;
		// }
		
	
		if($request->input('inputPosition') == '')
		{
			$data['inputerror'][] = 'inputPosition';
			$data['error_string'][] = 'Position is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    public function editBanner($id){
        $pageBanner=PageBanner::where('id',$id)->first();
        return view('admin.editbanner',['bannerInfo'=>$pageBanner]);
    }
    public function updateBanner(Request $request){
        $id=$request->id;
		$data['banner_path']=$request->input('inputSImage');
		$data['banner_content']=$request->input('pageeditor');
	    $data['ip_address']=getenv('REMOTE_ADDR');
       
        PageBanner::where('page_id', $id)->update($data);
        return response()->json(['message' => 'Succesfully Updated Pages','status'=>true]);
    }


}
