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
                'name'    => 'Java Festival Production',
                'initial' => 'JF',
            ],
            [
                'name'    => 'Boss Creator',
                'initial' => 'BC'
            ],
        ]);
    }
}
