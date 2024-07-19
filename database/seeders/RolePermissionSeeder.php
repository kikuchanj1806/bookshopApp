<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Tạo role admin và cộng tác viên nếu chưa tồn tại
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $ctvRole = Role::firstOrCreate(['name' => 'ctv']);

        // Tạo người dùng giả sử ID 1 là admin
        $user = User::find(1);
        if ($user) {
            $user->assignRole($adminRole);
        }

        // Tạo người dùng giả sử ID 2 là cộng tác viên
        $user = User::find(2);
        if ($user) {
            $user->assignRole($ctvRole);
        }
    }
}
