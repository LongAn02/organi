<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) {
            if ($i % 2 != 0) {
                DB::table('products')->insert([
                    'name' => strtoupper(Str::random(5)).'-'.$i,
                    'price' => rand(3000,6000),
                    'category_id' => 1,
                    'discount_id' => $i + 1,
                    'img' => '/pd-'.$i.'.jpg',
                    'description' => 'ngon - ngot - mat',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('products')->insert([
                    'name' => strtoupper(Str::random(5)).'-'.$i,
                    'price' => rand(3000,6000),
                    'category_id' => 3,
                    'discount_id' => $i + 1,
                    'img' => '/pd-'.$i.'.jpg',
                    'description' => 'ngon',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        for ($i = 1; $i <= 12; $i++) {
            if ($i <= 4) {
                DB::table('products')->insert([
                    'name' => strtoupper(Str::random(5)).'-'.$i,
                    'price' => rand(3000,6000),
                    'category_id' => 1,
                    'discount_id' => 1,
                    'img' => '/product-'.$i.'.jpg',
                    'description' => 'delicious - sweet - cool',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                if ($i <= 8) {
                    DB::table('products')->insert([
                        'name' => strtoupper(Str::random(5)).'-'.$i,
                        'price' => rand(3000,6000),
                        'category_id' => 2,
                        'discount_id' => 1,
                        'img' => '/product-'.$i.'.jpg',
                        'description' => 'cool',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    DB::table('products')->insert([
                        'name' => strtoupper(Str::random(5)).'-'.$i,
                        'price' => rand(3000,6000),
                        'category_id' => 3,
                        'discount_id' => 1,
                        'img' => '/product-'.$i.'.jpg',
                        'description' => 'delicious',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
