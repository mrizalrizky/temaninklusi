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
                'organizer_id'    => 2,
                'event_detail_id' => 1,
                'status_id'       => 3,
                'event_category_id' => 2,
                'show_flag' => 1,
                'event_license_flag' => 1,
                'event_banner_file_id' => 1,
                'event_license_file_id' => 1,
                'event_proposal_file_id' => 2,
                'created_by' => 'Boss Creator',
                'updated_by' => 'Boss Creator',
            ],
            [
                'organizer_id'    => 2,
                'event_detail_id' => 2,
                'status_id'       => 3,
                'event_category_id' => 1,
                'show_flag' => 1,
                'event_proposal_file_id' => 1,
                'event_license_flag' => 0,
                'event_banner_file_id' => 1,
                'event_license_file_id' => 2,
                'created_by' => 'JFP',
                'updated_by' => 'JFP',
            ],
        ]);
    }
}
