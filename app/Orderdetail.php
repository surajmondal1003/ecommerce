<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Orderdetail extends Model
{
     //
     use Notifiable;
     protected $primaryKey = 'orderdetail_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'order_id', 'product_id','price','qty','subtotal'
     ];
}
