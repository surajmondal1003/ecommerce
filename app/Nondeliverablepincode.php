<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Nondeliverablepincode extends Model
{
    use Notifiable;
    protected $primaryKey = 'non_del_pin_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','pincode', 'status',
    ];
}
