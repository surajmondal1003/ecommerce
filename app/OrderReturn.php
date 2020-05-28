<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class OrderReturn extends Model
{
    use Notifiable;
    protected $primaryKey = 'order_return_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'return_reason','reason_status'
    ];
}
