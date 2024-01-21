<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'organizer_id'    => 1,
                'event_detail_id' => 1,
                'status_id'       => 3,
                'event_category_id' => 1,
                'show_flag' => true,
                'disability_event_flag' => true,
                'event_license_flag' => true,
                'event_banner_file_id' => 3,
                'event_license_file_id' => 1,
                'event_proposal_file_id' => 2,
                'created_by' => 'eo',
            ],
            [
                'organizer_id'    => 1,
                'event_detail_id' => 2,
                'status_id'       => 3,
                'event_category_id' => 1,
                'show_flag' => true,
                'disability_event_flag' => false,
                'event_license_flag' => false,
                'event_banner_file_id' => 1,
                'event_license_file_id' => null,
                'event_proposal_file_id' => 2,
                'created_by' => 'eo',
            ],
        ]);
    }
}
