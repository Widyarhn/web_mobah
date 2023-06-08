<?php

namespace Database\Seeders;

use App\Models\Mitra;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        $default_user_value = [
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();

        try {
            $admin = User::create(array_merge([
                'username' => 'admin@gmail.com',
                'name'  => 'admin',
            ], $default_user_value));
            Admin::create(array_merge([
                'nama' => 'admin aplikasi',
                'user_id' => 1,
            ]));

            $mitra = User::create(array_merge([
                'username' => 'mitra@gmail.com',
                'name'  => 'mitra',
            ], $default_user_value));
        

            $validator = User::create(array_merge([
                'username' => 'validator@gmail.com',
                'name'  => 'validator',
            ], $default_user_value));

            $role_admin = Role::create(['name' => 'admin']);
            $role_mitra = Role::create(['name' => 'mitra']);
            $role_validator = Role::create(['name' => 'validator']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $admin->assignRole('admin');
            $mitra->assignRole('mitra');
            $validator->assignRole('validator');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
