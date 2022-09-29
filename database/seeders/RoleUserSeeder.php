<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50 ; $i++) {
            DB::table('role_user')->insert([
                'user_id' => $i,
                'role_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('role_user')->insert([
            [
                'user_id' => 51,
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 51,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 52,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
