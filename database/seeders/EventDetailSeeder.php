<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_details')->insert([
            [
                'title' => 'Power of Words',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus ea amet itaque exercitationem natus soluta repellat maxime voluptatem repellendus sequi odio fugiat, quo optio nesciunt, debitis magnam aliquid perferendis deleniti?',
                'location' => 'Jakarta Convention Center',
                'slug' => 'power-of-words',
                'start_date' => now(),
                'end_date' => now(),
            ],
        ]);
    }
}
