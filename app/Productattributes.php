<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Productattributes extends Model
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
         'product_id', 'attr_id','attr_value'
     ];
}
