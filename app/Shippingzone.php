<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shippingzone extends Model
{
    //
    use Notifiable;
    protected $primaryKey = 'zone_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone_name','delivery_period'
    ];


}
