<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            Role_userSeeder::class,
            // ArticleTableSeeder::class,
            // CategoryTableSeeder::class,
            // CustomerTableSeeder::class,
            RolesAndPermissionsSeeder::class
        ]);
    }
}

class Role_userSeeder extends Seeder{
    public function run()
    {
        DB::table('role_users')->insert([
            array(
                'role_id' => 1,
                'role_name' => 'super-admin',
                'role_des' => 'Super Administrator',
                'role_status' => 1,
            ),
            array(
                'role_id' => 2,
                'role_name' => 'admin',
                'role_des' => 'Administrator',
                'role_status' => 1,
            ),
            array(
                'role_id' => 3,
                'role_name' => 'moderator',
                'role_des' => 'Moderator',
                'role_status' => 1,
            ),
            array(
                'role_id' => 11,
                'role_name' => 'normal',
                'role_des' => 'Normal',
                'role_status' => 1,
            ),
        ]);
    }
}

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        Role::create(['name' => 'moderator']);
        Role::create(['name' => 'normal']);

        \App\Models\User::find(1)->assignRole('super-admin');
        \App\Models\User::find(2)->assignRole('admin');

        $editor = Permission::create(['name' => 'editor']);
        $sale = Permission::create(['name' => 'sale']);
        $saleManage = Permission::create(['name' => 'sale manager']);
        $customer = Permission::create(['name' => 'customer care']);
        $support = Permission::create(['name' => 'support']);

        $superAdmin->syncPermissions([$editor, $sale, $customer, $support,$saleManage]);
        $admin->syncPermissions([$editor, $sale, $customer, $support,$saleManage]);

    }
}
