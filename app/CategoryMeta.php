<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class CategoryMeta extends Model
{
     //
     use Notifiable;
     protected $primaryKey = 'category_meta_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'category_id','meta_description','title','meta_keyword','meta_robot','meta_revisit_after','canonical_link',
         'og_locale','og_type','og_image','og_title','og_description','og_url','og_site_name','extraheadcode','msvalidate',
         'p_domain_verify','alexaverifyid','dc_title','geo_region','geo_placename','geo_position','icbm',
         'place_location_latitude','place_location_longitude','business_contact_street_address','business_contact_locality',
         'business_contact_postal_code','business_contact_country_name','business_contact_email','business_contact_phone_number',
         'business_contact_website','twitter_card','twitter_description','twitter_title','twitter_site',
         'twitter_image','twitter_creator','ip_address'
     ];
}
