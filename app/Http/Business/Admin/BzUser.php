<?php

namespace  App\Http\Business\Admin;

class BzUser extends BzAdmin
{
    public function postLogin($request){
        $user = $this->dal_user->getDetailUser($request->user_name);
        if(isset($user)) {
            return true;
        }
        return false;
    }
}