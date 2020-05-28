<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class MembershipDetail extends Model
{
    use Notifiable;
     protected $primaryKey = 'membership_detail_id';
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
      protected $fillable = [
        'membership_id','membership_plan', 'membership_price','membership_plan_code','status'
    ];
}
