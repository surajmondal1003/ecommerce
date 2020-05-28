<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Studentmemberships extends Model
{
  
    use Notifiable;
    protected $primaryKey = 'student_member_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','address_id','membership_plan_id','student_name','student_email','student_mobile',
        'student_unique_no','referral_id','is_expired','date_joined','date_expired','college','dept'
    ];
}
