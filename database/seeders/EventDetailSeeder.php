<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_details')->insert([
            [
                'title' => 'Power of Words',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus ea amet itaque exercitationem natus soluta repellat maxime voluptatem repellendus sequi odio fugiat, quo optio nesciunt, debitis magnam aliquid perferendis deleniti?',
                'location' => 'Jakarta Convention Center',
                'slug' => 'power-of-words',
                'start_date' => now(),
                'end_date' => now()->addDays(5),
                'event_facilities' => collect(['Fasilitas 1 POW', 'Fasilitas 2 POW']),
                'event_benefits' => collect(['Benefit 1 POW', 'Benefit 2 POW']),
                'contact_email' => 'bosscreator@gmail.com',
                'contact_phone' => '02191858181',
                'quota' => 100,
                'social_media_link' => 'https:/instagram.com/boss.creator',
            ],
            [
                'title' => 'Belajar ReactJS Pemula',
                'slug' => 'belajar-reactjs-pemula',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus ea amet itaque exercitationem natus soluta repellat maxime voluptatem repellendus sequi odio fugiat, quo optio nesciunt, debitis magnam aliquid perferendis deleniti?',
                'quota' => 250,
                'contact_email' => 'JAVAFEST@gmail.com',
                'contact_phone' => '02194858111',
                'start_date' => now()->addDays(1),
                'end_date' => now()->addWeek(),
                'location' => 'Gelora Bung Karno',
                'event_facilities' => collect(['Fasilitas 1 BRP', 'Fasilitas 2 BRP', 'Fasilitas 3 BRP']),
                'event_benefits' => collect(['Benefit 1 BRP', 'Benefit 2 BRP', 'Benefit 3 BRP']),
                'social_media_link' => 'https:/instagram.com/javafestivalproduction',
            ],
        ]);
    }
}
