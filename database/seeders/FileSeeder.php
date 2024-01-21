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
                'file_name' => 'event_banner.jpg',
                'file_type' => 'event_banner',
                'file_path' => 'public/events/workshop-keterampilan-untuk-petualangan-hidup/'
            ],
            [
                'file_name' => 'Writing in a Book',
                'file_type' => 'banner',
                'file_path' => 'https://images.unsplash.com/photo-1456324504439-367cee3b3c32'
            ],
            [
                'file_name' => 'event_banner.jpg',
                'file_type' => 'event_banner',
                'file_path' => 'public/events/berkarya-tanpa-batas/'
            ],
            [
                'file_name' => 'article_banner.jpg',
                'file_type' => 'article_banner',
                'file_path' => 'public/blogs/menjadi-sukses-dengan-memaksimalkan-pengembangan-diri/'
            ],
        ]);
    }
}
