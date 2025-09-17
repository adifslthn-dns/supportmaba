<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beritaCategory = Category::where('slug', 'berita-kampus')->first();
        $kegiatanCategory = Category::where('slug', 'kegiatan-mahasiswa')->first();
        $wartadinusCategory = Category::where('slug', 'wartadinus')->first();
        $prestasiCategory = Category::where('slug', 'prestasi')->first();

        $articles = [
            [
                'title' => 'UDINUS Raih Peringkat Terbaik dalam Pemeringkatan Kampus',
                'content' => '<p>Universitas Dian Nuswantoro (UDINUS) kembali meraih prestasi membanggakan dalam pemeringkatan kampus terbaik di Indonesia. Dalam rilis terbaru dari lembaga pemeringkatan pendidikan tinggi, UDINUS berhasil menempati peringkat 10 besar untuk kategori universitas swasta terbaik di Indonesia.</p>
                <p>Pencapaian ini merupakan bukti komitmen UDINUS dalam memberikan pendidikan berkualitas dan relevan dengan kebutuhan industri. Rektor UDINUS, Prof. Dr. Ir. Edi Noersasongko, M.Kom., menyampaikan rasa syukur atas pencapaian ini.</p>
                <blockquote>"Ini adalah hasil kerja keras dari seluruh sivitas akademika UDINUS. Kami akan terus berkomitmen untuk meningkatkan kualitas pendidikan, penelitian, dan pengabdian kepada masyarakat," ujar Prof. Edi.</blockquote>
                <p>Dalam pemeringkatan ini, UDINUS mendapatkan nilai tinggi dalam beberapa indikator, antara lain kualitas proses pembelajaran, kualitas lulusan, reputasi perguruan tinggi, dan publikasi ilmiah. Khusus untuk publikasi ilmiah, UDINUS menunjukkan peningkatan yang signifikan dalam beberapa tahun terakhir.</p>',
                'category_id' => $beritaCategory->id,
                'author' => 'Ahmad Fauzi',
                'published_at' => '2023-10-15',
                'tags' => 'UDINUS, pemeringkatan kampus, prestasi, pendidikan',
            ],
            [
                'title' => 'Festival Kreativitas Mahasiswa UDINUS 2023 Sukses Digelar',
                'content' => '<p>Festival Kreativitas Mahasiswa (FKM) UDINUS tahun 2023 berhasil digelar dengan meriah dan diikuti oleh ratusan mahasiswa dari berbagai jurusan. Acara yang berlangsung selama tiga hari ini menampilkan berbagai karya kreatif mahasiswa dalam bidang seni, teknologi, dan kewirausahaan.</p>
                <p>Ketua panitia FKM 2023, Budi Santoso, menyatakan bahwa tahun ini jumlah peserta meningkat 20% dibandingkan tahun sebelumnya. "Antusiasme mahasiswa sangat tinggi tahun ini. Kami melihat banyak karya inovatif yang ditampilkan," ujarnya.</p>
                <p>FKM 2023 mengusung tema "Inovasi dan Kreativitas untuk Indonesia Maju". Dalam festival ini, terdapat berbagai lomba seperti pameran karya inovasi, lomba bisnis plan, lomba desain grafis, lomba fotografi, dan lomba film pendek.</p>
                <p>Wakil Rektor III Bidang Kemahasiswaan, Dr. Ir. Siti Nurhaliza, M.T., dalam sambutannya mengapresiasi penyelenggaraan FKM 2023. "Kegiatan seperti ini sangat penting untuk mengasah kreativitas dan inovasi mahasiswa. UDINUS akan terus mendukung kegiatan positif seperti ini," katanya.</p>',
                'category_id' => $kegiatanCategory->id,
                'author' => 'Siti Nurhaliza',
                'published_at' => '2023-10-08',
                'tags' => 'FKM, festival, kreativitas, inovasi, mahasiswa',
            ],
            [
                'title' => 'Tips Menjalani Perkuliahan Online dengan Efektif',
                'content' => '<p>Di era digital seperti sekarang, perkuliahan online menjadi bagian yang tidak terpisahkan dari kehidupan mahasiswa. Meskipun memiliki fleksibilitas yang lebih tinggi, perkuliahan online juga menuntut kedisiplinan dan kemampuan manajemen waktu yang baik. Berikut adalah beberapa tips untuk menjalani perkuliahan online secara efektif.</p>
                <h3>1. Buat Jadwal yang Teratur</h3>
                <p>Membuat jadwal yang teratur sangat penting dalam perkuliahan online. Tentukan waktu khusus untuk belajar, mengerjakan tugas, dan istirahat. Dengan jadwal yang teratur, Anda dapat menghindari prokrastinasi dan memastikan semua tugas selesai tepat waktu.</p>
                <h3>2. Cari Tempat Belajar yang Nyaman</h3>
                <p>Tempat belajar yang nyaman dan bebas gangguan akan meningkatkan konsentrasi Anda. Pastikan tempat belajar Anda memiliki pencahayaan yang baik dan sinyal internet yang stabil.</p>
                <h3>3. Aktif dalam Kelas Online</h3>
                <p>Meskipun belajar dari jarak jauh, tetaplah aktif dalam kelas online. Ajukan pertanyaan jika ada materi yang tidak dipahami dan berpartisipasi dalam diskusi. Ini akan membantu Anda tetap terlibat dan lebih memahami materi.</p>
                <h3>4. Manfaatkan Sumber Belajar Online</h3>
                <p>Banyak sumber belajar online yang dapat Anda manfaatkan, seperti video tutorial, artikel ilmiah, dan forum diskusi. Manfaatkan sumber-sumber ini untuk memperdalam pemahaman Anda terhadap materi perkuliahan.</p>
                <h3>5. Jaga Kesehatan Fisik dan Mental</h3>
                <p>Perkuliahan online dapat menyebabkan kelelahan fisik dan mental jika tidak dikelola dengan baik. Pastikan Anda cukup istirahat, makan makanan bergizi, dan luangkan waktu untuk berolahraga. Jangan lupa juga untuk menjaga kesehatan mental dengan melakukan aktivitas yang Anda sukai.</p>',
                'category_id' => $wartadinusCategory->id,
                'author' => 'Rina Susanti',
                'published_at' => '2023-10-01',
                'tags' => 'perkuliahan online, tips belajar, efektif, mahasiswa',
            ],
            [
                'title' => 'Tim Robotik UDINUS Sabet Juara 1 dalam Kompetisi Nasional',
                'content' => '<p>Tim robotik UDINUS kembali menorehkan prestasi gemilang dengan meraih juara 1 dalam Kompetisi Robotik Nasional yang diselenggarakan di Jakarta pada 25-27 September 2023. Tim yang terdiri dari 5 mahasiswa Teknik Informatika ini berhasil mengalahkan 50 tim dari berbagai universitas di Indonesia.</p>
                <p>Dalam kompetisi ini, tim robotik UDINUS mengusung robot dengan kemampuan navigasi otomatis dan pengenalan objek menggunakan kecerdasan buatan. Robot ini dirancang untuk dapat memetakan area yang tidak diketahui dan menghindari rintangan secara mandiri.</p>
                <p>Ketua tim, Ahmad Fauzi, menyatakan bahwa persiapan untuk kompetisi ini memakan waktu 6 bulan. "Kami melakukan banyak riset dan pengembangan untuk mencapai hasil ini. Tentu saja kami sangat bangga dapat membawa nama UDINUS di tingkat nasional," ujarnya.</p>
                <p>Dekan Fakultas Ilmu Komputer, Dr. Ir. Budi Santoso, M.Kom., memberikan apresiasi atas pencapaian tim robotik UDINUS. "Ini adalah bukti bahwa mahasiswa UDINUS memiliki kemampuan yang mumpuni di bidang teknologi. Kami akan terus mendukung pengembangan inovasi dan teknologi di kampus kita," katanya.</p>
                <p>Selain juara 1, tim robotik UDINUS juga meraih penghargaan kategori Best Design dan Best Algorithm. Prestasi ini diharapkan dapat memotivasi mahasiswa lain untuk terus berinovasi dan berkarya di bidang teknologi.</p>',
                'category_id' => $prestasiCategory->id,
                'author' => 'Andi Pratama',
                'published_at' => '2023-09-28',
                'tags' => 'robotik, kompetisi, prestasi, juara, teknologi',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}