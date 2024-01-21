<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterOrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_organizers')->insert([
            [
                'user_id' => 3,
                'name'    => 'Rumah Inklusi',
                'initial' => 'RI',
                'address' => 'Jakarta Pusat',
                'contact_name' => 'ADM',
                'contact_phone' => '082148195511',
                'contact_email' => 'rumah.inklusi@gmail.com',
            ],
        ]);
    }
}
