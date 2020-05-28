<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Membershipcategories extends Model
{
     //
     use Notifiable;
     protected $primaryKey = 'membership_cat_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'membership_detail_id','category_id','status', 
     ];
}
