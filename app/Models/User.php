<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class User extends Model
{
    use HasRoles;
    //
    protected $guard_name = 'web';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_name',
        'password',
        'avatar',
        'full_name',
        'phone',
        'address',
        'verify_code',
        'role',
        'status',
        'remember_token',
    ];
    // protected $with = ['roleUser'];
    // protected $append = ['role_user'];
    public $timestamps = true;

    // public function roleUser() {
    //     return $this->belongsTo('App\Models\Role_user', 'role', 'role_id');
    // }

    public function getRoleUserAttribute() {
        return $this->belongsTo('App\Models\Role_user', 'role', 'role_id')->first();
    }
}
