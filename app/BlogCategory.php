<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BlogCategory extends Model
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
         'category_name', 'category_url','parent_id','is_active','ip_address',
     ];
}
