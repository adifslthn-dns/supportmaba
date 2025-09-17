@extends('layouts.app')

@section('content')
<!-- Header Section with Image -->
<div class="relative h-64 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://via.placeholder.com/1200x400?text=Article+Detail')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="text-white">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 mb-2">
                Berita Kampus
            </span>
            <h1 class="text-3xl font-extrabold sm:text-4xl">UDINUS Raih Peringkat Terbaik dalam Pemeringkatan Kampus</h1>
            <p class="mt-2 text-xl text-blue-100">Dipublikasikan pada 15 Oktober 2023</p>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-500">
                            <i class="fas fa-home"></i>
                            <span class="sr-only">Home</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('articles.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Artikel</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500">Berita Kampus</span>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-700" aria-current="page">UDINUS Raih Peringkat Terbaik</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Main Column -->
            <div class="lg:col-span-2">
                <!-- Article Content -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=Author" alt="Author">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Ahmad Fauzi</h4>
                                <p class="text-sm text-gray-500">Wartawan Wartadinus</p>
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <span><i class="far fa-calendar-alt mr-1"></i> 15 Oktober 2023</span>
                            <span class="mx-2">•</span>
                            <span><i class="far fa-clock mr-1"></i> 5 menit baca</span>
                            <span class="mx-2">•</span>
                            <span><i class="far fa-eye mr-1"></i> 1.2K views</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="prose max-w-none">
                            <p class="text-lg text-gray-700 mb-4">
                                Universitas Dian Nuswantoro (UDINUS) kembali meraih prestasi membanggakan dalam pemeringkatan kampus terbaik di Indonesia. Dalam rilis terbaru dari lembaga pemeringkatan pendidikan tinggi, UDINUS berhasil menempati peringkat 10 besar untuk kategori universitas swasta terbaik di Indonesia.
                            </p>
                            <p class="text-gray-700 mb-4">
                                Pencapaian ini merupakan bukti komitmen UDINUS dalam memberikan pendidikan berkualitas dan relevan dengan kebutuhan industri. Rektor UDINUS, Prof. Dr. Ir. Edi Noersasongko, M.Kom., menyampaikan rasa syukur atas pencapaian ini.
                            </p>
                            <blockquote class="border-l-4 border-udinus-blue pl-4 italic text-gray-600 my-6">
                                "Ini adalah hasil kerja keras dari seluruh sivitas akademika UDINUS. Kami akan terus berkomitmen untuk meningkatkan kualitas pendidikan, penelitian, dan pengabdian kepada masyarakat," ujar Prof. Edi.
                            </blockquote>
                            <p class="text-gray-700 mb-4">
                                Dalam pemeringkatan ini, UDINUS mendapatkan nilai tinggi dalam beberapa indikator, antara lain kualitas proses pembelajaran, kualitas lulusan, reputasi perguruan tinggi, dan publikasi ilmiah. Khusus untuk publikasi ilmiah, UDINUS menunjukkan peningkatan yang signifikan dalam beberapa tahun terakhir.
                            </p>
                            <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-4">Faktor Pendukung Pencapaian UDINUS</h3>
                            <p class="text-gray-700 mb-4">
                                Beberapa faktor yang menjadi pendukung pencapaian UDINUS dalam pemeringkatan ini antara lain:
                            </p>
                            <ul class="list-disc pl-5 text-gray-700 mb-4">
                                <li>Kurikulum yang selalu diperbarui sesuai dengan perkembangan industri dan teknologi</li>
                                <li>Dosen yang berkualifikasi dan berpengalaman di bidangnya</li>
                                <li>Fasilitas pembelajaran yang memadai dan modern</li>
                                <li>Program pengembangan soft skill bagi mahasiswa</li>
                                <li>Kolaborasi dengan industri dan perguruan tinggi dalam dan luar negeri</li>
                            </ul>
                            <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-4">Tanggapan dari Mahasiswa dan Alumni</h3>
                            <p class="text-gray-700 mb-4">
                                Pencapaian ini juga mendapat tanggapan positif dari mahasiswa dan alumni UDINUS. Budi Santoso, mahasiswa semester 5 Teknik Informatika, mengaku bangga dengan pencapaian kampusnya.
                            </p>
                            <blockquote class="border-l-4 border-udinus-blue pl-4 italic text-gray-600 my-6">
                                "Saya bangga menjadi bagian dari UDINUS. Pencapaian ini memotivasi kami sebagai mahasiswa untuk terus berprestasi dan memberikan yang terbaik untuk almamater," kata Budi.
                            </blockquote>
                            <p class="text-gray-700 mb-4">
                                Sementara itu, Siti Nurhaliza, alumni UDINUS yang kini bekerja di perusahaan teknologi terkemuka, menambahkan bahwa pendidikan di UDINUS telah membekalinya dengan kompetensi yang dibutuhkan di dunia kerja.
                            </p>
                            <p class="text-gray-700 mb-4">
                                "Saya merasa sangat terbantu dengan kurikulum dan program pengembangan soft skill di UDINUS. Ini membuat saya siap menghadapi tantangan di dunia kerja," ujar Siti.
                            </p>
                            <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-4">Program Ke Depan</h3>
                            <p class="text-gray-700 mb-4">
                                Menyikapi pencapaian ini, UDINUS telah menyiapkan beberapa program ke depan untuk terus meningkatkan kualitas pendidikan. Beberapa program tersebut antara lain:
                            </p>
                            <ol class="list-decimal pl-5 text-gray-700 mb-4">
                                <li>Pengembangan program studi baru yang relevan dengan kebutuhan industri</li>
                                <li>Peningkatan kualitas penelitian dan publikasi ilmiah</li>
                                <li>Perluasan kerjasama dengan industri dan perguruan tinggi dalam dan luar negeri</li>
                                <li>Peningkatan kualitas layanan kepada mahasiswa</li>
                                <li>Pengembangan ekosistem inovasi dan kewirausahaan</li>
                            </ol>
                            <p class="text-gray-700 mb-4">
                                Dengan berbagai program ini, UDINUS optimis dapat mempertahankan bahkan meningkatkan peringkatnya di masa depan. Hal ini sejalan dengan visi UDINUS untuk menjadi universitas unggulan di tingkat nasional dan internasional.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Tags</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                UDINUS
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                Pemeringkatan Kampus
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                Prestasi
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                Pendidikan
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                Universitas Swasta
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Komentar (3)</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <!-- Comment 1 -->
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=User1" alt="User">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Andi Pratama</h4>
                                    <p class="text-sm text-gray-500 mb-2">2 hari yang lalu</p>
                                    <p class="text-sm text-gray-700">
                                        Selamat untuk UDINUS! Semoga terus meningkatkan kualitas pendidikannya dan menghasilkan lulusan yang kompetitif di dunia kerja.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Comment 2 -->
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=User2" alt="User">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Siti Nurhaliza</h4>
                                    <p class="text-sm text-gray-500 mb-2">1 hari yang lalu</p>
                                    <p class="text-sm text-gray-700">
                                        Bangga sekali menjadi bagian dari UDINUS. Terima kasih atas dedikasi seluruh sivitas akademika yang telah membuat UDINUS semakin berkualitas.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Comment 3 -->
                        <div class="px-4 py-5 sm:px-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=User3" alt="User">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Budi Santoso</h4>
                                    <p class="text-sm text-gray-500 mb-2">12 jam yang lalu</p>
                                    <p class="text-sm text-gray-700">
                                        Semoga UDINUS bisa terus berinovasi dan berkolaborasi dengan industri untuk menghasilkan lulusan yang siap kerja dan siap menghadapi tantangan di era digital.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Comment -->
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambahkan Komentar</h3>
                        <form>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" class="mt-1 focus:ring-udinus-blue focus:border-udinus-blue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 focus:ring-udinus-blue focus:border-udinus-blue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Komentar</label>
                                <textarea id="comment" name="comment" rows="4" class="mt-1 focus:ring-udinus-blue focus:border-udinus-blue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-udinus-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-udinus-blue">
                                    Kirim Komentar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Share Article -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Bagikan Artikel</h3>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-400 hover:text-blue-600">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-red-600 hover:text-red-800">
                                <i class="fab fa-pinterest text-xl"></i>
                            </a>
                            <a href="#" class="text-green-600 hover:text-green-800">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-link text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Related Articles -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Artikel Terkait</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <ul class="divide-y divide-gray-200">
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <img class="h-16 w-16 rounded-md object-cover" src="https://via.placeholder.com/100x100?text=Related1" alt="Related Article">
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-udinus-blue hover:text-blue-700">UDINUS Buka Program Studi Baru di Bidang AI</a>
                                        <p class="mt-1 text-sm text-gray-500">1 bulan yang lalu</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <img class="h-16 w-16 rounded-md object-cover" src="https://via.placeholder.com/100x100?text=Related2" alt="Related Article">
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-udinus-blue hover:text-blue-700">Festival Kreativitas Mahasiswa UDINUS 2023 Sukses Digelar</a>
                                        <p class="mt-1 text-sm text-gray-500">1 minggu yang lalu</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <img class="h-16 w-16 rounded-md object-cover" src="https://via.placeholder.com/100x100?text=Related3" alt="Related Article">
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-udinus-blue hover:text-blue-700">Tim Robotik UDINUS Sabet Juara 1 dalam Kompetisi Nasional</a>
                                        <p class="mt-1 text-sm text-gray-500">3 minggu yang lalu</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Popular Articles -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Artikel Populer</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <ul class="divide-y divide-gray-200">
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-udinus-blue text-white text-xs font-bold">1</span>
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-udinus-blue">Tips Menjalani Perkuliahan Online dengan Efektif</a>
                                        <p class="mt-1 text-sm text-gray-500">2.5K views</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-gray-300 text-white text-xs font-bold">2</span>
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-udinus-blue">Panduan Pemilihan UKM untuk Mahasiswa Baru</a>
                                        <p class="mt-1 text-sm text-gray-500">2.1K views</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-gray-400 text-white text-xs font-bold">3</span>
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-udinus-blue">Prospek Karier Lulusan Teknik Informatika UDINUS</a>
                                        <p class="mt-1 text-sm text-gray-500">1.8K views</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-gray-500 text-white text-xs font-bold">4</span>
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-udinus-blue">Program Beasiswa UDINUS Tahun Akademik 2023/2024</a>
                                        <p class="mt-1 text-sm text-gray-500">1.5K views</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-gray-600 text-white text-xs font-bold">5</span>
                                    </div>
                                    <div class="ml-4">
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-udinus-blue">Kegiatan Orientasi Studi dan Pengenalan Kampus (OSPEK) 2023</a>
                                        <p class="mt-1 text-sm text-gray-500">1.3K views</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection