<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if 
            ($user->role == \App\Http\DAL\DAL_Config::ROLE_USER_SP_ADMIN
                || $user->role == \App\Http\DAL\DAL_Config::ROLE_USER_ADMIN
                || $user->role == \App\Http\DAL\DAL_Config::ROLE_USER_MOD
            ) return $next($request);
            else return redirect()->guest(route('admin.login'))
            ->with(['error_message'=>'Bạn không có quyền truy cập vào trang này']);
        } else return redirect()->guest(route('admin.login'));
    }
}
