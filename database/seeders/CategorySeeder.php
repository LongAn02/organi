<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'fruit',
                'description' => 'fresh fruit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'water',
                'description' => 'cool water',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'meat',
                'description' => 'Fresh Meat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
