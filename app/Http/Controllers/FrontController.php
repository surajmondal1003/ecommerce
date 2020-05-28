<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
//  use Session;
use App\Pages;
use App\PageBanner;
use App\PageContent;
use App\PageMeta;
use App\Stock;
use App\Membership;
use App\MembershipDetail;
use App\Nondeliverablepincode;
use App\ProductViewCount;

class FrontController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function getPage(Request $request){
        $ids=array('2'=>'contact','33'=>'thankyou','34'=>'contributer','35'=>'404');
        $url=ltrim($request->getPathInfo(),'/');
        $pageDetails=DB::table('page_contents')->select('page_contents.page_content','pages.id')->leftJoin('pages','pages.id','=','page_contents.id')->where('pages.page_url',$url)->first();
        if($pageDetails){
        if(array_key_exists($pageDetails->id,$ids)){
            $view='front.'.$ids[$pageDetails->id];
            return view($view);
        }
        else{
            $bannerDetail=PageBanner::where('id',$pageDetails->id)->first();
        return view('front.pages',['pageContent'=>$pageDetails->page_content,'pageBanner'=>$bannerDetail]);
        }
    }
    else{
        return redirect('404');
        }
    }

    public function getContact(){
        // $url=ltrim($request->getPathInfo(),'/');
        // $pageDetails=DB::table('page_contents')->select('page_contents.page_content','pages.id')->leftJoin('pages','pages.id','=','page_contents.id')->where('pages.page_url',$url)->first();
        return view('front.contact');
    }
    public function getBlogs(){
        return view('front.bloglist');
    }
    public function getCareer(){
        return view('front.career');
    }
    public function getIpforum(){
        return view('front.ipforum');
    }

    public function getBlog_Detail($blog_url)
    {
        $blogDetails=DB::table('blog_posts')->select('*')->where('blog_posts.blog_url',$blog_url)->first();
        
        return view('front.blog_detail',['blogDetails'=>$blogDetails]);
    }

    public function getProductDetailsPage($caturl,$prod_url)
    {
       

        $prodDetails=\DB::select(\DB::raw('SELECT p.product_name,p.regular_price,p.discount_price,
        p.product_id,p.description,p.product_url,p.is_supreme FROM `products` p left join productcategory_relations pc on pc.product_id=p.product_id
        left join productdiscounts pd on pd.product_id=p.product_id
        WHERE p.product_url="'.$prod_url.'"'));

        $prodAttributeDetails=DB::table('products')
        ->leftJoin('productattributes','productattributes.product_id','=','products.product_id')
        ->leftJoin('attributes','attributes.attr_id','=','productattributes.attr_id')
        ->select('attributes.attr_name','productattributes.attr_value')->where('products.product_url',$prod_url)->get();

        $prodImageDetails=DB::table('products')
        ->leftJoin('product_images','product_images.product_id','=','products.product_id')
        ->select('product_images.image_name')->where('products.product_url',$prod_url)->get();

        
        $in_stock='0';
        $stock=DB::select("select qty as `qty` from stocks
         where product_id=".$prodDetails[0]->product_id);
      
        if($stock[0]->qty > 0.00){
            $in_stock='1';
        }

        $is_addedTocart='0';
        
        $presentcart=Session::get('cart');
        if(!empty($presentcart)){

            foreach($presentcart as $key=>$cartItem){
                if($prodDetails[0]->product_id==$cartItem['product_id']){
                    $is_addedTocart='1';
                }
            }
        }
        $discount_percent=0;
        if($prodDetails[0]->regular_price > $prodDetails[0]->discount_price){
        $discount_percent=(($prodDetails[0]->regular_price-$prodDetails[0]->discount_price)/$prodDetails[0]->regular_price) * 100;
        }

        $prod_viewcount=ProductViewCount::where('product_id',$prodDetails[0]->product_id)->first();
        if($prod_viewcount){
            $prod_viewcount->count+=1;
            $prod_viewcount->save();
        }
        else{
            ProductViewCount::create(['product_id'=>$prodDetails[0]->product_id,'count'=>1]);
        }

        return view('front.product_detail',['prodDetails'=>$prodDetails,'caturl'=>$caturl,
        'imagesArr'=>$prodImageDetails,'attributeArr'=>$prodAttributeDetails,
        'in_stock'=>$in_stock,'is_addedTocart'=>$is_addedTocart,'discount_percent'=>$discount_percent]);
    }

    
    public function getProductListPage($category_url){


        $category_id=$result = \DB::select(\DB::raw('SELECT category_id FROM `categories` where
        category_url="'.$category_url.'"'));

        if($category_id){
        $total_count = \DB::select(\DB::raw('SELECT p.product_id  FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
        left join productcategory_relations as pc on pc.product_id=p.product_id
        left join categories as c on c.category_id=pc.category_id
        where pi.is_primary="1" AND c.category_url="'.$category_url.'" GROUP by p.product_id'));


        $result = \DB::select(\DB::raw('SELECT * FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
        left join productcategory_relations as pc on pc.product_id=p.product_id
        left join categories as c on c.category_id=pc.category_id
        where pi.is_primary="1" AND c.category_url="'.$category_url.'" GROUP by p.product_id LIMIT 24 OFFSET 0'));

        $accordionContent=$this->display_accordion();
        
        return view('front.product_list',['result'=>$result,'search_term_category'=>$category_url,
                                        'accordionContent'=>$accordionContent,
                                        'priceChckbox'=>array(),'sortType'=>'',
                                        'offset'=>0,
                                        'count'=>count($result),
                                        'total_count'=>count($total_count),
                                        'category_id'=>$category_id[0]->category_id
                                        ]);
        }
        else{
            $url=ltrim($_SERVER['REQUEST_URI'],'/');
            $pageDetails=DB::table('page_contents')->select('page_contents.page_content','pages.page_id')->leftJoin('pages','pages.page_id','=','page_contents.page_id')->where('pages.page_url',$url)->first();
            if($pageDetails){
                $bannerDetail=PageBanner::where('page_id',$pageDetails->page_id)->first();
                
            return view('front.pages',['pageContent'=>$pageDetails->page_content,'pageBanner'=>$bannerDetail]);
            }
        }
    }

    public function loadMoreProducts(Request $request){

            $query='';
            $order='';
            $priceChckbox=array();
            if(!empty($request->input('price_range'))){
                $priceStr='';
                $priceArr=array();
                foreach($request->input('price_range') as $key=>$value){
                    
                    $priceStr.=$value.',';
                    $priceChckbox[]=$key;
                }
            
                $priceArr=explode(',',rtrim($priceStr,','));
            
                $max = array_values(array_slice($priceArr, -1))[0];
                $min = $priceArr[0];
                $query.=' AND p.discount_price >='.$min.' AND p.discount_price<='.$max.'';
            }

            if(!empty($request->search_term)){
                $query.=' AND MATCH(p.product_name,p.description) AGAINST("'.$request->search_term.'")';
            }
            $search_term_category='';
            if(!empty($request->search_term_category)){
                $query.=' AND c.category_url="'.$request->search_term_category.'"';
                $search_term_category=$request->search_term_category;
            }
            if(!empty($request->sortType)){
                $order.=' ORDER BY p.discount_price '.$request->sortType.'';
            
            }
            $offset=$request->offset+24;




            $result = \DB::select(\DB::raw('SELECT p.*,pi.*,c.category_url FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
            left join productcategory_relations as pc on pc.product_id=p.product_id
            left join categories as c on c.category_id=pc.category_id
            WHERE pi.is_primary="1"  '.$query.'  GROUP by p.product_id  '.$order.' LIMIT 24 OFFSET '.$offset.''));

            $productDiv='';
            foreach($result as $row){
                $supremeText='';
                if($row->is_supreme=='1'){
                $supremeText='<div class="supreme">
                                    <img src="'.asset('assets/images/sup.png').'" alt="">
                                </div>';
                }

                $productDiv.='<div class="col-md-3 col-sm-6 col-xs-6 for-padding-less">
                        <div class="hi-icon-wrap hi-icon-effect wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="200ms">
                        <div class="big-box">
                        <div class="img-sec">
                            <a href="'.url($row->category_url.'/'.$row->product_url).'" target="_blank"><img src="'.asset($row->image_name).'" ></a>
                        </div>
                        <div class="txt-sec">
                            <div class="box">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="'.url($row->category_url.'/'.$row->product_url).'" target="_blank"><h4>'.str_limit($row->product_name,50).'</h4>
                                </a>
                                </div>
                            
                                <div class="icon hrt">
                                    <a href="javascript:void(0)" onclick="addToWishlist(\''.$row->product_url.'\')">
                                    <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                                    </a>
                                </div>
                            
                            </div>
                            
                            <div class="prc"><h3 class="lft-price"><strike>Rs '.number_format($row->regular_price).'</strike></h3><h3 class="rgt-price">Rs '.number_format($row->discount_price).'</h3></div>
                            '.$supremeText.'
                        
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>';
            }
            return response()->json(array('status'=>true,
            'productDiv'=>$productDiv,'offset'=>$offset,'count'=>count($result)));
      
    }



    public function productSearch(Request $request){

        
                $query='';
                $order='';
                $priceChckbox=array();
                if(!empty($request->input('price_range'))){
                    $priceStr='';
                    $priceArr=array();
                    foreach($request->input('price_range') as $key=>$value){
                        
                        $priceStr.=$value.',';
                        $priceChckbox[]=$key;
                    }
                
                    $priceArr=explode(',',rtrim($priceStr,','));
                
                    $max = array_values(array_slice($priceArr, -1))[0];
                    $min = $priceArr[0];
                    $query.=' AND p.discount_price >='.$min.' AND p.discount_price<='.$max.'';
                }

                if(!empty($request->search_term)){
                    $query.=' AND MATCH(p.product_name,p.description) AGAINST("'.$request->search_term.'")';
                }
                $search_term_category='';
                if(!empty($request->search_term_category)){
                    $query.=' AND c.category_url="'.$request->search_term_category.'"';
                    $search_term_category=$request->search_term_category;
                }
                if(!empty($request->sortType)){
                    $order.=' ORDER BY p.discount_price '.$request->sortType.'';
                
                }
  
                $total_count = \DB::select(\DB::raw('SELECT p.product_id FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
                left join productcategory_relations as pc on pc.product_id=p.product_id
                left join categories as c on c.category_id=pc.category_id
                WHERE pi.is_primary="1"  '.$query.'  GROUP by p.product_id  '.$order));

                $result = \DB::select(\DB::raw('SELECT p.*,pi.*,c.category_url FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
                left join productcategory_relations as pc on pc.product_id=p.product_id
                left join categories as c on c.category_id=pc.category_id
                WHERE pi.is_primary="1"  '.$query.'  GROUP by p.product_id  '.$order.' LIMIT 24 OFFSET 0'));

            
                $accordionContent=$this->display_accordion();
            
                return view('front.product_list',['result'=>$result,
                                                'search_term'=>$request->search_term,
                                                'accordionContent'=>$accordionContent,
                                                'search_term_category'=>$search_term_category,
                                                'priceChckbox'=>$priceChckbox,
                                                'sortType'=>$request->sortType,
                                                'offset'=>0,
                                                'count'=>count($result),
                                                'total_count'=>count($total_count),
                                                'category_id'=>''
                                                ]);
       
    }



    private function display_accordion() {
   
        $result = \DB::select(\DB::raw('SELECT c.category_id, c.category_name,c.category_parent,c.category_url FROM `categories` c
        WHERE c.category_parent = 0  AND c.is_active="active" ORDER BY c.category_name ASC'));
        
        $content='';
        foreach($result as $item){
            $content.= '<article class="content-entry">
            <h4 class="article-title"><i></i>'.$item->category_name.'</h4>
            <div class="accordion-content">';
    
            $subresult = \DB::select(\DB::raw('SELECT c.category_id, c.category_name,c.category_parent,c.category_url FROM `categories` c
        WHERE c.category_parent ='.$item->category_id.' AND c.is_active="active" ORDER BY c.category_name ASC'));
           
            foreach($subresult as $subitem){
                $content.='<p><a href='.url($subitem->category_url).' class="acdn">'.$subitem->category_name.'</a></p>';
            }
            $content.='</div></article>';
            
        }

        return $content;
    
    }



    public function addToCart(Request $request){
        
        $result = \DB::select(\DB::raw('SELECT p.product_id,s.qty FROM `products` as p
        left join stocks as s on s.product_id=p.product_id
        WHERE product_url ="'.$request->input('product_url').'"'));

        if($result[0]->qty > 0.00 && $result[0]->qty >= $request->input('cartqty')){
            $product_id=$result[0]->product_id;
            $flag=0;
            $presentcart=$request->session()->get('cart');
            if(!empty($presentcart)){

                foreach($presentcart as $key=>$cartItem){
                    if($product_id==$cartItem['product_id']){
                        $cartItem['qty']=$request->input('cartqty')?$request->input('cartqty'):'1';
                        
                        if($cartItem['product_id'] && $cartItem['qty']){
                        $request->session()->put('cart.'.$key.'', $cartItem);
                        $flag=1;
                        }
                    }
                }
                if($flag==0){
                    $cart['product_id']=$product_id;
                    $cart['qty']=$request->input('cartqty')?$request->input('cartqty'):'1';
                    if($cart['product_id'] && $cart['qty']){
                    $request->session()->push('cart', $cart);
                    }
                }
            }
            else{
                $cart['product_id']=$product_id;
                $cart['qty']=$request->input('cartqty')?$request->input('cartqty'):'1';
                if($cart['product_id'] && $cart['qty']){
                $request->session()->push('cart', $cart);
                }
                
            }
            $count=0;
            if($request->session()->get('cart')){
                $count=count($request->session()->get('cart'));
            }
            
            $data=$this->cartItems($request);

            return response()->json(array('status'=>true,
            'count'=>$count,
            'carttable'=>$data['carttable'],
            'itemTable'=>$data['itemTable'],
            'outofstock'=>'0'
            ));
        }
        else{
            return response()->json(array('status'=>true,
                                            'outofstock'=>'1'
                                            ));
        }
        
       

    }


    public function removeCartItem(Request $request){
        $result = \DB::select(\DB::raw('SELECT product_id FROM `products` 
        WHERE product_url ="'.$request->input('product_url').'"'));

        $product_id=$result[0]->product_id;

        $presentcart=$request->session()->get('cart');
        foreach($presentcart as $key=>$cartItem){
            if($product_id==$cartItem['product_id']){
                $request->session()->forget('cart.'.$key.'', $cartItem);
        
            }
        }

        $count=0;
        if($request->session()->get('cart')){
            $count=count($request->session()->get('cart'));
        }
         
        $data=$this->cartItems($request);
         
        return response()->json(array('status'=>true,
                                        'count'=>$count,
                                        'carttable'=>$data['carttable'],
                                        'itemTable'=>$data['itemTable'],
                                        'isDeliverable'=>$data['isDeliverable'],
                                        'isBlacklistPin'=>$data['isBlacklistPin'],
                                        'blacklistPins'=>$data['blacklistPins'],
                                        'delivery_period'=>$data['delivery_period'],
                                        'available_cod'=>$data['available_cod'],
                                    ));

    }

    public function cartItems(Request $request){
        // print_r($request->session()->get('cart'));die;
       $cartItemsdetailsArr=array();
       $subtotal=0;
       $itemtotal=0;
       $total=0;
       $subdeliveryChrg=0;
       $deliveryCharge=0;
       $totaldeliveryCharg=0;
       $carttable='';
       $itemTable='';
       $paidshippingcount=0;
       $outofstock='0';
       $outofstockProds=array();
       

       if($request->session()->get('cart')){
        
              

            foreach($request->session()->get('cart') as $item){
                $prodDetails=DB::table('products')
                            ->leftJoin('product_images','product_images.product_id','=','products.product_id')
                            ->leftJoin('stocks','stocks.product_id','=','products.product_id')
                            ->select('*')->where('products.product_id',$item['product_id'])
                            ->where('product_images.is_primary','1')
                            ->first();

                    $non_deliverableText='';
                    $outofstockText='';
                    if($request->session()->get('pincode')){

                        if(Nondeliverablepincode::where(['product_id'=>$item['product_id'],'pincode'=>$request->session()->get('pincode')])->first()){
                            $non_deliverableText='<span class="rong-icn">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            </span>Product can not be delivered to your pincode';
                        }
                    }
               
                    if(!empty($prodDetails))
                    {
                        if($prodDetails->qty < 1.00){
                            $outofstock='1';
                            $outofstockProds[]=$prodDetails->product_id;
                            $outofstockText='<span class="rong-icn">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            </span>Product Out of Stock';
                        }
                            $subtotal = $prodDetails->discount_price*$item['qty'];
                            $itemtotal=$itemtotal+$subtotal;
                         
                            
                            $itemTable.=' <div class="lt-block" >
                                
                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                  <div class="img-sec">
                                  <a href="'.url('product-detail/'.$prodDetails->product_url).'"><img src="'.asset($prodDetails->image_name).'" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <div class="rt-sec">
                                  <a href="'.url('product-detail/'.$prodDetails->product_url).'">
                                        <h2>'.$prodDetails->product_name.'</h2>
                                  </a>
                                   <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                  <div class="rng">
                                  <a href="javascript:void(0);" class="min button" id="decreaseQty" onclick="addlessQty(\''.$prodDetails->product_url.'\')">
                                  -
                                  </a>

                                <input type="text" readonly name="cartqty['.$prodDetails->product_url.']" 
                                id="cartqty['.$prodDetails->product_url.']" 
                                maxlength="12" value="'.$item['qty'].'" class="qty" onblur="changeCartQty(\''.$prodDetails->product_url.'\',this.value)" >
                                
                                    <a href="javascript:void(0);" class="plus button" id="increaseQty" onclick="addMoreQty(\''.$prodDetails->product_url.'\')">
                                    +
                                    </a>
                                    
                                    </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6 ammount">
                                    <h3>₹ '.number_format($subtotal,2).'</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nwamm">
                                    <div class="btncrt">
                                      <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                          <a href="javascript:void(0)" class="buybtn" onclick="addToWishlist(\''.$prodDetails->product_url.'\')">Short List</a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                          <a href="javascript:void(0)" onclick="removecartitem(\''.$prodDetails->product_url.'\')" class="buybtn">Remove</a>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                    </div> 
                                  </div>
                                </div>
                                <div id="productDiv_'.$prodDetails->product_id.'">'.$non_deliverableText.' '.$outofstockText.'</div>
                              </div>
                            </div>';


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
            
            $carttable='<table class="tbl" id="carttable">
            <tr>
              <th colspan="2" class="dtdwn">Price details</th>
            </tr>
            <tr>
              <td><h4 class="cartCount">Price ('.count($request->session()->get('cart')).' Item)</h4></td>
              <td class="finalAmt">₹.'.number_format($itemtotal).'</td>
            </tr>
            <tr>
              <td>Delivery Charges</td>
            <td class="finalAmt">'.$deliveryCharge.'</td>
            </tr>
            <tr class="dtup">
              <td>Amount Payable</td>
              <td class="finalAmt">₹'.number_format($total).'</td>
            </tr>
          </table>';

        }
        else{
            $itemTable=' <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <h2 id="cartCount" class="cartCount text-red blink-soft">There is nothing in your Cart. Lets add some Items.<h2>
                  <div class="btm">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 center-col">
                          <a href="'. url('') .'" class="buybtn-to-continue">Continue Shopping</a>
                      </div>
                    </div>
              </div>
            </div>
          </div>';
        }
       

        $isDeliverable='1';
        $isBlacklistPin='1';
        $blacklistPins=array();
        $delivery_period='';
        $available_cod='no';
        $returndata=array();

        if($request->session()->get('pincode')){
        $isexitspincode = \DB::select(\DB::raw(' SELECT spc.pincode,s.delivery_period,spc.available_cod FROM shippingzones
        as s LEFT join shippingpincodes as spc on spc.zone_id=s.zone_id 
        WHERE spc.pincode='.$request->session()->get('pincode')));

            if($isexitspincode){
                $isDeliverable='1';
                $delivery_period=$isexitspincode[0]->delivery_period;
                $available_cod=$isexitspincode[0]->available_cod;

                $product_ids="";
                if($request->session()->get('cart')){
                foreach($request->session()->get('cart') as $item){
                    $product_ids.="'".$item['product_id']."',";
                  }
                  $product_ids= rtrim($product_ids,',');
                    if($product_ids){
                        $is_blacklistpins = \DB::select(\DB::raw(' SELECT non_del_pin_id,product_id FROM nondeliverablepincodes
                        WHERE product_id IN ('.$product_ids.') AND pincode='.$request->session()->get('pincode')));
                            if($is_blacklistpins){
                                $isDeliverable='0';
                                $isBlacklistPin='0';
                                foreach($is_blacklistpins as $pinItem){
                                    $blacklistPins[]=$pinItem->product_id;
                                }
                                
                            }
                    }
                }
                 
            }
            else{
                $isDeliverable='0';

            }
        }

       
       
        $returndata['carttable']=$carttable;
        $returndata['itemTable']=$itemTable;
        $returndata['isDeliverable']=$isDeliverable;
        $returndata['isBlacklistPin']=$isBlacklistPin;
        $returndata['blacklistPins']=$blacklistPins;
        $returndata['delivery_period']=$delivery_period;
        $returndata['available_cod']=$available_cod;
        $returndata['itemtotal']=$itemtotal;
        $returndata['total']=$total;
        $returndata['deliveryCharge']=$deliveryCharge;
        $returndata['outofstock']=$outofstock;
        $returndata['outofstockProds']=$outofstockProds;
        
        
        return $returndata;
   
    }

    public function showCart(Request $request){
        $data=$this->cartItems($request);
        return view('front.cart',[
        'carttable'=>$data['carttable'],
        'itemTable'=>$data['itemTable'],
        'isDeliverable'=>$data['isDeliverable'],
        'isBlacklistPin'=>$data['isBlacklistPin'],
        'blacklistPins'=>$data['blacklistPins'],
        'outofstock'=>$data['outofstock'],
        'outofstockProds'=>$data['outofstockProds'],
        ]);
    }


    public function checkPincode(Request $request){
        $this->_validatePincode($request);
        $pincode=$request->input('inputPin');
        $request->session()->put('pincode',$pincode);

        $count=0;
        if($request->session()->get('cart')){
            $count=count($request->session()->get('cart'));
        }
        $data=$this->cartItems($request);



         return response()->json(array(
             'status'=>true,'count'=>$count,
             'carttable'=>$data['carttable'],
             'itemTable'=>$data['itemTable'],
             'isDeliverable'=>$data['isDeliverable'],
             'isBlacklistPin'=>$data['isBlacklistPin'],
             'blacklistPins'=>$data['blacklistPins'],
             'delivery_period'=>$data['delivery_period'],
             'available_cod'=>$data['available_cod'],
            
            ));
    }

    private function _validatePincode(Request $request){
        $data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
       
        if($request->input('inputPin')== ''){
            $data['inputerror'][] = 'inputPin';
            $data['error_string'][] = 'Pincode is required';
            $data['status'] = FALSE;
           
        }

		if($data['status'] === FALSE)
		{
            echo json_encode($data);
            exit();
			
		}
    }

    public function getMembershipPage(Request $request){
        $membership=Membership::where('status','active')->get();
        $totaldata=array();
        foreach($membership as $item){
            $tempdata['membership_name']=$item->membership_name;
            $tempdata['description']=$item->description;
            $tempdata['membership_id']=$item->membership_id;
            $tempdata['membership_cat_code']=$item->membership_cat_code ;
            $membership_detail=MembershipDetail::where('membership_id',$item->membership_id)
                                                        ->where('status','active')
                                                        ->get();
            $tempdata['detail']=$membership_detail;
           
            $totaldata[]=$tempdata;
        }
        //   print_r($totaldata);die;
        return view('front.membership',['membership'=>$totaldata]);
     }


     public function placeOrder(Request $request){
        if(!Auth::check()){
             $request->session()->put('redirectTo','cart-items');
             return response()->json(['status'=>false,'goTo'=>'login']);
        }
        else{
             return response()->json(['status'=>true]);
        }
     }

     public function checkLoginMembership(Request $request){
        if(!Auth::check()){
             $request->session()->put('redirectTo','join-membership/'.$request->input('membership_cat_code'));
             return response()->json(['status'=>false,'goTo'=>'login']);
        }
        else{
             return response()->json(['status'=>true]);
        }
     }

     public function buyNow(Request $request){
        $this->addToCart($request);
         if(!Auth::check()){
            $request->session()->put('redirectTo','checkout');
            return response()->json(['status'=>false,'goTo'=>'login']);
         }
        else{
                return response()->json(['status'=>true]);
        }
     }
   


     public function availablePincodeCheck(Request $request){
        $isDeliverable='1';
        $isBlacklistPin='1';
        $delivery_period='';
        $available_cod='no';
        $deliveryCharge='FREE';
        $returndata=array();
        $this->_validatePincode($request);
        $pincode=$request->input('inputPin');
        $request->session()->put('pincode',$pincode);

        if($request->session()->get('pincode')){
        $isexitspincode = \DB::select(\DB::raw(' SELECT spc.pincode,s.delivery_period,spc.available_cod FROM shippingzones
        as s LEFT join shippingpincodes as spc on spc.zone_id=s.zone_id 
        WHERE spc.pincode='.$request->session()->get('pincode')));

            if($isexitspincode){
                $deliverChrg = \DB::select(\DB::raw(' SELECT sp.shipping_price FROM shippingzones
                as s LEFT join shippingpincodes as spc on spc.zone_id=s.zone_id 
                left join shippingprices as sp on sp.zone_id=s.zone_id 
                WHERE spc.pincode='.$request->session()->get('pincode').' and sp.min_price<='.$request->inputProductPrice.' and sp.max_price>='.$request->inputProductPrice));

                $isDeliverable='1';
                $deliveryCharge=($deliverChrg)?number_format($deliverChrg[0]->shipping_price):$deliveryCharge;

                $delivery_period=$isexitspincode[0]->delivery_period;
                $available_cod=$isexitspincode[0]->available_cod;
                        $is_blacklistpins = \DB::select(\DB::raw(' SELECT non_del_pin_id,product_id FROM nondeliverablepincodes
                        WHERE product_id='.$request->inputProduct.' AND pincode='.$request->session()->get('pincode')));
                            if($is_blacklistpins){
                                $isDeliverable='0';
                                $isBlacklistPin='0';
                            }
            }
            else{
                $isDeliverable='0';

            }
        }


         return response()->json(array(
             'status'=>true,
             'isDeliverable'=>$isDeliverable,
             'isBlacklistPin'=>$isBlacklistPin,
             'delivery_period'=>$delivery_period,
             'available_cod'=>$available_cod,
             'deliveryCharge'=>$deliveryCharge
            
            ));
    }
    

   

}

   
