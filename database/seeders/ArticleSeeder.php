<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'article_category_id' => 1,
                'banner_file_id' => 4,
                'title'   => 'Menjadi Sukses dengan Memaksimalkan Pengembangan Diri',
                'content' => 'Kehidupan ini berada dalam kendali diri kita sendiri.. kita ingin sukses, kita ingin berhasil, kita ingin apapun semua tergantung dari diri kita sendiri… tetapi kadang kalanya kita merasa ada yang membatasi kehidupan ini menuju apa yang kita inginkan, lalu apa yang harus kita lakukan untuk melepaskan hambatan atau batasan yang ada?

                Ada beberapa hal yang bisa dilakukan untuk menjadi pondasi anda meraih apapun yang anda inginkan, salah satunya adalah melalui pengembangan diri… seorang psikolog asal New York bernama Abraham Maslow mengatakan pengembangan diri merupakan suatu usaha individu untuk memenuhi kebutuhan aktualisasi diri. Kebutuhan aktualisasi merupakan kebutuhan puncak/tertinggi diantara kebutuhan-kebutuhan manusia…

                Pengembangan diri sangat diperlukan karena di dalam setiap elemen kehidupan pasti harus selalu berkembang, bahkan dalam hal sederhana seperti membuat kue pun harus menunggu adonan kue mengembang baru dapat diolah menjadi sebuah kue yang sangat nikmat.. lantas apa yang bisa dilakukan dalam hal pengembangan diri kita masing masing?',
                'slug'    => 'menjadi-sukses-dengan-memaksimalkan-pengembangan-diri',
                'source' => 'Kukarkab.com',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
