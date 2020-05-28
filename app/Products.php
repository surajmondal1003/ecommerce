<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Products extends Model
{
     use Notifiable;
     protected $primaryKey = 'product_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'product_name', 'product_url','description','sku','regular_price','discount_price',
         'taxable','is_active','product_code','is_supreme'
     ];
}
