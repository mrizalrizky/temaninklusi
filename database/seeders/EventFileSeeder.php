<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_files')->insert([
            [
                'event_id' => 1,
                'file_id'  => 1
            ],
            [
                'event_id' => 1,
                'file_id'  => 2,
            ],
            [
                'event_id' => 1,
                'file_id'  => 3,
            ]
        ]);
    }
}
