<?php
function display_menu($parent,$position) {
    static $i=0;
    $activeClass="";
    if( $i==0){
        $cls='nav-menu';
    }
    else{
        $cls='';
    }
    $i++;
    $result = \DB::select(\DB::raw('SELECT m.page_id, m.page_name, m.page_url,m.parent_id, D.Count FROM `pages` m LEFT OUTER JOIN (SELECT `parent_id`, COUNT(*) AS Count FROM `pages` GROUP BY `parent_id`) D
    ON m.page_id = D.parent_id  WHERE m.is_active="active" and m.parent_id=' . $parent. ' and (location="header" or location="both") order by m.position ASC'));
   if($result){
     echo '<ul class="'.$cls.'">';

   foreach($result as $row){

       if ($row->Count > 0) {

             echo "<li class='menu-has-children'><a href='javascript:(void(0))'>" . $row->page_name . "</a>";
             display_menu($row->page_id,$position);
             echo "</li>";
          

       } elseif ($row->Count==0) {
           if($row->page_url=='home'){
               
           echo "<li><a href='{{ url('/')}}'>" . $row->page_name. "</a></li>";
           }
           else{
            echo "<li><a href='". url($row->page_url) . "'><i class='seoicon-button'></i>" . $row->page_name . "</a></li>";
          
            }
       } else;
   }
   
   echo '</ul>';
   }
   else
       echo '';
    //return $result;
}
function displayBlogs(){
    $result = \DB::select(\DB::raw('select id,blog_title,blog_content,blog_url,blog_small_image,blog_image_alt,created_at from blog_posts where is_active="active"'));
    if($result){
        foreach($result as $row){
            echo ' <div class="col-md-6">
            <div class="vlog-itm">
              <div class="blog-thumb">
                  <a href="#"><img  src="../..'.$row->blog_small_image.'" alt="" class="img-responsive"/></a>
                </div>
                <div class="blog-text">
                  <h2>
                    <a href="#">'.$row->blog_title.'</a>
                  </h2>
                  <p>'.substr($row->blog_content,0,200) .'</p>
                  <a href="'.url('/blog/'.$row->blog_url).'" class="blog-ankr"><span>Read More</span></a>
                </div>

                <div class="blog-date pull-left">'.date('d M, Y',strtotime($row->created_at)).'</div>
                <div class="blog-social pull-right">
                <!--  <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    
                    <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> -->

             
                </div>
            </div>
        </div>';
        }
    }
}

function displayFeaturedBlogs(){
    $result = \DB::select(\DB::raw('select id,blog_title,blog_content,blog_url,blog_small_image,blog_image_alt,created_at from blog_posts where is_active="active" and is_featured="1" limit 0,6'));
    if($result){
        foreach($result as $row){
            echo ' <div class="item">
            <div class="box">
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="img-box">
                      <a href="#"> <img src="'.asset($row->blog_small_image).'" alt=""></a>
                  </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="text">
                      <h4>'.date('d M, Y',strtotime($row->created_at)).'</h4>
                      <h2><a href="#"> '.$row->blog_title .'</a></h2>
                      <p>'.substr($row->blog_content,0,200).'</p>
                      <a href="'.url('/blog/'.$row->blog_url).'">Read More</a>
                  </div>
              </div>
          </div>
          </div>
      </div>';
        }
    }
}
function displayRecentBlogs(){
    $result = \DB::select(\DB::raw('select id,blog_title,blog_content,blog_url,blog_small_image,blog_image_alt,created_at from blog_posts where is_active="active" order by created_at desc limit 0,6'));
    if($result){
        foreach($result as $row){
            echo '  <div class="blog-more-itm">
            <a href="#" ><img src="'.asset($row->blog_small_image).'" alt="" class="img-responsive" /></a>
            <div class="name-sec-blog">
            <h3>
              <a href="'.url('/blog/'.$row->blog_url).'" >'.substr($row->blog_content,0,50).' ...</a>
            </h3>
            
            </div>
          </div>';
        }
    }
}


function display_category($parent,$position) {
    static $i=0;
    
    $i++;
    $result = \DB::select(\DB::raw('SELECT c.category_id, c.category_name,c.category_parent, D.Count FROM `categories` c LEFT OUTER JOIN (SELECT `category_parent`, COUNT(*) AS Count FROM `categories` GROUP BY `category_parent`) D
    ON c.category_parent = D.category_parent  WHERE c.is_active="active" and c.category_parent='.$parent.''));
   if($result){
     echo '<ul>';

   foreach($result as $row){

       if ($row->Count > 0) {

             echo "<li class='menu-has-children'>" . $row->category_name."<input type='checkbox' value='".$row->category_id."' name='inputCategory[".$row->category_id."]' class='categorycheck'>" ;
             display_category($row->category_id,$position);
             echo "</li>";
          

       } elseif ($row->Count==0) {
           
            echo "<li>". $row->category_name."<input type='checkbox' value='".$row->category_id."' name='inputCategory[".$row->category_id."]' class='categorycheck'></li>";
          
            
       } else;
   }
   
   echo '</ul>';
   }
   else
       echo '';
    //return $result;
}


function display_categoryForEdit($parent,$position,$cat_ids) {
    static $i=0;
    
    $i++;
    $result = \DB::select(\DB::raw('SELECT c.category_id, c.category_name,c.category_parent, D.Count FROM `categories` c LEFT OUTER JOIN (SELECT `category_parent`, COUNT(*) AS Count FROM `categories` GROUP BY `category_parent`) D
    ON c.category_parent = D.category_parent  WHERE c.is_active="active" and c.category_parent='.$parent.''));
   if($result){
     echo '<ul>';

   foreach($result as $row){

       if ($row->Count > 0) {
            if(in_array($row->category_id,$cat_ids)){
             echo "<li class='menu-has-children'>" . $row->category_name."<input type='checkbox' checked value='".$row->category_id."' name='inputCategory[".$row->category_id."]' class='categorycheck'>
             " ;
             display_categoryForEdit($row->category_id,$position,$cat_ids);
             echo "</li>";
            }
            else{
                echo "<li class='menu-has-children'>" . $row->category_name."<input type='checkbox'  value='".$row->category_id."' name='inputCategory[".$row->category_id."]' class='categorycheck'>" ;
                display_categoryForEdit($row->category_id,$position,$cat_ids);
                echo "</li>";
            }
          

       } elseif ($row->Count==0) {
        if(in_array($row->category_id,$cat_ids)){
            echo "<li>". $row->category_name."<input type='checkbox' checked value='".$row->category_id."' name='inputCategory[".$row->category_id."]' class='categorycheck'></li>
            ";
        }
        else{
            echo "<li>". $row->category_name."<input type='checkbox'  value='".$row->category_id."' name='inputCategory[".$row->category_id."]' class='categorycheck'></li>";
        }
            
       } else;
   }
   
   echo '</ul>';
   }
   else
       echo '';
    //return $result;
}





function display_category_menu($parent) {
    static $i=0;
    $activeClass="";
    if( $i==0){
        $cls='';
    }
    else{
        $cls='';
    }
    $i++;
    $result = \DB::select(\DB::raw('SELECT c.category_id, c.category_name, c.category_url,c.category_parent, D.Count FROM `categories` c LEFT OUTER JOIN (SELECT `category_parent`, COUNT(*) AS Count FROM `categories` GROUP BY `category_parent`) D
    ON c.category_id = D.category_parent  WHERE c.is_active="active" and c.category_parent=' . $parent. '  order by c.category_name ASC'));
   if($result){
     

   foreach($result as $row){

       if ($row->Count > 0) {
        
             echo "<li class='menu-has-children'><a href='javascript:(void(0))'>" . $row->category_name . "</a>";
             echo '<ul>';
             display_category_menu($row->category_id);
             echo "</li></ul>";
          

       } elseif ($row->Count==0) {
           if($row->category_url=='home'){
               
           echo "<li><a href='{{ url('/')}}'>" . $row->page_name. "</a></li>";
           }
           else{
            echo "<li><a href='". url($row->category_url) . "'>" . $row->category_name . "</a></li>";
          
            }
       } else;
   }
   
  // echo '</ul>';
   }
   else
       echo '';
    //return $result;
}

function display_sidebar() {

    $result = \DB::select(\DB::raw('SELECT c.category_id, c.category_name, c.category_url FROM `categories` as c order by c.category_name ASC'));
    foreach($result as $row){
    echo ' <a href='. url($row->category_url) . '>'.$row->category_name.'</a>';
    }
}


function displayLatestArrivals(){
    $result = \DB::select(\DB::raw('SELECT * FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
    where pi.is_primary="1" ORDER by p.product_id DESC limit 14'));
    if($result){
        foreach($result as $row){
            // $image = \DB::select(\DB::raw('SELECT image_name FROM `product_images` WHERE product_id='.$row->product_id.' AND is_primary="1"'));
            echo ' <div class="item">
            <div class="box hvr-float-shadow">
                <div class="img-sec">
                    <div class="im">
                    <a href="'.url('latest-arrival/'.$row->product_url).'"><img src="'. asset($row->image_name).'"></a>
                    </div>
                </div>
                <div class="txt">
                    <a href="'.url('latest-arrival/'.$row->product_url).'"><h2>'.str_limit($row->product_name,15).'</h2></a>
                    <div class="ret">
                        <h3 class="lft-price">
                            <strike>Rs '.number_format($row->regular_price).'</strike>
                        </h3>
                        <h3 class="rgt-price">Rs '.number_format($row->discount_price).'</h3>
                        <div class="clearfix"></div>
                    </div>
                
                </div>
            </div>
        </div>';
            }
    }
   
}




function displaySimilarProducts($caturl){
    // $result = \DB::select(\DB::raw('SELECT * FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
    // left join productcategory_relations as pc on pc.product_id=p.product_id
    // left join categories as c on c.category_id=pc.category_id
    // where pi.is_primary="1" AND pc.category_id IN ('.$category_ids.') GROUP by p.product_id DESC limit 6'));
    
    $result = \DB::select(\DB::raw('SELECT * FROM `products` as p left join product_images as pi on pi.product_id=p.product_id
    left join productcategory_relations as pc on pc.product_id=p.product_id
    left join categories as c on c.category_id=pc.category_id
    where pi.is_primary="1" AND c.category_url="'.$caturl.'" GROUP by p.product_id DESC limit 6'));

    if($result){
        foreach($result as $row){
            // $image = \DB::select(\DB::raw('SELECT image_name FROM `product_images` WHERE product_id='.$row->product_id.' AND is_primary="1"'));
            echo '<div class="col-md-2 col-sm-3 col-xs-6">
        <div class="box">
            <div class="img-sec">
              <div class="im">
              <a href="'.url($row->category_url.'/'.$row->product_url).'">
              <img src="'. asset($row->image_name).'"></a>
              </div>
            </div>
            <div class="txt">
            <a href="'.url($row->category_url.'/'.$row->product_url).'"><h2>'.str_limit($row->product_name,18).'</h2></a>
              <div class="ret">
                <h3 class="lft-price"><strike>Rs '.number_format($row->regular_price).'</strike></h3>
                <h3 class="rgt-price"><strong>Rs '.number_format($row->discount_price).'</strong></h3>
                <div class="clearfix"></div>
              </div>
            </div>
            </div>
        </div>';
            }
    }


    
}


function getpageMetaDetails($pageId=false) {
    $metaString = "";
     if($pageId){
             $metaVal =   \DB::select(\DB::raw("select * from page_metas where page_id=$pageId"));

                if($metaVal[0]->page_title)
                     $metaString = $metaString."<title>".$metaVal[0]->page_title."</title>".PHP_EOL;

                if( $metaVal[0]->meta_description)
                    $metaString = $metaString.'<meta name="description" content="'.$metaVal[0]->meta_description.'" />'.PHP_EOL;

                if( $metaVal[0]->meta_keyword)
                    $metaString = $metaString.'<meta name="keywords" content="'.$metaVal[0]->meta_keyword.'" />'.PHP_EOL;
                if( $metaVal[0]->meta_robot)
                    $metaString = $metaString.'<meta name="robots" content="'.$metaVal[0]->meta_robot.'" />'.PHP_EOL;
                if( $metaVal[0]->meta_revisit_after)
                    $metaString = $metaString.'<meta name="revisit-after" content="'.$metaVal[0]->meta_revisit_after.'" />'.PHP_EOL;
                if( $metaVal[0]->canonical_link)
                    $metaString = $metaString.'<link rel="canonical" href="'.$metaVal[0]->canonical_link.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_locale)
                    $metaString = $metaString.'<meta property="og:locale" content="'.$metaVal[0]->og_locale.'" />'.PHP_EOL;
                if( $metaVal[0]->og_type)
                    $metaString = $metaString.'<meta property="og:type" content="'.$metaVal[0]->og_type.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_image)
                    $metaString = $metaString.'<meta property="og:image" content="'.$metaVal[0]->og_image.'" />'.PHP_EOL;
                if( $metaVal[0]->og_title)
                    $metaString = $metaString.'<meta property="og:title" content="'.$metaVal[0]->og_title.'"  />'.PHP_EOL;
                if( $metaVal[0]->og_description)
                    $metaString = $metaString.'<meta property="og:description" content="'.$metaVal[0]->og_description.'" />'.PHP_EOL;
                if($metaVal[0]->og_url)
                    $metaString = $metaString.'<meta property="og:url" content="'.$metaVal[0]->og_url.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_site_name)
                    $metaString = $metaString.'<meta property="og:site_name" content="'.$metaVal[0]->og_site_name.'" />'.PHP_EOL;

                if( $metaVal[0]->msvalidate)
                    $metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal[0]->msvalidate.'" />'.PHP_EOL;

                if( $metaVal[0]->p_domain_verify)
                    $metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal[0]->p_domain_verify.'"/>'.PHP_EOL;

                if( $metaVal[0]->icbm)
                    $metaString = $metaString.'<meta name="ICBM" content="'.$metaVal[0]->icbm.'" />'.PHP_EOL;

                if( $metaVal[0]->alexaverifyid)
                    $metaString = $metaString.'<meta name="alexaVerifyID" content="'.$metaVal[0]->alexaverifyid.'"/>'.PHP_EOL;

                if( $metaVal[0]->dc_title)
                    $metaString = $metaString.'<meta name="DC.title" content="'.$metaVal[0]->dc_title.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_region)
                    $metaString = $metaString.'<meta name="geo.region" content="'.$metaVal[0]->geo_region.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_placename)
                    $metaString = $metaString.'<meta name="geo.placename" content="'.$metaVal[0]->geo_placename.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_position)
                    $metaString =$metaString. '<meta name="geo.position" content="'.$metaVal[0]->geo_position.'" />'.PHP_EOL;

                if( $metaVal[0]->place_location_latitude)
                    $metaString =$metaString. '<meta property="place:location:latitude" content="'.$metaVal[0]->place_location_latitude.'" />'.PHP_EOL;

                if( $metaVal[0]->place_location_longitude)
                    $metaString =$metaString. '<meta property="place:location:longitude" content="'.$metaVal[0]->place_location_longitude.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_street_address)
                    $metaString =$metaString. '<meta property="business:contact_data:street_address" content="'.$metaVal[0]->business_contact_street_address.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_locality)
                    $metaString =$metaString. '<meta property="business:contact_data:locality" content="'.$metaVal[0]->business_contact_locality.'" />'.PHP_EOL ;

                if( $metaVal[0]->business_contact_postal_code)
                    $metaString =$metaString. '<meta property="business:contact_data:postal_code" content="'.$metaVal[0]->business_contact_postal_code.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_country_name)
                    $metaString =$metaString. '<meta property="business:contact_data:country_name" content="'.$metaVal[0]->business_contact_country_name.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_email)
                    $metaString =$metaString. '<meta property="business:contact_data:email" content="'.$metaVal[0]->business_contact_email.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_phone_number)
                    $metaString =$metaString. '<meta property="business:contact_data:phone_number" content="'.$metaVal[0]->business_contact_phone_number.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_website)
                    $metaString =$metaString. '<meta property="business:contact_data:website" content="'.$metaVal[0]->business_contact_website.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_card)
                    $metaString =$metaString. '<meta name="twitter:card" content="'.$metaVal[0]->twitter_card.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_description)
                    $metaString =$metaString. '<meta name="twitter:description" content="'.$metaVal[0]->twitter_description.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_title)
                    $metaString =$metaString. '<meta name="twitter:title" content="'.$metaVal[0]->twitter_title.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_site)
                    $metaString =$metaString. '<meta name="twitter:site" content="'.$metaVal[0]->twitter_site.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_image)
                    $metaString =$metaString. '<meta name="twitter:image" content="'.$metaVal[0]->twitter_image.'" />'.PHP_EOL;

                if($metaVal[0]->twitter_creator)
                    $metaString =$metaString. '<meta name="twitter:creator" content="'.$metaVal[0]->twitter_creator.'" />'.PHP_EOL;
                 if( $metaVal[0]->extraheadcode)
                    $metaString = $metaString.$metaVal[0]->extraheadcode;
             return stripslashes($metaString);
     }else{
         return $metaString;
     }

}

function getProductMetaDetails($pageId=false) {
    $metaString = "";
     if($pageId){
             $metaVal =   \DB::select(\DB::raw("select * from product_metas where product_id=$pageId"));

                if($metaVal[0]->title)
                     $metaString = $metaString."<title>".$metaVal[0]->title."</title>".PHP_EOL;

                if( $metaVal[0]->meta_description)
                    $metaString = $metaString.'<meta name="description" content="'.$metaVal[0]->meta_description.'" />'.PHP_EOL;

                if( $metaVal[0]->meta_keyword)
                    $metaString = $metaString.'<meta name="keywords" content="'.$metaVal[0]->meta_keyword.'" />'.PHP_EOL;
                if( $metaVal[0]->meta_robot)
                    $metaString = $metaString.'<meta name="robots" content="'.$metaVal[0]->meta_robot.'" />'.PHP_EOL;
                if( $metaVal[0]->meta_revisit_after)
                    $metaString = $metaString.'<meta name="revisit-after" content="'.$metaVal[0]->meta_revisit_after.'" />'.PHP_EOL;
                if( $metaVal[0]->canonical_link)
                    $metaString = $metaString.'<link rel="canonical" href="'.$metaVal[0]->canonical_link.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_locale)
                    $metaString = $metaString.'<meta property="og:locale" content="'.$metaVal[0]->og_locale.'" />'.PHP_EOL;
                if( $metaVal[0]->og_type)
                    $metaString = $metaString.'<meta property="og:type" content="'.$metaVal[0]->og_type.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_image)
                    $metaString = $metaString.'<meta property="og:image" content="'.$metaVal[0]->og_image.'" />'.PHP_EOL;
                if( $metaVal[0]->og_title)
                    $metaString = $metaString.'<meta property="og:title" content="'.$metaVal[0]->og_title.'"  />'.PHP_EOL;
                if( $metaVal[0]->og_description)
                    $metaString = $metaString.'<meta property="og:description" content="'.$metaVal[0]->og_description.'" />'.PHP_EOL;
                if($metaVal[0]->og_url)
                    $metaString = $metaString.'<meta property="og:url" content="'.$metaVal[0]->og_url.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_site_name)
                    $metaString = $metaString.'<meta property="og:site_name" content="'.$metaVal[0]->og_site_name.'" />'.PHP_EOL;

                if( $metaVal[0]->msvalidate)
                    $metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal[0]->msvalidate.'" />'.PHP_EOL;

                if( $metaVal[0]->p_domain_verify)
                    $metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal[0]->p_domain_verify.'"/>'.PHP_EOL;

                if( $metaVal[0]->icbm)
                    $metaString = $metaString.'<meta name="ICBM" content="'.$metaVal[0]->icbm.'" />'.PHP_EOL;

                if( $metaVal[0]->alexaverifyid)
                    $metaString = $metaString.'<meta name="alexaVerifyID" content="'.$metaVal[0]->alexaverifyid.'"/>'.PHP_EOL;

                if( $metaVal[0]->dc_title)
                    $metaString = $metaString.'<meta name="DC.title" content="'.$metaVal[0]->dc_title.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_region)
                    $metaString = $metaString.'<meta name="geo.region" content="'.$metaVal[0]->geo_region.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_placename)
                    $metaString = $metaString.'<meta name="geo.placename" content="'.$metaVal[0]->geo_placename.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_position)
                    $metaString =$metaString. '<meta name="geo.position" content="'.$metaVal[0]->geo_position.'" />'.PHP_EOL;

                if( $metaVal[0]->place_location_latitude)
                    $metaString =$metaString. '<meta property="place:location:latitude" content="'.$metaVal[0]->place_location_latitude.'" />'.PHP_EOL;

                if( $metaVal[0]->place_location_longitude)
                    $metaString =$metaString. '<meta property="place:location:longitude" content="'.$metaVal[0]->place_location_longitude.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_street_address)
                    $metaString =$metaString. '<meta property="business:contact_data:street_address" content="'.$metaVal[0]->business_contact_street_address.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_locality)
                    $metaString =$metaString. '<meta property="business:contact_data:locality" content="'.$metaVal[0]->business_contact_locality.'" />'.PHP_EOL ;

                if( $metaVal[0]->business_contact_postal_code)
                    $metaString =$metaString. '<meta property="business:contact_data:postal_code" content="'.$metaVal[0]->business_contact_postal_code.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_country_name)
                    $metaString =$metaString. '<meta property="business:contact_data:country_name" content="'.$metaVal[0]->business_contact_country_name.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_email)
                    $metaString =$metaString. '<meta property="business:contact_data:email" content="'.$metaVal[0]->business_contact_email.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_phone_number)
                    $metaString =$metaString. '<meta property="business:contact_data:phone_number" content="'.$metaVal[0]->business_contact_phone_number.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_website)
                    $metaString =$metaString. '<meta property="business:contact_data:website" content="'.$metaVal[0]->business_contact_website.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_card)
                    $metaString =$metaString. '<meta name="twitter:card" content="'.$metaVal[0]->twitter_card.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_description)
                    $metaString =$metaString. '<meta name="twitter:description" content="'.$metaVal[0]->twitter_description.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_title)
                    $metaString =$metaString. '<meta name="twitter:title" content="'.$metaVal[0]->twitter_title.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_site)
                    $metaString =$metaString. '<meta name="twitter:site" content="'.$metaVal[0]->twitter_site.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_image)
                    $metaString =$metaString. '<meta name="twitter:image" content="'.$metaVal[0]->twitter_image.'" />'.PHP_EOL;

                if($metaVal[0]->twitter_creator)
                    $metaString =$metaString. '<meta name="twitter:creator" content="'.$metaVal[0]->twitter_creator.'" />'.PHP_EOL;
                 if( $metaVal[0]->extraheadcode)
                    $metaString = $metaString.$metaVal[0]->extraheadcode;
             return stripslashes($metaString);
     }else{
         return $metaString;
     }

}


function getCategoryMetaDetails($category_id=false) {
    $metaString = "";
     if($category_id){
             $metaVal =   \DB::select(\DB::raw("select * from category_metas where category_id=$category_id"));

                if($metaVal[0]->title)
                     $metaString = $metaString."<title>".$metaVal[0]->title."</title>".PHP_EOL;

                if( $metaVal[0]->meta_description)
                    $metaString = $metaString.'<meta name="description" content="'.$metaVal[0]->meta_description.'" />'.PHP_EOL;

                if( $metaVal[0]->meta_keyword)
                    $metaString = $metaString.'<meta name="keywords" content="'.$metaVal[0]->meta_keyword.'" />'.PHP_EOL;
                if( $metaVal[0]->meta_robot)
                    $metaString = $metaString.'<meta name="robots" content="'.$metaVal[0]->meta_robot.'" />'.PHP_EOL;
                if( $metaVal[0]->meta_revisit_after)
                    $metaString = $metaString.'<meta name="revisit-after" content="'.$metaVal[0]->meta_revisit_after.'" />'.PHP_EOL;
                if( $metaVal[0]->canonical_link)
                    $metaString = $metaString.'<link rel="canonical" href="'.$metaVal[0]->canonical_link.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_locale)
                    $metaString = $metaString.'<meta property="og:locale" content="'.$metaVal[0]->og_locale.'" />'.PHP_EOL;
                if( $metaVal[0]->og_type)
                    $metaString = $metaString.'<meta property="og:type" content="'.$metaVal[0]->og_type.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_image)
                    $metaString = $metaString.'<meta property="og:image" content="'.$metaVal[0]->og_image.'" />'.PHP_EOL;
                if( $metaVal[0]->og_title)
                    $metaString = $metaString.'<meta property="og:title" content="'.$metaVal[0]->og_title.'"  />'.PHP_EOL;
                if( $metaVal[0]->og_description)
                    $metaString = $metaString.'<meta property="og:description" content="'.$metaVal[0]->og_description.'" />'.PHP_EOL;
                if($metaVal[0]->og_url)
                    $metaString = $metaString.'<meta property="og:url" content="'.$metaVal[0]->og_url.'"/>'.PHP_EOL;
                if( $metaVal[0]->og_site_name)
                    $metaString = $metaString.'<meta property="og:site_name" content="'.$metaVal[0]->og_site_name.'" />'.PHP_EOL;

                if( $metaVal[0]->msvalidate)
                    $metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal[0]->msvalidate.'" />'.PHP_EOL;

                if( $metaVal[0]->p_domain_verify)
                    $metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal[0]->p_domain_verify.'"/>'.PHP_EOL;

                if( $metaVal[0]->icbm)
                    $metaString = $metaString.'<meta name="ICBM" content="'.$metaVal[0]->icbm.'" />'.PHP_EOL;

                if( $metaVal[0]->alexaverifyid)
                    $metaString = $metaString.'<meta name="alexaVerifyID" content="'.$metaVal[0]->alexaverifyid.'"/>'.PHP_EOL;

                if( $metaVal[0]->dc_title)
                    $metaString = $metaString.'<meta name="DC.title" content="'.$metaVal[0]->dc_title.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_region)
                    $metaString = $metaString.'<meta name="geo.region" content="'.$metaVal[0]->geo_region.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_placename)
                    $metaString = $metaString.'<meta name="geo.placename" content="'.$metaVal[0]->geo_placename.'" />'.PHP_EOL;

                if( $metaVal[0]->geo_position)
                    $metaString =$metaString. '<meta name="geo.position" content="'.$metaVal[0]->geo_position.'" />'.PHP_EOL;

                if( $metaVal[0]->place_location_latitude)
                    $metaString =$metaString. '<meta property="place:location:latitude" content="'.$metaVal[0]->place_location_latitude.'" />'.PHP_EOL;

                if( $metaVal[0]->place_location_longitude)
                    $metaString =$metaString. '<meta property="place:location:longitude" content="'.$metaVal[0]->place_location_longitude.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_street_address)
                    $metaString =$metaString. '<meta property="business:contact_data:street_address" content="'.$metaVal[0]->business_contact_street_address.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_locality)
                    $metaString =$metaString. '<meta property="business:contact_data:locality" content="'.$metaVal[0]->business_contact_locality.'" />'.PHP_EOL ;

                if( $metaVal[0]->business_contact_postal_code)
                    $metaString =$metaString. '<meta property="business:contact_data:postal_code" content="'.$metaVal[0]->business_contact_postal_code.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_country_name)
                    $metaString =$metaString. '<meta property="business:contact_data:country_name" content="'.$metaVal[0]->business_contact_country_name.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_email)
                    $metaString =$metaString. '<meta property="business:contact_data:email" content="'.$metaVal[0]->business_contact_email.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_phone_number)
                    $metaString =$metaString. '<meta property="business:contact_data:phone_number" content="'.$metaVal[0]->business_contact_phone_number.'" />'.PHP_EOL;

                if( $metaVal[0]->business_contact_website)
                    $metaString =$metaString. '<meta property="business:contact_data:website" content="'.$metaVal[0]->business_contact_website.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_card)
                    $metaString =$metaString. '<meta name="twitter:card" content="'.$metaVal[0]->twitter_card.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_description)
                    $metaString =$metaString. '<meta name="twitter:description" content="'.$metaVal[0]->twitter_description.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_title)
                    $metaString =$metaString. '<meta name="twitter:title" content="'.$metaVal[0]->twitter_title.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_site)
                    $metaString =$metaString. '<meta name="twitter:site" content="'.$metaVal[0]->twitter_site.'" />'.PHP_EOL;

                if( $metaVal[0]->twitter_image)
                    $metaString =$metaString. '<meta name="twitter:image" content="'.$metaVal[0]->twitter_image.'" />'.PHP_EOL;

                if($metaVal[0]->twitter_creator)
                    $metaString =$metaString. '<meta name="twitter:creator" content="'.$metaVal[0]->twitter_creator.'" />'.PHP_EOL;
                 if( $metaVal[0]->extraheadcode)
                    $metaString = $metaString.$metaVal[0]->extraheadcode;
             return stripslashes($metaString);
     }else{
         return $metaString;
     }

}








    



