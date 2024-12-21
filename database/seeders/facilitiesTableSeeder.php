<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        $facilities = [
            [
                'name' => 'sman 1 welahan',
                'category' => 'Education',
                'latitude' => -6.755681468567695,
                'longitude' => 110.7246321721114,
                'description' => 'Sekolah menengah atas yang terkenal di daerah Welahan.',
            ],
            [
                'name' => 'smpn 1 welahan',
                'category' => 'Education',
                'latitude' => -6.752581272292238,
                'longitude' => 110.7246128903601,
                'description' => 'Sekolah menengah pertama yang menyediakan pendidikan berkualitas di Welahan.',
            ],
            [
                'name' => 'SD Negeri 4 Kalipucang Kulon',
                'category' => 'Education',
                'latitude' => -6.749054434304029,
                'longitude' => 110.7188274193508,
                'description' => 'Sekolah dasar yang melayani komunitas Kalipucang Kulon.',
            ],
            [
                'name' => 'smpn 2 welahan',
                'category' => 'Education',
                'latitude' => -6.770736048855632,
                'longitude' => 110.7246128903601,
                'description' => 'Sekolah menengah pertama yang dikenal dengan program akademik unggulannya.',
            ],
            [
                'name' => 'Islamic Center Kalipucang Kulon Welahan Jepara',
                'category' => 'Religious',
                'latitude' => -6.760252387846421,
                'longitude' => 110.72100800160433,
                'description' => 'Pusat komunitas Islam yang berlokasi di Kalipucang Kulon.',
            ],
            [
                'name' => 'Klinik Kesehatan Dr.Abdul Hadi',
                'category' => 'Health',
                'latitude' => -6.7652117665728175,
                'longitude' => 110.72473419006673,
                'description' => 'Klinik kesehatan terpercaya yang menyediakan layanan medis di daerah tersebut.',
            ],
            [
                'name' => 'Lapangan Kwanten',
                'category' => 'Recreational',
                'latitude' => -6.758043281933613,
                'longitude' => 110.71742767551932,
                'description' => 'Lapangan rekreasi untuk acara komunitas dan olahraga.',
            ],
            [
                'name' => 'Masjid Jami\' Nurul Ula',
                'category' => 'Religious',
                'latitude' => -6.770741514678734,
                'longitude' => 110.72441060235899,
                'description' => 'Masjid utama yang melayani komunitas Muslim lokal.',
            ],
            [
                'name' => 'Bimbel Rafka 2',
                'category' => 'Education',
                'latitude' => -6.76171783093063,
                'longitude' => 110.71397079047861,
                'description' => 'Pusat bimbingan belajar untuk siswa yang ingin meningkatkan prestasi akademik.',
            ],
            [
                'name' => 'POSKESDES Kalipucang Kulon',
                'category' => 'Health',
                'latitude' => -6.758439869384786,
                'longitude' => 110.71693315478569,
                'description' => 'Pos kesehatan desa yang menyediakan layanan kesehatan dasar.',
            ],
            [
                'name' => 'Masjid Jami\' Rodhotul Muttaqin',
                'category' => 'Religious',
                'latitude' => -6.761428962682159,
                'longitude' => 110.72081525488558,
                'description' => 'Masjid dengan fasilitas ibadah yang nyaman bagi masyarakat.',
            ],
            [
                'name' => 'Masjid Jami\' Masjidur Rohim',
                'category' => 'Religious',
                'latitude' => -6.754480795192095,
                'longitude' => 110.71617406987959,
                'description' => 'Masjid yang menjadi pusat kegiatan keagamaan masyarakat.',
            ],
            [
                'name' => 'Mushola Rodhlotul Muttaqin',
                'category' => 'Religious',
                'latitude' => -6.7573337761111425,
                'longitude' => 110.71431052844812,
                'description' => 'Mushola kecil yang nyaman untuk beribadah.',
            ],
            [
                'name' => 'Masjid Jami\' Al-Huda',
                'category' => 'Religious',
                'latitude' => -6.765820443614999,
                'longitude' => 110.72125352049366,
                'description' => 'Masjid dengan suasana yang damai dan fasilitas lengkap.',
            ],
            [
                'name' => 'Mushola Mbah Kaprawi Al Istiqomah',
                'category' => 'Religious',
                'latitude' => -6.75826510307199,
                'longitude' => 110.71672091491882,
                'description' => 'Mushola yang sering digunakan untuk kegiatan ibadah warga sekitar.',
            ],
            [
                'name' => 'Masjid Baitur Rahman',
                'category' => 'Religious',
                'latitude' => -6.76016156233923,
                'longitude' => 110.71375975629799,
                'description' => 'Masjid besar dengan kapasitas yang luas.',
            ],
            [
                'name' => 'Mushola Al-Istiqomah',
                'category' => 'Religious',
                'latitude' => -6.762356624505439,
                'longitude' => 110.72033519957647,
                'description' => 'Tempat ibadah yang bersih dan nyaman.',
            ],
            [
                'name' => 'YAYASAN KALI ILMU',
                'category' => 'Education',
                'latitude' => -6.757738771701568,
                'longitude' => 110.71382644114567,
                'description' => 'Yayasan pendidikan yang mendukung perkembangan ilmu pengetahuan.',
            ],
        ];

        foreach ($facilities as $facility) {
            DB::table('facilities')->insert(array_merge($facility, ['total_visits' => 0]));
        }
    }
}
