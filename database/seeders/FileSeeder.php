<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            [
                'file_name' => 'Bulb',
                'file_type' => 'banner',
                'file_path' => 'https://images.unsplash.com/photo-1493612276216-ee3925520721'
            ],
            [
                'file_name' => 'Writing in a Book',
                'file_type' => 'banner',
                'file_path' => 'https://images.unsplash.com/photo-1456324504439-367cee3b3c32'
            ],
            [
                'file_name' => 'House',
                'file_type' => 'banner',
                'file_path' => 'https://images.unsplash.com/photo-1697462247834-7d55761daea3'
            ],
        ]);
    }
}
