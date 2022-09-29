<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '0396673323',
                'password' => bcrypt('admin'),
                'address' => 'Duy Tien - Ha Nam',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'poster-1',
                'email' => 'poster1@gmail.com',
                'phone' => '0996676333',
                'password' => bcrypt('123'),
                'address' => 'Thanh Oai - Ha Noi',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
