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
                'full_name' => 'Test User Member',
                'username' => "user",
                'password' => Hash::make("useruser"),
                'email' => "user@gmail.com",
                'role_id' => 1
            ],
            [
                'full_name' => 'Test User Admin',
                'username' => "admin",
                'password' => Hash::make("adminadmin"),
                'email' => "admin@gmail.com",
                'role_id' => 2
            ],
            [
                'full_name' => 'Test User EO',
                'username' => "eo",
                'password' => Hash::make("eventorganizer"),
                'email' => "eo@gmail.com",
                'role_id' => 3
            ]
        ]);
    }
}
