<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Stock extends Model
{
    //
    //
    use Notifiable;
    protected $primaryKey = 'stock_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','qty'
    ];

}
