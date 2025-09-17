<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Olahraga',
                'slug' => 'olahraga',
                'description' => 'Kategori untuk UKM yang berfokus pada kegiatan olahraga',
            ],
            [
                'name' => 'Seni',
                'slug' => 'seni',
                'description' => 'Kategori untuk UKM yang berfokus pada kegiatan seni',
            ],
            [
                'name' => 'Penalaran & Keilmuan',
                'slug' => 'penalaran-keilmuan',
                'description' => 'Kategori untuk UKM yang berfokus pada kegiatan penalaran dan keilmuan',
            ],
            [
                'name' => 'Keagamaan',
                'slug' => 'keagamaan',
                'description' => 'Kategori untuk UKM yang berfokus pada kegiatan keagamaan',
            ],
            [
                'name' => 'Pers Kampus',
                'slug' => 'pers-kampus',
                'description' => 'Kategori untuk UKM yang berfokus pada kegiatan pers kampus',
            ],
            [
                'name' => 'ORMAWA',
                'slug' => 'ormawa',
                'description' => 'Kategori untuk organisasi kemahasiswaan',
            ],
            [
                'name' => 'Berita Kampus',
                'slug' => 'berita-kampus',
                'description' => 'Kategori untuk artikel berita kampus',
            ],
            [
                'name' => 'Kegiatan Mahasiswa',
                'slug' => 'kegiatan-mahasiswa',
                'description' => 'Kategori untuk artikel kegiatan mahasiswa',
            ],
            [
                'name' => 'Wartadinus',
                'slug' => 'wartadinus',
                'description' => 'Kategori untuk artikel dari Wartadinus',
            ],
            [
                'name' => 'Prestasi',
                'slug' => 'prestasi',
                'description' => 'Kategori untuk artikel prestasi',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}