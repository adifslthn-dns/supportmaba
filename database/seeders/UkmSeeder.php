<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ukm;
use App\Models\Category;

class UkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $olahragaCategory = Category::where('slug', 'olahraga')->first();
        $seniCategory = Category::where('slug', 'seni')->first();
        $penalaranCategory = Category::where('slug', 'penalaran-keilmuan')->first();
        $keagamaanCategory = Category::where('slug', 'keagamaan')->first();
        $persCategory = Category::where('slug', 'pers-kampus')->first();
        $ormawaCategory = Category::where('slug', 'ormawa')->first();

        $ukms = [
            [
                'name' => 'UKM Basket',
                'description' => 'Unit kegiatan mahasiswa yang berfokus pada pengembangan bakat dalam olahraga basket.',
                'category_id' => $olahragaCategory->id,
                'establishment_year' => 2005,
                'members_count' => 45,
                'supervisor' => 'Dr. Ahmad Susanto, M.Pd',
                'contact_person' => 'Budi Santoso',
                'contact_email' => 'basket@ukm.udinus.ac.id',
                'contact_phone' => '0812-3456-7890',
                'instagram' => '@ukmbasketudinus',
                'website' => 'https://basket.ukm.udinus.ac.id',
                'activities' => 'Latihan rutin setiap Senin & Rabu, 16.00 - 18.00 WIB. Partisipasi dalam berbagai kompetisi basket antar universitas. Pelatihan dasar basket untuk anggota baru. Kegiatan sosial basket bersama anak-anak panti asuhan.',
                'facilities' => 'Lapangan basket standar, peralatan latihan, ruang ganti, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Futsal',
                'description' => 'Wadah bagi mahasiswa yang memiliki minat dan bakat dalam olahraga futsal.',
                'category_id' => $olahragaCategory->id,
                'establishment_year' => 2007,
                'members_count' => 38,
                'supervisor' => 'Dr. Slamet Riyadi, M.Pd',
                'contact_person' => 'Ahmad Fauzi',
                'contact_email' => 'futsal@ukm.udinus.ac.id',
                'contact_phone' => '0813-5678-9012',
                'instagram' => '@ukmfutsaludinus',
                'website' => 'https://futsal.ukm.udinus.ac.id',
                'activities' => 'Latihan rutin setiap Selasa & Kamis, 16.00 - 18.00 WIB. Partisipasi dalam kompetisi futsal antar universitas. Pelatihan teknik dasar futsal untuk anggota baru. Friendly match dengan universitas lain.',
                'facilities' => 'Lapangan futsal standar, peralatan latihan, ruang ganti, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Bulu Tangkis',
                'description' => 'Unit kegiatan mahasiswa untuk mengembangkan bakat dalam olahraga bulu tangkis.',
                'category_id' => $olahragaCategory->id,
                'establishment_year' => 2006,
                'members_count' => 32,
                'supervisor' => 'Dra. Siti Nurhaliza, M.Pd',
                'contact_person' => 'Rina Susanti',
                'contact_email' => 'bulutangkis@ukm.udinus.ac.id',
                'contact_phone' => '0814-6789-0123',
                'instagram' => '@ukmbulutangkisudinus',
                'website' => 'https://bulutangkis.ukm.udinus.ac.id',
                'activities' => 'Latihan rutin setiap Jumat & Sabtu, 16.00 - 18.00 WIB. Partisipasi dalam kompetisi bulu tangkis antar universitas. Pelatihan teknik dasar bulu tangkis untuk anggota baru. Exibisi bulu tangkis.',
                'facilities' => 'Lapangan bulu tangkis standar, peralatan latihan, ruang ganti, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Paduan Suara',
                'description' => 'Wadah bagi mahasiswa yang memiliki minat dalam seni vokal dan paduan suara.',
                'category_id' => $seniCategory->id,
                'establishment_year' => 2004,
                'members_count' => 50,
                'supervisor' => 'Drs. Budi Santoso, M.Sn',
                'contact_person' => 'Andi Pratama',
                'contact_email' => 'paduansuara@ukm.udinus.ac.id',
                'contact_phone' => '0815-7890-1234',
                'instagram' => '@ukmpaduansuaraudinus',
                'website' => 'https://paduansuara.ukm.udinus.ac.id',
                'activities' => 'Latihan rutin setiap Senin & Rabu, 19.00 - 21.00 WIB. Performance dalam berbagai acara universitas. Partisipasi dalam festival paduan suara tingkat nasional. Workshop vokal untuk anggota baru.',
                'facilities' => 'Ruang latihan musik, sound system, ruang ganti, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Teater',
                'description' => 'Unit kegiatan mahasiswa yang menyalurkan minat dan bakat di bidang seni peran.',
                'category_id' => $seniCategory->id,
                'establishment_year' => 2005,
                'members_count' => 28,
                'supervisor' => 'Drs. Ahmad Fauzi, M.Sn',
                'contact_person' => 'Siti Nurhaliza',
                'contact_email' => 'teater@ukm.udinus.ac.id',
                'contact_phone' => '0816-8901-2345',
                'instagram' => '@ukmteaterudinus',
                'website' => 'https://teater.ukm.udinus.ac.id',
                'activities' => 'Latihan rutin setiap Selasa & Kamis, 19.00 - 21.00 WIB. Pementasan teater dalam berbagai acara universitas. Partisipasi dalam festival teater tingkat nasional. Workshop akting untuk anggota baru.',
                'facilities' => 'Rangka teater, properti, kostum, ruang ganti, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Tari',
                'description' => 'Wadah bagi mahasiswa yang memiliki minat dalam seni tari tradisional maupun modern.',
                'category_id' => $seniCategory->id,
                'establishment_year' => 2008,
                'members_count' => 35,
                'supervisor' => 'Dra. Rina Susanti, M.Sn',
                'contact_person' => 'Budi Santoso',
                'contact_email' => 'tari@ukm.udinus.ac.id',
                'contact_phone' => '0817-9012-3456',
                'instagram' => '@ukmtariudinus',
                'website' => 'https://tari.ukm.udinus.ac.id',
                'activities' => 'Latihan rutin setiap Jumat & Sabtu, 16.00 - 18.00 WIB. Performance tari dalam berbagai acara universitas. Partisipasi dalam festival tari tingkat nasional. Workshop tari untuk anggota baru.',
                'facilities' => 'Studio tari, sound system, kostum, ruang ganti, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Penelitian',
                'description' => 'Unit kegiatan mahasiswa yang mendorong minat dan bakat dalam bidang penelitian ilmiah.',
                'category_id' => $penalaranCategory->id,
                'establishment_year' => 2006,
                'members_count' => 40,
                'supervisor' => 'Dr. Ir. Andi Pratama, M.T',
                'contact_person' => 'Ahmad Fauzi',
                'contact_email' => 'penelitian@ukm.udinus.ac.id',
                'contact_phone' => '0818-0123-4567',
                'instagram' => '@ukmpenelitianudinus',
                'website' => 'https://penelitian.ukm.udinus.ac.id',
                'activities' => 'Workshop metodologi penelitian. Bimbingan penulisan karya ilmiah. Partisipasi dalam kompetisi penelitian mahasiswa. Seminar hasil penelitian. Kolaborasi penelitian dengan dosen.',
                'facilities' => 'Ruang seminar, perpustakaan referensi, akses jurnal online, laboratorium komputer, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Debat',
                'description' => 'Wadah bagi mahasiswa yang ingin mengasah kemampuan berpikir kritis dan berargumentasi.',
                'category_id' => $penalaranCategory->id,
                'establishment_year' => 2007,
                'members_count' => 25,
                'supervisor' => 'Dr. Siti Nurhaliza, M.Hum',
                'contact_person' => 'Rina Susanti',
                'contact_email' => 'debat@ukm.udinus.ac.id',
                'contact_phone' => '0819-1234-5678',
                'instagram' => '@ukmdebatudinus',
                'website' => 'https://debat.ukm.udinus.ac.id',
                'activities' => 'Latihan debat rutin setiap Rabu & Jumat, 19.00 - 21.00 WIB. Partisipasi dalam kompetisi debat antar universitas. Workshop teknik debat dan public speaking. Diskusi isu-isu terkini.',
                'facilities' => 'Rangka debat, perpustakaan referensi, akses internet, kantor sekretariat.',
            ],
            [
                'name' => 'UKM Rohani Islam (ROHIS)',
                'description' => 'Unit kegiatan mahasiswa yang membina kerohanian Islam bagi mahasiswa Muslim UDINUS.',
                'category_id' => $keagamaanCategory->id,
                'establishment_year' => 2003,
                'members_count' => 60,
                'supervisor' => 'Dr. H. Budi Santoso, M.Ag',
                'contact_person' => 'Ahmad Fauzi',
                'contact_email' => 'rohis@ukm.udinus.ac.id',
                'contact_phone' => '0821-2345-6789',
                'instagram' => '@ukmrohisudinus',
                'website' => 'https://rohis.ukm.udinus.ac.id',
                'activities' => 'Kajian Islam rutin setiap Senin & Kamis, 19.00 - 20.30 WIB. Pengajian Al-Quran. Tausiyah dan ceramah agama. Buka bersama saat Ramadhan. Bakti sosial.',
                'facilities' => 'Mushola, ruang kegiatan, perpustakaan agama, kantor sekretariat.',
            ],
            [
                'name' => 'UKM PMKRI',
                'description' => 'Perhimpunan Mahasiswa Katolik Republik Indonesia sebagai wadah pengembangan spiritual mahasiswa Katolik.',
                'category_id' => $keagamaanCategory->id,
                'establishment_year' => 2005,
                'members_count' => 30,
                'supervisor' => 'Rm. Dr. Andi Pratama, Pr',
                'contact_person' => 'Siti Nurhaliza',
                'contact_email' => 'pmkri@ukm.udinus.ac.id',
                'contact_phone' => '0822-3456-7890',
                'instagram' => '@ukmpmkriudinus',
                'website' => 'https://pmkri.ukm.udinus.ac.id',
                'activities' => 'Perayaan Ekaristi rutin. Katekisasi dan retret. Bakti sosial. Diskusi isu-isu sosial. Kerjasama dengan paroki.',
                'facilities' => 'Kapel, ruang kegiatan, perpustakaan agama, kantor sekretariat.',
            ],
            [
                'name' => 'Wartadinus',
                'description' => 'Lembaga pers kampus yang menyajikan berbagai informasi dan berita seputar UDINUS.',
                'category_id' => $persCategory->id,
                'establishment_year' => 2002,
                'members_count' => 45,
                'supervisor' => 'Dr. Rina Susanti, M.Si',
                'contact_person' => 'Budi Santoso',
                'contact_email' => 'wartadinus@ukm.udinus.ac.id',
                'contact_phone' => '0823-4567-8901',
                'instagram' => '@wartadinus',
                'website' => 'https://wartadinus.udinus.ac.id',
                'activities' => 'Penerbitan majalah dan bulletin kampus. Peliputan acara universitas. Workshop jurnalistik dan fotografi. Wawancara tokoh kampus. Peliputan isu-isu terkini.',
                'facilities' => 'Redaksi, studio foto, peralatan jurnalistik, ruang rapat, kantor sekretariat.',
            ],
            [
                'name' => 'BEM UDINUS',
                'description' => 'Badan Eksekutif Mahasiswa yang merupakan organisasi kemahasiswaan di tingkat universitas.',
                'category_id' => $ormawaCategory->id,
                'establishment_year' => 2001,
                'members_count' => 25,
                'supervisor' => 'Dr. Ahmad Fauzi, M.T',
                'contact_person' => 'Andi Pratama',
                'contact_email' => 'bem@udinus.ac.id',
                'contact_phone' => '0824-5678-9012',
                'instagram' => '@bemudinus',
                'website' => 'https://bem.udinus.ac.id',
                'activities' => 'Koordinasi kegiatan kemahasiswaan. Advokasi mahasiswa. Pengembangan soft skill mahasiswa. Kerjasama dengan pihak eksternal. Pengelolaan dana kemahasiswaan.',
                'facilities' => 'Kantor BEM, ruang rapat, ruang kerja, aula, kantor sekretariat.',
            ],
        ];

        foreach ($ukms as $ukm) {
            Ukm::create($ukm);
        }
    }
}