<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([
            array(
                'id' => 1,
                'user_name' => 'super_admin',
                'password' => bcrypt(123456),
                'avatar' => '',
                'full_name' => 'Super Admin',
                'phone' => '0984360229',
                'address' => 'Bac Ninh',
                'verify_code' => time().uniqid(true),
                'role' => \App\Http\DAL\DAL_Config::ROLE_USER_SP_ADMIN,
                'status' => 1,
                'remember_token' => '',
            ),
            array(
                'id' => 2,
                'user_name' => 'admin',
                'password' => bcrypt(123456),
                'avatar' => '',
                'full_name' => 'Admin',
                'phone' => '0984360229',
                'address' => 'Bac Ninh',
                'verify_code' => time().uniqid(true),
                'role' => \App\Http\DAL\DAL_Config::ROLE_USER_ADMIN,
                'status' => 1,
                'remember_token' => '',
            )
        ]);
    }
}
