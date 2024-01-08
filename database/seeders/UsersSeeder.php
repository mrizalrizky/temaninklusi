<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
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
                'name' => 'Test User Admin',
                'username' => "admin",
                'password' => Hash::make("adminadmin"),
                'email' => "admin@gmail.com",
                'role_id' => 1,
                'phone_number' => '081123845112',
            ],
            [
                'name' => 'Test User Member',
                'username' => "user",
                'password' => Hash::make("useruser"),
                'email' => "temuinklusi.id@gmail.com",
                'role_id' => 2,
                'phone_number' => '08123145811',
            ],
            [
                'name' => 'Test User EO',
                'username' => "eo",
                'password' => Hash::make("eventorganizer"),
                'email' => "eo@gmail.com",
                'role_id' => 3,
                'phone_number' => '0812341498',
            ]
        ]);
    }
}
