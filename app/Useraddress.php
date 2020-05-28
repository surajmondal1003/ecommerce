<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Useraddress extends Model
{
    //
    //
    //
     //
     use Notifiable;
     protected $primaryKey = 'user_address_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id', 'address','landmark','city','pincode','country','is_default','phone_no'
     ];
}
