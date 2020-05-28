<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BlogPost extends Model
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
         'blog_category_id', 'blog_title','blog_url','blog_content','blog_large_image','blog_small_image',
         'blog_image_alt','is_active','is_featured',
     ];
}
