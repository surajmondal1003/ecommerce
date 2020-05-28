<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class FreeShippingPincode extends Model
{
    use Notifiable;
     protected $primaryKey = 'free_shipping_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'product_id','pincode', 'status',
     ];
}
