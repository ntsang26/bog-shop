<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    //
    public function dashboard() {
        $user = User::all();
        return view('admin.dashboard', compact('user'));
    }
}
