<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_comments')->insert([
            [
                'content' => 'Saya mau ikutan dong eventnya!',
                'user_id' => 2,
                'event_id' => 1,
            ],
            [
                'content' => 'Kayanya eventnya seru nih!!',
                'user_id' => 3,
                'event_id' => 1,
            ],
            [
                'content' => 'Wihh mantep bgt ya. keren nih!',
                'user_id' => 1,
                'event_id' => 1,
            ],

        ]);
    }
}
