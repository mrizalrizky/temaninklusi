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
                'username' => "user",
                'password' => Hash::make("user"),
                'email' => "user@gmail.com",
                'id_role' => 1
            ],
            [
                'username' => "admin",
                'password' => Hash::make("user"),
                'email' => "admin@gmail.com",
                'id_role' => 2
            ],
            [
                'username' => "eo",
                'password' => Hash::make("user"),
                'email' => "eo@gmail.com",
                'id_role' => 3
            ]
        ]);
    }
}
