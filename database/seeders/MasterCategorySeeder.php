<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_categories')->insert([
            [
                'name' => 'Self Development'
            ],
            [
                'name' => 'Technology'
            ]
        ]);
    }
}
