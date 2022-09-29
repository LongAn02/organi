<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 75; $i += 5)
        DB::table('discounts')->insert([
            [
                'name' => 'discount '.$i.'%',
                'percentage_discount' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
