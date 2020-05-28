<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Order extends Model
{
     //
     use Notifiable;
     protected $primaryKey = 'order_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id','address_id','order_no', 'invoice_no','itemtotal','delivery_charge',
         'net_total','coupon_amount','status','type','paymentmode','payment_id'
     ];
}
