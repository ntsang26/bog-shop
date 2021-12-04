<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    //
    protected $table = 'shops';

    public function user() {
        return $this->belongsTo('App\Models\User', 'account_id', 'id');
    }

    public function order() {
        return $this->hasMany('App\Models\Orders', 'shop_id', 'id');
    }
    
}
