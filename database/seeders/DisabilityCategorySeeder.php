<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisabilityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disability_categories')->insert([
            [
                'label' => 'Tunarungu',
            ],
            [
                'label' => 'Tunanetra',
            ],
            [
                'label' => 'Daksa'
            ]
        ]);
    }
}
