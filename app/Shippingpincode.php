<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shippingpincode extends Model
{
    use Notifiable;
    protected $primaryKey = 'zone_pincode_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone_id','pincode','available_cod'
    ];
}
