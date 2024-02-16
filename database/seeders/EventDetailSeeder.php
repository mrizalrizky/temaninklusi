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
                'title' => 'Berkarya Tanpa Batas',
                'description' => '"Berkarya Tanpa Batas" adalah perhimpunan seni yang mengundang teman-teman disabilitas untuk memperoleh pengalaman yang memadukan ekspresi diri, kreativitas, dan keberagaman. Dalam suasana yang penuh semangat dan positif, peserta akan diajak untuk mengeksplorasi potensi artistik mereka melalui berbagai media, seperti lukisan, seni kerajinan, musik, puisi, dan banyak lagi.

                Acara ini akan memberikan panduan dan sumber daya bagi peserta untuk menemukan bentuk seni yang paling mereka nikmati. Selain itu, para peserta juga akan dibimbing oleh mentor seni berpengalaman yang akan memberikan dukungan dan bimbingan kreatif. Kegiatan ini bertujuan untuk membangun rasa percaya diri dan memupuk rasa bangga terhadap karya seni yang dihasilkan.

                Setiap peserta akan memiliki kebebasan untuk mengekspresikan diri tanpa batas, menjelajahi imajinasi mereka, dan mengatasi segala rintangan dengan keberanian dan ketekunan. Sebagai bagian dari acara, akan diadakan pameran seni yang memamerkan karya-karya luar biasa para peserta, memberikan kesempatan bagi masyarakat untuk mengapresiasi dan mendukung kreativitas yang tak terhingga ini.
                "Berkarya Tanpa Batas" adalah lebih dari sekadar kegiatan seni; ini adalah perayaan inklusi, keberagaman, dan kekuatan kreativitas manusia. Kami yakin bahwa melalui pengalaman ini, teman-teman disabilitas akan merasa dihargai dan diakui atas kontribusi unik mereka dalam dunia seni. Mari bersama-sama merayakan potensi tanpa batas dan membangun dunia yang lebih inklusif melalui "Berkarya Tanpa Batas"!',
                'location' => 'Aula Jasmine, Gedung Bulog',
                'slug' => 'berkarya-tanpa-batas',
                'start_date' => '2024-02-21 13:00:00',
                'end_date' => '2024-02-21 15:00:00',
                'max_register_date' => '2024-02-20 21:00:00',
                'event_facilities' => collect(['Akses Kursi Roda', 'Akses Lift']),
                'event_benefits' => collect(['Sertifikat dan Penghargaan', 'Komunitas dan Jaringan']),
                'contact_email' => 'rumah.inklusi@gmail.com',
                'contact_phone' => '082148195511',
                'quota' => 25,
                'social_media_link' => 'https:/instagram.com/rumah.inklusi',
            ],
            [
                'title' => 'Bersinar dalam Kehidupan Sehari-hari: Workshop Keterampilan untuk Petualangan Hidup',
                'slug' => 'workshop-keterampilan-untuk-petualangan-hidup',
                'description' => 'Selamat datang di perjalanan hidup yang penuh keajaiban dan inspirasi! "Bersinar dalam Kehidupan Sehari-hari" adalah workshop eksklusif yang tidak hanya menawarkan keterampilan hidup praktis, tetapi juga mengajak Anda untuk merayakan keunikan dan potensi tersembunyi dalam diri Anda. Ini bukan sekadar workshop; ini adalah petualangan bersama, sebuah panggilan untuk menemukan kilau yang ada dalam setiap detik kehidupan Anda.

                Di dalam gemerlap "Bersinar dalam Kehidupan Sehari-hari," Anda akan dibimbing oleh para ahli keterampilan hidup yang penuh semangat, siap mengajarkan Anda seni menjalani hidup dengan penuh keceriaan dan kemandirian. Dengan kombinasi pendekatan interaktif, aktivitas kelompok yang membangun kolaborasi, dan sesi pemberian materi yang mendalam, workshop ini menjadi wahana penuh inspirasi untuk mengasah keterampilan sehari-hari Anda.',
                'quota' => 50,
                'contact_email' => 'rumah.inklusi@gmail.com',
                'contact_phone' => '082148195511',
                'start_date' => '2024-02-25 09:30:00',
                'end_date' => '2024-02-25 11:00:00',
                'max_register_date' => '2024-02-23 09:00:00',
                'location' => 'Hall B, JCC Senayan',
                'event_facilities' => collect(['Makan Siang', 'Mentor Ahli', 'Ruang Diskusi dan Kolaborasi']),
                'event_benefits' => collect(['Belajar Manajemen Waktu yang Baik', 'Kebugaran Mental dan Emosional', 'Meningkatkan Keterampilan Interpersonal']),
                'social_media_link' => 'https:/instagram.com/rumah.inklusi',
            ],
        ]);
    }
}
