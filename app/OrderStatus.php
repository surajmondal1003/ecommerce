<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class OrderStatus extends Model
{
    
     //
     use Notifiable;
     protected $primaryKey = 'order_status_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'order_id', 'status'
     ];
}
