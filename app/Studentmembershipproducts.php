<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Studentmembershipproducts extends Model
{
    use Notifiable;
    protected $primaryKey = 'membership_product_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id','product_id','status','is_orderable',
    ];
}
