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
                'name'    => 'Java Festival Production',
                'initial' => 'JF',
                'address' => 'Jakarta Pusat',
                'contact_name' => 'ADM',
                'contact_phone' => '0885182591',
            ],
            [
                'user_id' => 3,
                'name'    => 'Boss Creator',
                'initial' => 'BC',
                'address' => 'Jakarta Selatan',
                'contact_name' => 'OPS',
                'contact_phone' => '08218485911',
            ],
        ]);
    }
}
