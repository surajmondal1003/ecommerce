<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Membership extends Model
{
     //
     use Notifiable;
     protected $primaryKey = 'membership_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'session','membership_name', 'membership_cat_code','status','description','wallet_value'
     ];
}
