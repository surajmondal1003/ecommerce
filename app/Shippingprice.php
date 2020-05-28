<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Shippingprice extends Model
{
    use Notifiable;
    protected $primaryKey = 'shippingprice_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone_id','shipping_price','min_price','max_price','shipping_name'
    ];

}
