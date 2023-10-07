<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_statuses')->insert([
            [
                'name' => 'On Progress',
            ],
            [
                'name' => 'Verified'
            ]
        ]);
    }
}
