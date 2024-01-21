<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventDisabilityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_disability_categories')->insert([
            [
                'event_id' => 1,
                'disability_category_id' => 1,
            ],
        ]);
    }
}
