<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class ProductViewCount extends Model
{
    //
    use Notifiable;
    protected $primaryKey = 'view_count_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'count'
    ];
}
