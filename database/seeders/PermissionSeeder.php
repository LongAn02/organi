<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'view.product',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'create.product',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'update.product',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'delete.product',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
