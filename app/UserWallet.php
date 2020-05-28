<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class UserWallet extends Model
{
    use Notifiable;
     protected $primaryKey = 'user_wallet_id';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id', 'wallet_value'
     ];
}
