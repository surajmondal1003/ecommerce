<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Discount;
use App\ProductcategoryRelation;
use App\Productdiscount;
use App\Attributes;
use App\Productattributes;
use App\ProductImages;
use App\Stock;
use App\FreeShippingPincode;
use App\Nondeliverablepincode;
use App\Shippingpincode;
use App\ProductMeta;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addproduct(){
        if(isPermitted('admin/add-product',Auth::user()->id)){
        $discount=Discount::where('is_active','active')->get();
        $attributes=Attributes::where('is_active','active')->get();
        return view('admin.addProduct',['discount'=>$discount,'attributes'=>$attributes]);
        }
    }

    public function saveProduct(Request $request){

        $this->_validateProduct($request);

        $parentArr=array();
        foreach($request->input('inputCategory') as $category ){
            $parentArr[]=$category;
            $catIds=$this->getParents($category);
            
            foreach($catIds as $pId){
                $parentArr[]=$pId;
            }
        }
        $parentIds=array_unique($parentArr);


		$data['product_name']=$request->input('inputPrdouct_name');
		$data['product_url']=$request->input('inputPUrl');
		$data['description']=$request->input('inputPdesc');
		$data['sku']=$request->input('inputPsku');
		$data['regular_price']=$request->input('inputPregular_price');
		$data['discount_price']=$request->input('inputPdiscount_price');
		$data['taxable']=$request->input('inputPtaxable');
		$data['is_supreme']=$request->input('inputPsupreme');
		$data['product_code']=$request->input('inputPCode');
		$data['is_active']='active';
        
        $id=Products::create($data);
        Stock::create(['product_id'=>$id->product_id,'qty'=>$request->input('inputPqty')]);

        $productcategoryArr=array();
       
                foreach($parentIds as $item){
                    $prodCategory['product_id']=$id->product_id;
                    $prodCategory['category_id']=$item;
                    $productcategoryArr[]=$prodCategory;
                }
      
        
        ProductcategoryRelation::insert($productcategoryArr);
        
        if(!empty($request->input('inputDiscountPlan'))){
        $productDiscArr=array();
        foreach($request->input('inputDiscountPlan') as $discount ){
            $prodDiscount['product_id']=$id->product_id;
            $prodDiscount['discount_id']=$discount;
            $productDiscArr[]=$prodDiscount;
        }
        Productdiscount::insert($productDiscArr);
        }

        $productAttributesArr=array();
        foreach($request->input('inputAttrid') as $key=>$value ){
            if($request->input('inputAttrval')[$key]!=''){
                $prodAttribute['product_id']=$id->product_id;
                $prodAttribute['attr_id']=$request->input('inputAttrid')[$key];
                $prodAttribute['attr_value']=$request->input('inputAttrval')[$key];
                $productAttributesArr[]=$prodAttribute;
            }
        }
        Productattributes::insert($productAttributesArr);

        $productImagesArr=array();
        foreach($request->input('filepath') as $key=>$value ){
            $prodImg['product_id']=$id->product_id;
            $prodImg['image_name']=$value;
            if($key==$request->input('featuredImg')){
                $prodImg['is_primary']='1';
            }
            $productImagesArr[]=$prodImg;
        }
        ProductImages::insert($productImagesArr);
       
        $freepincodesArr=array();
        foreach($request->input('inputFPincode') as $key=>$value ){
            if($value){
            $fPin['product_id']=$id->product_id;
            $fPin['pincode']=$value;
            $fPin['status']='1';

            $freepincodesArr[]=$fPin;
            }
        }
        FreeShippingPincode::insert($freepincodesArr);

        $nondeliverypincodesArr=array();
        foreach($request->input('inputNonPincode') as $key=>$value ){
            if($value){
            $nonPin['product_id']=$id->product_id;
            $nonPin['pincode']=$value;
            $nonPin['status']='1';

            $nondeliverypincodesArr[]=$nonPin;
            }
        }
        Nondeliverablepincode::insert($nondeliverypincodesArr);


        $meta['product_id']=$id->product_id;
        $meta['ip_address']=getenv('REMOTE_ADDR');
        $meta['title']=$request->input('inputPrdouct_name');
        ProductMeta::create($meta);

        
        return response()->json(['message' => 'Succesfully Created Product','status'=>1]);
    }

    public function products(){
        return view('admin.productList');
    }

    public function getParents($category){
         static $Ids=array();
        $cat=DB::select("select category_parent from categories where category_id=".$category);
       
        if($cat[0]->category_parent !='0' ){
            $Ids[]=$cat[0]->category_parent;
            return $this->getParents($cat[0]->category_parent);
        }
        else{
            
            return $Ids;
        }
    }

    private function _validateProduct(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
        if($request->input('inputPrdouct_name')== ''){
            $data['inputerror'][] = 'inputPrdouct_name';
            $data['error_string'][] = 'Product Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPUrl')== ''){
            $data['inputerror'][] = 'inputPUrl';
            $data['error_string'][] = 'Product URL is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPUrl')!= ''){
            if(Products::where('product_url',$request->input('inputPUrl'))->first()){
            $data['inputerror'][] = 'inputPUrl';
            $data['error_string'][] = 'Product URL already Exists';
            $data['status'] = FALSE;
            }
        }
        if($request->input('inputPdesc')== ''){
            $data['inputerror'][] = 'inputPdesc';
            $data['error_string'][] = 'Product Description Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPsku')== ''){
            $data['inputerror'][] = 'inputPsku';
            $data['error_string'][] = 'Product SKU is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPregular_price')== ''){
            $data['inputerror'][] = 'inputPregular_price';
            $data['error_string'][] = 'Regular Price is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPqty')== ''){
            $data['inputerror'][] = 'inputPqty';
            $data['error_string'][] = 'Quantity is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPdiscount_price')== ''){
            $data['inputerror'][] = 'inputPdiscount_price';
            $data['error_string'][] = 'Discount Price is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPtaxable')== ''){
            $data['inputerror'][] = 'inputPtaxable';
            $data['error_string'][] = 'Tax is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPsupreme')== ''){
            $data['inputerror'][] = 'inputPsupreme';
            $data['error_string'][] = 'Type is is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPCode')== ''){
            $data['inputerror'][] = 'inputPCode';
            $data['error_string'][] = 'Product Code is required';
            $data['status'] = FALSE;
           
        }
        $data['validString']['featuredImg']='';
        if($request->input('featuredImg')==''){
            $data['inputerror'][] = 'featuredImg';
            $data['error_string'][] = 'Please select A featured Image';
            $data['status'] = FALSE;
            $data['valid'] = false;
            $data['validString']['featuredImg'] = 'Please select one Featured image';
           
        }
        $data['validString']['inputCategory']='';
         if(empty($request->input('inputCategory'))){
            $data['inputerror'][] = 'inputCategory';
            $data['error_string'][] = 'Product Category is required';
                $data['status'] = FALSE;
                $data['valid'] = false;
                $data['validString']['inputCategory'] = 'Please select Atleast one Category';
        }
        foreach($request->input('filepath') as $key=>$value){
            if($request->input('filepath')[$key]== ''){
                $data['inputerror'][] = 'filepath['.$key.']';
                $data['error_string'][] = 'Product Image is required';
                    $data['status'] = FALSE;
                    
            }
        }
        
        foreach($request->input('inputFPincode') as $key=>$value ){
            if($value!=''){
                $is_exist=Shippingpincode::where('pincode',$value)->first();
                if(!$is_exist){

                $data['inputerror'][] = 'inputFPincode['.$key.']';
                $data['error_string'][] = 'Pincode does not exist.Please add pincode in Pincode Master';
                $data['status'] = FALSE;
                }   
            }
        }
        foreach($request->input('inputNonPincode') as $key=>$value ){
            if($value!=''){
                $is_exist=Shippingpincode::where('pincode',$value)->first();
                if(!$is_exist){

                $data['inputerror'][] = 'inputNonPincode['.$key.']';
                $data['error_string'][] = 'Pincode does not exist.Please add pincode in Pincode Master';
                $data['status'] = FALSE;
                }   
            }
        }
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }
    


    public function get_products_list(Request $request){

        $columns = array(
            0 =>'product_id',
            1 =>'product_name',
            2=> 'sku',
            3=> 'description',
            4=> 'regular_price',
            5=> 'discount_price',
         
        );
        $totalData = DB::select("SELECT * from products ");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select(" SELECT * from products order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT * from products where product_name like '%".$search."%' or sku like '%".$search."%' or description like '%".$search."%' or regular_price like '%".$search."%' or discount_price like '%".$search."%' order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
                $nestedData['product_name'] = $page->product_name;
                $nestedData['sku'] =$page->sku;
                $nestedData['description'] =$page->description;
                $nestedData['regular_price'] =$page->regular_price;
                $nestedData['discount_price'] =$page->discount_price;
            
                if($page->is_active == 'active')
				$nestedData['is_active'] = '<a class="btn btn-sm btn-success" href="javascript:void()" title="Deactivate" onclick="fdfchange_productType('."'".$page->product_id."'".')"><i class="fa fa-thumbs-up"></i> Active</a>';
                else
				$nestedData['is_active'] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Activate" onclick="dfvdfchange_productType('."'".$page->product_id."'".')"><i class="fa fa-thumbs-down"></i> Inactive</a>';

                
                $nestedData['Action']='<div class="dropdown">
                 <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                     <i class="fa fa-ellipsis-h"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                        
                         <a class="dropdown-item" href="../admin/edit-product-meta/'.$page->product_id.'"><i class="fa fa-eye"></i> Meta</a>
                         <a class="dropdown-item" href="../admin/get-product-details/'.$page->product_id.'"><i class="fa fa-pencil"></i> Edit</a>
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


     

    public function editProduct($id){
        $prodDetails=DB::table('products')
        ->leftJoin('productcategory_relations','productcategory_relations.product_id','=','products.product_id')
        ->select('*')->where('products.product_id',$id)->get();

        $prodDiscount=DB::table('products')
        ->leftJoin('productdiscounts','productdiscounts.product_id','=','products.product_id')
        ->leftJoin('discounts','discounts.discount_id','=','productdiscounts.discount_id')
        ->select('*')->where('products.product_id',$id)->get();

        $prodAttributeDetails=DB::table('products')
        ->leftJoin('productattributes','productattributes.product_id','=','products.product_id')
        ->leftJoin('attributes','attributes.attr_id','=','productattributes.attr_id')
        ->select('attributes.attr_id','attributes.attr_name','productattributes.attr_value','productattributes.productattributes_id as prodAttr_id')
        ->where('products.product_id',$id)->get();

        $prodImageDetails=DB::table('products')
        ->leftJoin('product_images','product_images.product_id','=','products.product_id')
        ->select('product_images.image_name','product_images.is_primary','product_images.id')
        ->where('products.product_id',$id)->get();

        $productFreepincodes=DB::table('products')
        ->leftJoin('free_shipping_pincodes','free_shipping_pincodes.product_id','=','products.product_id')
        ->select('free_shipping_pincodes.free_shipping_id','free_shipping_pincodes.pincode')
        ->where('products.product_id',$id)->get();

        $nonDelincodes=DB::table('products')
        ->leftJoin('nondeliverablepincodes','nondeliverablepincodes.product_id','=','products.product_id')
        ->select('nondeliverablepincodes.non_del_pin_id','nondeliverablepincodes.pincode')
        ->where('products.product_id',$id)->get();

        $discount=Discount::where('is_active','active')->get();
        $attributes=Attributes::where('is_active','active')->get();
        $categoryIds=array();
        foreach($prodDetails as $item){
            $categoryIds[]=$item->category_id;
           
        }
        $discountIds=array();
        foreach($prodDiscount as $item){
            $discountIds[]=$item->discount_id;
        }

        $attributeIds=array();
        foreach($prodAttributeDetails as $item){
            $attributeIds[]=$item->attr_id;
        }
        
           
        //   echo '<pre>';print_r($categoryIds);echo '</pre>';
        // // //   echo '<pre>';print_r($prodImageDetails);echo '</pre>';
        //   die;
        return view('admin.editProduct',
                    [
                        'prodDetails'=>$prodDetails,
                        'prodDiscount'=>$prodDiscount,
                        'prodAttributeDetails'=>$prodAttributeDetails,
                        'prodImageDetails'=>$prodImageDetails,
                        'discount'=>$discount,
                        'attributes'=>$attributes,
                        'attributeIds'=>$attributeIds,
                        'discountIds'=>$discountIds,
                        'categoryIds'=>$categoryIds,
                        'productFreepincodes'=>$productFreepincodes,
                        'nonDelincodes'=>$nonDelincodes,
                    ]);
    }

    public function deleteProductImage(Request $request){
        $image_id=$request->input('image_id');
        ProductImages::where('id',$image_id)->delete();

        return response()->json(array('status'=>true));
    }

    public function updateProduct(Request $request){
        $this->_validateProductupdate($request);

        $parentArr=array();
        foreach($request->input('inputCategory') as $category ){
            $parentArr[]=$category;
            $catIds=$this->getParents($category);
            
            foreach($catIds as $pId){
                $parentArr[]=$pId;
            }
        }
        $parentIds=array_unique($parentArr);

        $product_id=$request->input('inputProductId');
		$data['product_name']=$request->input('inputPrdouct_name');
		$data['product_url']=$request->input('inputPUrl');
		$data['description']=$request->input('inputPdesc');
		$data['sku']=$request->input('inputPsku');
		$data['regular_price']=$request->input('inputPregular_price');
		$data['discount_price']=$request->input('inputPdiscount_price');
		$data['taxable']=$request->input('inputPtaxable');
		$data['is_supreme']=$request->input('inputPsupreme');
		$data['product_code']=$request->input('inputPCode');
		$data['is_active']='active';
        
        $id=Products::where('product_id',$product_id)->update($data);
    
        $productcategoryArr=array();
       
                foreach($parentIds as $item){
                    $prodCategory['product_id']=$product_id;
                    $prodCategory['category_id']=$item;
                    $productcategoryArr[]=$prodCategory;
                }
      
        
        ProductcategoryRelation::where('product_id',$product_id)->delete();
        ProductcategoryRelation::insert($productcategoryArr);
        
        if(!empty($request->input('inputDiscountPlan'))){
        $productDiscArr=array();
        foreach($request->input('inputDiscountPlan') as $discount ){
            $prodDiscount['product_id']=$product_id;
            $prodDiscount['discount_id']=$discount;
            $productDiscArr[]=$prodDiscount;
        }
        Productdiscount::where('product_id',$product_id)->delete();
        Productdiscount::insert($productDiscArr);
        }

        $productAttributesArr=array();
        foreach($request->input('inputAttrid') as $key=>$value ){
            if($request->input('inputAttrval')[$key]!=''){
                $prodAttribute['product_id']=$product_id;
                $prodAttribute['attr_id']=$request->input('inputAttrid')[$key];
                $prodAttribute['attr_value']=$request->input('inputAttrval')[$key];
                $productAttributesArr[]=$prodAttribute;
            }
        }
        Productattributes::where('product_id',$product_id)->delete();
        Productattributes::insert($productAttributesArr);

        $productImagesArr=array();
        foreach($request->input('filepath') as $key=>$value ){
            $prodImg['product_id']=$product_id;
            $prodImg['image_name']=$value;
            $prodImg['is_primary']='0';
            if($key==$request->input('featuredImg')){
                $prodImg['is_primary']='1';
            }
            $productImagesArr[]=$prodImg;
        }
        ProductImages::where('product_id',$product_id)->delete();
        ProductImages::insert($productImagesArr);

        
        
        $freepincodesArr=array();
        foreach($request->input('inputFPincode') as $key=>$value ){
            if($value){
            $fPin['product_id']=$product_id;
            $fPin['pincode']=$value;
            $fPin['status']='1';

            $freepincodesArr[]=$fPin;
            }
        }
        FreeShippingPincode::where('product_id',$product_id)->delete();
        FreeShippingPincode::insert($freepincodesArr);

        $nonpincodesArr=array();
        foreach($request->input('inputNonPincode') as $key=>$value ){
            if($value){
            $nonPin['product_id']=$product_id;
            $nonPin['pincode']=$value;
            $nonPin['status']='1';

            $nonpincodesArr[]=$nonPin;
            }
        }
        Nondeliverablepincode::where('product_id',$product_id)->delete();
        Nondeliverablepincode::insert($nonpincodesArr);
        

        return response()->json(['message' => 'Succesfully Created Product','status'=>1]);
    }

    private function _validateProductupdate(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
        $data['valid']=true;
        if($request->input('inputPrdouct_name')== ''){
            $data['inputerror'][] = 'inputPrdouct_name';
            $data['error_string'][] = 'Product Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPUrl')== ''){
            $data['inputerror'][] = 'inputPUrl';
            $data['error_string'][] = 'Product URL is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPdesc')== ''){
            $data['inputerror'][] = 'inputPdesc';
            $data['error_string'][] = 'Product Description Name is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPsku')== ''){
            $data['inputerror'][] = 'inputPsku';
            $data['error_string'][] = 'Product SKU is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPregular_price')== ''){
            $data['inputerror'][] = 'inputPregular_price';
            $data['error_string'][] = 'Regular Price is required';
            $data['status'] = FALSE;
           
        }
       
        if($request->input('inputPdiscount_price')== ''){
            $data['inputerror'][] = 'inputPdiscount_price';
            $data['error_string'][] = 'Discount Price is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPtaxable')== ''){
            $data['inputerror'][] = 'inputPtaxable';
            $data['error_string'][] = 'Tax is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPsupreme')== ''){
            $data['inputerror'][] = 'inputPsupreme';
            $data['error_string'][] = 'Type is is required';
            $data['status'] = FALSE;
           
        }
        if($request->input('inputPCode')== ''){
            $data['inputerror'][] = 'inputPCode';
            $data['error_string'][] = 'Product Code is required';
            $data['status'] = FALSE;
           
        }
        $data['validString']['featuredImg']='';
        if($request->input('featuredImg')==''){
            $data['inputerror'][] = 'featuredImg';
            $data['error_string'][] = 'Please select A featured Image';
            $data['status'] = FALSE;
            $data['valid'] = false;
            $data['validString']['featuredImg'] = 'Please select one Featured image';
           
        }
        $data['validString']['inputCategory']='';
         if(empty($request->input('inputCategory'))){
            $data['inputerror'][] = 'inputCategory';
            $data['error_string'][] = 'Product Category is required';
                $data['status'] = FALSE;
                $data['valid'] = false;
                $data['validString']['inputCategory'] = 'Please select Atleast one Category';
        }
        foreach($request->input('filepath') as $key=>$value){
            if($request->input('filepath')[$key]== ''){
                $data['inputerror'][] = 'filepath['.$key.']';
                $data['error_string'][] = 'Product Image is required';
                    $data['status'] = FALSE;
                    
            }
        }


        foreach($request->input('inputFPincode') as $key=>$value ){
            if($value!=''){
                $is_exist=Shippingpincode::where('pincode',$value)->first();
                if(!$is_exist){

                $data['inputerror'][] = 'inputFPincode['.$key.']';
                $data['error_string'][] = 'Pincode does not exist.Please add pincode in Pincode Master';
                $data['status'] = FALSE;
                }   
            }
        }
        foreach($request->input('inputNonPincode') as $key=>$value ){
            if($value!=''){
                $is_exist=Shippingpincode::where('pincode',$value)->first();
                if(!$is_exist){

                $data['inputerror'][] = 'inputNonPincode['.$key.']';
                $data['error_string'][] = 'Pincode does not exist.Please add pincode in Pincode Master';
                $data['status'] = FALSE;
                }   
            }
        }
        
       
		if($data['status'] === FALSE || $data['valid'] === false)
		{
            echo json_encode($data);
            exit();
			
		}
    }


    public function getProductMeta($page_id){
        $content = DB::select("SELECT m.*, p.product_name FROM `product_metas` AS m LEFT JOIN products AS p ON p.product_id=m.product_id WHERE m.product_id=".$page_id."");

        $data = array();
        if(!empty($content))
        {
                $data['pId'] = $content[0]->product_id;
                $data['pName'] = $content[0]->product_name;
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

    public function editProductMeta($id){
        $pageMeta=$this->getProductMeta($id);
        return view('admin.editproductmeta',['pagemeta'=>$pageMeta]);
    }

    public function updateProductMeta(Request $request){
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
           
            
            ProductMeta::where('product_id', $id)->update($dataMeta);
            
			return response()->json(['message' => 'Meta Updated Succesfully','status'=>1]);
		
	}

    
    public function get_products_view_count_list(Request $request){

        $columns = array(
            0 =>'count',
            1 =>'product_name',
            2=> 'sku',
            3=> 'description',
            4=> 'regular_price',
            5=> 'discount_price',
         
        );
        $totalData = DB::select("SELECT * from  product_view_counts as pvc left join
        `products` as p on p.product_id=pvc.product_id ");
        $totalFiltered = count($totalData);
        $limit = $request->input('length');
        $start = $request->input('start');
      
        $order=($request->input('order.1.column'))? $columns[$request->input('order.1.column')]:$order = $columns[0];
       
        $dir = $request->input('order.0.dir')?$request->input('order.0.dir'):'DESC';
        
        if(empty($request->input('search.value')))
        {
           
            $pages = DB::select(" SELECT * from  product_view_counts as pvc left join
            `products` as p on p.product_id=pvc.product_id  order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);
                        
        }
        else {
            $search = $request->input('search.value');

            $pages = DB::select("SELECT * from  product_view_counts as pvc left join
            `products` as p on p.product_id=pvc.product_id  where product_name like '%".$search."%' or sku like '%".$search."%' or description like '%".$search."%' or regular_price like '%".$search."%' or discount_price like '%".$search."%' order by ". $order ." ".$dir. "  limit ". $limit ." offset ".$start);


            $totalFiltered =count($pages);
        }

        $data = array();
        if(!empty($pages))
        {
            foreach ($pages as $page)
            {
                $nestedData=array();
                $nestedData['product_name'] = $page->product_name;
                $nestedData['sku'] =$page->sku;
                $nestedData['description'] =str_limit($page->description,50);
                $nestedData['regular_price'] =$page->regular_price;
                $nestedData['discount_price'] =$page->discount_price;
                $nestedData['count'] =$page->count;
            
               

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

     public function view_count_products(){
        return view('admin.viewedproductList');
    }

    public function clear_viewed_products(){

        DB::table('product_view_counts')->delete();
        return response()->json(['message' => 'Updated Succesfully','status'=>true]);
    }
}
