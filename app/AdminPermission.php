<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class AdminPermission extends Model
{
    use Notifiable;
    protected $primaryKey = 'permission_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id', 'permission_url'
    ];
}
