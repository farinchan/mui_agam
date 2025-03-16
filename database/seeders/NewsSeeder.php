<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsCategory::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'description' => 'Memuat berita-berita terbaru dari MUI Kab. Agam',
            'meta_title' => 'Berita PDM Kota Bukittinggi',
            'meta_description' => 'Berita-berita terbaru dari MUI Kab. Agam',
            'meta_keywords' => 'berita, berita terbaru, berita pdm, berita pdm kota bukittinggi',
        ]);

        NewsCategory::create([
            'name' => 'Fatwa',
            'slug' => 'fatwa',
            'description' => 'Memuat fatwa-fatwa terbaru dari Pimpinan Daerah MUI Kab. Agam',
            'meta_title' => 'Fatwa PDM Kota Bukittinggi',
            'meta_description' => 'Fatwa-fatwa terbaru dari Pimpinan Daerah MUI Kab. Agam',
            'meta_keywords' => 'fatwa, fatwa terbaru, fatwa pdm, fatwa pdm kota bukittinggi',
        ]);

        News::create([
            'title' => 'MUI Kabupaten Agam Tetapkan Idul Adha 1445 Jatuh Pada Senin, 17 Juni 2024. inilah Penjelasannya',
            'slug' => 'mui-kabupaten-agam-tetapkan-idul-adha-1445-jatuh-pada-senin-17-juni-2024-inilah-penjelasannya',
            'content' => 'Majelis Ulama Indonesia (MUI) Kabupaten Agam telah menetapkan Idul Adha 1445 jatuh pada Senin, 17 Juni 2024. Penetapan ini berdasarkan hasil hisab dan rukyat yang dilakukan oleh MUI Kabupaten Agam.',
            'thumbnail' => 'news/example.png',
            'category_id' => 1,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'MUI Kabupaten Agam Tetapkan Idul Adha 1445 Jatuh Pada Senin, 17 Juni 2024. inilah Penjelasannya',
            'meta_description' => 'Majelis Ulama Indonesia (MUI) Kabupaten Agam telah menetapkan Idul Adha 1445 jatuh pada Senin, 17 Juni 2024',
            'meta_keywords' => 'mui, idul adha, 1445, senin, 17 juni 2024',
        ]);

        News::create([
            'title' => 'MUI Kabupaten Agam Gelar Rapat Kerja Tahunan',
            'slug' => 'mui-kabupaten-agam-gelar-rapat-kerja-tahunan',
            'content' => 'Majelis Ulama Indonesia (MUI) Kabupaten Agam menggelar rapat kerja tahunan di kantor MUI Kabupaten Agam. Rapat kerja tahunan ini dihadiri oleh seluruh pengurus MUI Kabupaten Agam.',
            'thumbnail' => 'news/example.png',
            'category_id' => 1,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'MUI Kabupaten Agam Gelar Rapat Kerja Tahunan',
            'meta_description' => 'Majelis Ulama Indonesia (MUI) Kabupaten Agam menggelar rapat kerja tahunan di kantor MUI Kabupaten Agam',
            'meta_keywords' => 'mui kabupaten agam, rapat kerja tahunan',
        ]);

        News::create([
            'title' => 'Ikatan Remaja Masjid (IRM) Kabupaten Agam Gelar Kegiatan Donor Darah dan Bakti Sosial',
            'slug' => 'irm-kabupaten-agam-gelar-kegiatan-donor-darah-dan-bakti-sosial',
            'content' => 'Ikatan Remaja Masjid (IRM) Kabupaten Agam menggelar kegiatan donor darah dan bakti sosial di masjid-masjid Kabupaten Agam. Kegiatan ini dihadiri oleh seluruh remaja masjid di Kabupaten Agam.',
            'thumbnail' => 'news/example.png',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'IRM Kabupaten Agam Gelar Kegiatan Donor Darah dan Bakti Sosial',
            'meta_description' => 'Ikatan Remaja Masjid (IRM) Kabupaten Agam menggelar kegiatan donor darah dan bakti sosial di masjid-masjid Kabupaten Agam',
            'meta_keywords' => 'irm kabupaten agam, donor darah, bakti sosial',
        ]);

        News::create([
            'title' => 'Pemuda MUI Kabupaten Agam Gelar Kegiatan Kemanusiaan di Daerah Terpencil',
            'slug' => 'pemuda-mui-kabupaten-agam-gelar-kegiatan-kemanusiaan-di-daerah-terpencil',
            'content' => 'Pemuda MUI Kabupaten Agam menggelar kegiatan kemanusiaan di daerah terpencil. Kegiatan ini dihadiri oleh seluruh anggota Pemuda MUI Kabupaten Agam.',
            'thumbnail' => 'news/example.png',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Pemuda MUI Kabupaten Agam Gelar Kegiatan Kemanusiaan di Daerah Terpencil',
            'meta_description' => 'Pemuda MUI Kabupaten Agam menggelar kegiatan kemanusiaan di daerah terpencil',
            'meta_keywords' => 'pemuda mui kabupaten agam, kemanusiaan, daerah terpencil',
        ]);



        NewsComment::create([
            'name' => 'User Test 1',
            'email' => 'test1@example.com',
            'comment' => 'Berita yang sangat menarik, semoga PDM Kota Bukittinggi semakin maju',
            'status' => 'approved',
            'news_id' => 1,
        ]);

        NewsComment::create([
            'name' => 'User Test 2',
            'email' => 'test2@example.com',
            'comment' => 'Aamiiin, semoga PDM Kota Bukittinggi semakin maju dan sukses',
            'status' => 'approved',
            'parent_id' => 1,
            'news_id' => 1,
        ]);

        NewsComment::create([
            'name' => 'User Test 2',
            'email' => 'test2@example.com',
            'comment' => 'Semoga ORTOM Kota Bukittinggi semakin sukses dan semakin banyak kegiatan positif',
            'status' => 'approved',
            'news_id' => 2,
        ]);

        NewsComment::create([
            'name' => 'Office Gariskode',
            'email' => 'office@gariskode.com',
            'comment' => 'Semoga PDM Kota Bukittinggi Semakin Maju dan semakin sukses',
            'status' => 'approved',
            'news_id' => 1,
            'user_id' => 1,
        ]);
    }
}
