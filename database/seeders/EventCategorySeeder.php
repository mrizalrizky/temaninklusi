<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            [
                'label' => 'Olahraga',
            ],
            [
                'label' => 'Teknologi',
            ],
        ]);
    }
}
