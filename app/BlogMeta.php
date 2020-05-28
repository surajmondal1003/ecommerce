<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BlogMeta extends Model
{
   
     use Notifiable;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'blog_id', 'ip_address'
         
     ];
}
