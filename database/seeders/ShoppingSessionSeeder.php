<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 50 ; $i++) {
            DB::table('shopping_sessions')->insert([
                'user_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
