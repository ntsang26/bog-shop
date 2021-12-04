<?php

namespace App\Http\DAL;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class DAL_User
{
    public function getDetailUser($userName = ''){
        return User::where('user_name',$userName)
            ->orWhere('phone',$userName)
            ->first();
    }
}