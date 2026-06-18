<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'user'],
            ['name' => 'admin'],
        ]);

        DB::table('permissions')->insert([
            ['name' => 'access_admin_panel'],

            ['name' => 'manage_products'],
            ['name' => 'manage_categories'],
            ['name' => 'manage_orders'],
            ['name' => 'manage_users'],

            ['name' => 'manage_roles'],
            ['name' => 'manage_permissions'],
        ]);

        // -------------------------
        // ROLE → PERMISSIONS for admin
        // -------------------------

        $adminId = DB::table('roles')
            ->where('name', 'admin')
            ->value('id');
        $permissions = DB::table('permissions')
            ->pluck('id', 'name');
        $data = [];

        foreach ($permissions as $name => $id) {
            $data[] = [
                'role_id' => $adminId,
                'permission_id' => $id,
            ];
        }

        DB::table('role_permission')->insert($data);
    }
}
