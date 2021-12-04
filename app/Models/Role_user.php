<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    //
    protected $table = 'role_users';

    public function user(){
        return $this->hasMany('App\Models\User','role', 'role_id');
    }
}
