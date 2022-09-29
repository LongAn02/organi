<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            [
                'role_id' => 2,
                'permission_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 2,
                'permission_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 2,
                'permission_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 2,
                'permission_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
