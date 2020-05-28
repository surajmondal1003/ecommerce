<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Wishlist extends Model
{
     //
    //
    //
     //
     use Notifiable;
     protected $primaryKey = 'wishlist_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id', 'product_id'
     ];
}
