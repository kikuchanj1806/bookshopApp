<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
            RolePermissionSeeder::class,
        ]);

        // Gán role admin cho user
        $admin = User::find(1); // ID của user admin
        $admin->assignRole('admin');

        // Gán role cộng tác viên cho user
        $congtacvien = User::find(2); // ID của user cộng tác viên
        $congtacvien->assignRole('ctv');
    }
}
