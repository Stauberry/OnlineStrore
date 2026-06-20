<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $userRoleId = DB::table('roles')
            ->where('name', 'user')
            ->value('id');

        $adminRoleId = DB::table('roles')
            ->where('name', 'admin')
            ->value('id');

        User::create([
            'name' => 'Nik',
            'email' => 'test@email.com',
            'password' => Hash::make('123456789'),
            'role_id' => $userRoleId,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456789'),
            'role_id' => $adminRoleId,
        ]);
    }
}
