<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pages extends Model
{
    //
     //
     use Notifiable;
     protected $primaryKey = 'page_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'page_name', 'page_url','parent_id','location','position','is_active','ip_address',
     ];
}
