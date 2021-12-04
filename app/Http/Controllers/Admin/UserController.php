<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Business\Admin\BzUser;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\DAL\DAL_Config;

use App\Models\User;

class UserController extends Controller
{

    protected $bzUser;
    public function __construct()
    {
        $this->bzUser = new BzUser();
        parent::__construct();
    }

    //
    #*** Login ***
    public function getLogin() {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $login = [
            'user_name' => $request->user_name,
            'password' => $request->password,

        ];
        if(Auth::attempt($login)){
            return redirect()->intended('/admin');
        } else{
            Auth::logout();
            return redirect()->back()->with(['error_message' => 'Username or password incorrect']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    // public function postGetLogin($request){
    //     $user = $this->getDetailUser($request->user_name);
    //     if(isset($user)) {
    //         return true;
    //     }
    //     return false;
    // }

    // public function getDetailUser($userName = ''){
    //     return User::where('user_name',$userName)
    //         ->first();
    // }

    #end

    #*** List User

    # User Register
    public function getListUserRegister() {
        $user = User::orderBy('id', 'desc')
        ->where('status', DAL_Config::USER_STATUS_PUBLIC)
        ->where('role', DAL_Config::ROLE_USER_NORMAL)
        ->get();
        return view('admin.users.list_user', compact('user'));
    }

    public function getAddUserRegister() {
        return view('admin.users.add_register');
    }

    public function postAddUserRegister(UserRequest $request) {
        $user = new User();
        $user->user_name = $request->user_name;
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->verify_code = time().uniqid(true);
        $user->role = DAL_Config::ROLE_USER_NORMAL;
        $user->remember_token = bin2hex(random_bytes(20));
        $user->status = DAL_Config::USER_STATUS_PUBLIC;

        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalExtension();
            $image = time().'.'.$name;
            while(file_exists("public/userAvatar".$image)){
                $image = time().'.'.$name;
            }
            $file->storeAs("public/userAvatar", $image);
            $user->avatar = $image;
        } else $user->avatar = '';
        $user->save();
        return redirect()->back()->with(['success_message' => 'Thêm người dùng thành công']);   
    }

    public function getEditUserRegister($userId) {
        $user = User::find($userId);
        return view('admin.users.edit_register', compact('user'));
    }

    public function postEditUserRegister(Request $request, $userId) {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'avatar.image' => 'Tệp không đúng định dạng',
            'avatar.mimes' => 'Ảnh phải là tệp thuộc loại: jpeg, png, jpg, gif, svg.',
            'avatar.max' => 'Vui lòng chọn ảnh nhỏ hơn 2MB',
        ]);
        $user = User::find($userId);
        $user->full_name = $request->full_name;
        $user->address = $request->address;

        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalExtension();
            $image = time().'.'.$name;
            while(file_exists("public/userAvatar".$image)){
                $image = time().'.'.$name;
            }
            $file->storeAs("public/userAvatar", $image);
            unlink("public/userAvatar/", $user->avatar);
            $user->avatar = $image;
        }

        if($request->isCheck == 'on') {
            $this->validate($request, [
                'password' => 'required|min:8|max:30',
            ], [
                'password.required' => 'Vui lòng điền mật khẩu',
                'password.min' => 'Mật khẩu phải có dộ dài từ 8 - 30 kí tự',
                'password.max' => 'Mật khẩu phải có dộ dài từ 8 - 30 kí tự',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with(['success_message' => 'Sửa người dùng thành công']);
    }

    public function getDeleteUserRegister($userId){
        $user = User::find($userId);
        $user->update(['status' => -1]);
        return redirect()->back()->with(['success_message' => 'Xóa người dùng thành công']);
    }
    #end

    # User Manager
    public function getListUserManager() {
        $user = User::orderBy('id', 'desc')
        ->where('status', DAL_Config::USER_STATUS_PUBLIC)
        ->whereIn('role', [
            DAL_Config::ROLE_USER_SP_ADMIN,
            DAL_Config::ROLE_USER_ADMIN,
            DAL_Config::ROLE_USER_MOD
        ])
        ->get();
        return view('admin.users.list_user_manager', compact('user'));
    }

    public function getAddUserManager() {
        return view('admin.users.add_manager');
    }

    public function postAddUserManager(Request $request) {
        $user = new User();
        $user->user_name = $request->user_name;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = bcrypt(123456);
        $user->avatar = '';
        $user->full_name = ucfirst($request->user_name);
        $user->address = '';
        $user->verify_code = time().uniqid(true);
        $user->remember_token = bin2hex(random_bytes(20));
        $user->status = DAL_Config::USER_STATUS_PUBLIC;
        $user->save();
        return redirect()->back()->with(['success_message' => 'Thêm quản trị viên thành công']);
    }
    #end

    #end
    
}
