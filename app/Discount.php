<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Discount extends Model
{
    //
    //
     //
     //
     use Notifiable;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'discount_percent', 'discount_plan'
     ];
}
