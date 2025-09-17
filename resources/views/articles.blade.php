@extends('layouts.app')

@section('styles')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    /* Custom Animations */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }
    
    /* Custom Classes */
    .gradient-bg {
        background: linear-gradient(-45deg, #005BAC, #0078d4, #00a2ed, #004c99);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }
    
    .header-pattern {
        background-color: rgba(0, 91, 172, 0.9);
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .article-card {
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }
    
    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .article-card:hover .article-image {
        transform: scale(1.05);
    }
    
    .article-image {
        transition: transform 0.5s ease;
        height: 220px;
        background-size: cover;
        background-position: center;
    }
    
    .article-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 60%, rgba(0, 0, 0, 0.7));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .article-card:hover .article-overlay {
        opacity: 1;
    }
    
    .category-badge {
        transition: all 0.3s ease;
    }
    
    .article-card:hover .category-badge {
        transform: translateY(-5px);
    }
    
    .filter-section {
        position: sticky;
        top: 0;
        z-index: 10;
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .category-filter {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .category-filter::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .category-filter:hover::before {
        left: 100%;
    }
    
    .category-filter.active {
        background: linear-gradient(45deg, #005BAC, #0078d4);
        color: white;
        transform: scale(1.05);
    }
    
    .search-container {
        position: relative;
        overflow: hidden;
    }
    
    .search-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 91, 172, 0.1), transparent);
        transform: translateX(-100%);
        transition: transform 0.5s ease;
    }
    
    .search-container:focus-within::before {
        transform: translateX(100%);
    }
    
    .search-input {
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        box-shadow: 0 0 0 3px rgba(0, 91, 172, 0.2);
    }
    
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    
    .text-gradient {
        background: linear-gradient(to right, #005BAC, #00a2ed);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .detail-link {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .article-card:hover .detail-link {
        transform: translateX(5px);
    }
    
    .detail-link i {
        transition: transform 0.3s ease;
    }
    
    .article-card:hover .detail-link i {
        transform: translateX(3px);
    }
    
    .pagination {
        transition: all 0.3s ease;
    }
    
    .pagination a {
        transition: all 0.3s ease;
    }
    
    .pagination a:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .pagination .active {
        background: linear-gradient(45deg, #005BAC, #0078d4);
    }
    
    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite;
    }
    
    /* Category Colors */
    .berita { background: linear-gradient(45deg, #f59e0b, #d97706); }
    .kegiatan { background: linear-gradient(45deg, #10b981, #059669); }
    .wartadinus { background: linear-gradient(45deg, #3b82f6, #2563eb); }
    .prestasi { background: linear-gradient(45deg, #8b5cf6, #7c3aed); }
    
    /* Loading Animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    /* Fade in animation */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    .fade-in.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Dark mode styles */
    body.dark-mode .bg-white {
        background-color: #2d3748;
    }
    
    body.dark-mode .text-gray-900 {
        color: #e2e8f0;
    }
    
    body.dark-mode .text-gray-700 {
        color: #cbd5e0;
    }
    
    body.dark-mode .text-gray-600 {
        color: #a0aec0;
    }
    
    body.dark-mode .text-gray-500 {
        color: #718096;
    }
    
    body.dark-mode .bg-gray-50 {
        background-color: #2d3748;
    }
    
    body.dark-mode .bg-gray-200 {
        background-color: #4a5568;
    }
    
    body.dark-mode .border-gray-300 {
        border-color: #4a5568;
    }
</style>
@endsection

@section('content')
<!-- Header Section -->
<div class="gradient-bg header-pattern text-white py-16 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-64 h-64 rounded-full bg-white opacity-10 blur-3xl floating"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 rounded-full bg-white opacity-10 blur-3xl floating" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 w-80 h-80 rounded-full bg-white opacity-5 blur-3xl floating" style="animation-delay: 4s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">Artikel</h1>
        <p class="max-w-2xl mx-auto text-xl text-blue-100">
            Berita dan informasi terkini seputar UDINUS
        </p>
        
        <div class="mt-8 flex justify-center">
            <div class="floating">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filter Section -->
<div class="filter-section py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="w-full md:w-1/3">
                <div class="search-container relative rounded-md shadow-sm">
                    <input type="text" id="search-input" class="search-input focus:ring-udinus-blue focus:border-udinus-blue block w-full pr-10 sm:text-sm border-gray-300 rounded-md" placeholder="Cari artikel...">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 justify-center">
                <button class="category-filter active px-4 py-2 rounded-full text-sm font-medium" data-category="all">
                    <i class="fas fa-th mr-2"></i> Semua
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="berita">
                    <i class="fas fa-newspaper mr-2"></i> Berita Kampus
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="kegiatan">
                    <i class="fas fa-calendar-alt mr-2"></i> Kegiatan Mahasiswa
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="wartadinus">
                    <i class="fas fa-pen-fancy mr-2"></i> Wartadinus
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="prestasi">
                    <i class="fas fa-trophy mr-2"></i> Prestasi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Articles List Section -->
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" id="articles-container">
            <!-- Article Card 1 -->
            <div class="article-card bg-white rounded-2xl shadow-lg overflow-hidden fade-in" data-category="berita" data-aos="fade-up" data-aos-delay="100">
                <div class="article-image" style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="article-overlay"></div>
                </div>
                <div class="p-6">
                    <span class="category-badge berita text-white px-3 py-1 rounded-full text-xs font-medium inline-block">
                        Berita Kampus
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">UDINUS Raih Peringkat Terbaik dalam Pemeringkatan Kampus</h3>
                    <p class="text-gray-600 mb-4">
                        Universitas Dian Nuswantoro kembali meraih prestasi membanggakan dalam pemeringkatan kampus terbaik di Indonesia versi terbaru...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-clock mr-1"></i> 3 hari yang lalu
                        </span>
                        <a href="{{ route('articles.show', 1) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="article-card bg-white rounded-2xl shadow-lg overflow-hidden fade-in" data-category="kegiatan" data-aos="fade-up" data-aos-delay="200">
                <div class="article-image" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="article-overlay"></div>
                </div>
                <div class="p-6">
                    <span class="category-badge kegiatan text-white px-3 py-1 rounded-full text-xs font-medium inline-block">
                        Kegiatan Mahasiswa
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">Festival Kreativitas Mahasiswa UDINUS 2023 Sukses Digelar</h3>
                    <p class="text-gray-600 mb-4">
                        Festival Kreativitas Mahasiswa (FKM) UDINUS tahun 2023 berhasil digelar dengan meriah dan diikuti oleh ratusan mahasiswa dari berbagai jurusan...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-clock mr-1"></i> 1 minggu yang lalu
                        </span>
                        <a href="{{ route('articles.show', 2) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article Card 3 -->
            <div class="article-card bg-white rounded-2xl shadow-lg overflow-hidden fade-in" data-category="wartadinus" data-aos="fade-up" data-aos-delay="300">
                <div class="article-image" style="background-image: url('https://images.unsplash.com/photo-1504711331083-29c6ca338f4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="article-overlay"></div>
                </div>
                <div class="p-6">
                    <span class="category-badge wartadinus text-white px-3 py-1 rounded-full text-xs font-medium inline-block">
                        Wartadinus
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">Tips Menjalani Perkuliahan Online dengan Efektif</h3>
                    <p class="text-gray-600 mb-4">
                        Di era digital seperti sekarang, perkuliahan online menjadi bagian yang tidak terpisahkan dari kehidupan mahasiswa. Berikut adalah beberapa tips untuk menjalani perkuliahan online...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-clock mr-1"></i> 2 minggu yang lalu
                        </span>
                        <a href="{{ route('articles.show', 3) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article Card 4 -->
            <div class="article-card bg-white rounded-2xl shadow-lg overflow-hidden fade-in" data-category="prestasi" data-aos="fade-up" data-aos-delay="400">
                <div class="article-image" style="background-image: url('https://images.unsplash.com/photo-1532699123278-936d5d3cc5f0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="article-overlay"></div>
                </div>
                <div class="p-6">
                    <span class="category-badge prestasi text-white px-3 py-1 rounded-full text-xs font-medium inline-block">
                        Prestasi
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">Tim Robotik UDINUS Sabet Juara 1 dalam Kompetisi Nasional</h3>
                    <p class="text-gray-600 mb-4">
                        Tim robotik UDINUS kembali menorehkan prestasi gemilang dengan meraih juara 1 dalam Kompetisi Robotik Nasional yang diikuti oleh lebih dari 100 perguruan tinggi...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-clock mr-1"></i> 3 minggu yang lalu
                        </span>
                        <a href="{{ route('articles.show', 4) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article Card 5 -->
            <div class="article-card bg-white rounded-2xl shadow-lg overflow-hidden fade-in" data-category="berita" data-aos="fade-up" data-aos-delay="500">
                <div class="article-image" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="article-overlay"></div>
                </div>
                <div class="p-6">
                    <span class="category-badge berita text-white px-3 py-1 rounded-full text-xs font-medium inline-block">
                        Berita Kampus
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">UDINUS Buka Program Studi Baru di Bidang AI</h3>
                    <p class="text-gray-600 mb-4">
                        Universitas Dian Nuswantoro resmi membuka program studi baru di bidang Artificial Intelligence (AI) untuk menjawab kebutuhan industri di era revolusi industri 4.0...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-clock mr-1"></i> 1 bulan yang lalu
                        </span>
                        <a href="{{ route('articles.show', 5) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Article Card 6 -->
            <div class="article-card bg-white rounded-2xl shadow-lg overflow-hidden fade-in" data-category="kegiatan" data-aos="fade-up" data-aos-delay="600">
                <div class="article-image" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="article-overlay"></div>
                </div>
                <div class="p-6">
                    <span class="category-badge kegiatan text-white px-3 py-1 rounded-full text-xs font-medium inline-block">
                        Kegiatan Mahasiswa
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">Seminar Nasional "Digital Transformation in Industry 4.0"</h3>
                    <p class="text-gray-600 mb-4">
                        Himpunan Mahasiswa Teknik Informatika UDINUS menggelar Seminar Nasional dengan tema "Digital Transformation in Industry 4.0" yang menghadirkan pembicara dari berbagai perusahaan teknologi...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-clock mr-1"></i> 1 bulan yang lalu
                        </span>
                        <a href="{{ route('articles.show', 6) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- No Results Message -->
        <div id="no-results" class="hidden text-center py-12">
            <div class="inline-block p-4 bg-gray-100 rounded-full mb-4">
                <i class="fas fa-search text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada artikel ditemukan</h3>
            <p class="text-gray-500">Coba gunakan kata kunci lain atau pilih kategori berbeda</p>
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center" data-aos="fade-up">
            <nav class="pagination relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    1
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    3
                </a>
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                    ...
                </span>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    8
                </a>
                <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>
</div>

<!-- Featured Articles Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Artikel Populer</h2>
            <div class="w-24 h-1 bg-udinus-blue mx-auto my-4"></div>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Artikel yang paling banyak dibaca oleh pengguna
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Featured Article 1 -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            #1
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-udinus-blue mb-2">
                        Berita Kampus
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">UDINUS Raih Peringkat Terbaik dalam Pemeringkatan Kampus</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Universitas Dian Nuswantoro kembali meraih prestasi membanggakan dalam pemeringkatan kampus terbaik di Indonesia...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">3 hari yang lalu</span>
                        <a href="{{ route('articles.show', 1) }}" class="text-udinus-blue hover:text-blue-700 text-sm font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Featured Article 2 -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            #2
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-2">
                        Kegiatan Mahasiswa
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Festival Kreativitas Mahasiswa UDINUS 2023 Sukses Digelar</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Festival Kreativitas Mahasiswa (FKM) UDINUS tahun 2023 berhasil digelar dengan meriah dan diikuti oleh ratusan mahasiswa...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">1 minggu yang lalu</span>
                        <a href="{{ route('articles.show', 2) }}" class="text-udinus-blue hover:text-blue-700 text-sm font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Featured Article 3 -->
            <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="relative">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            #3
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-udinus-blue mb-2">
                        Wartadinus
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Tips Menjalani Perkuliahan Online dengan Efektif</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Di era digital seperti sekarang, perkuliahan online menjadi bagian yang tidak terpisahkan dari kehidupan mahasiswa...
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">2 minggu yang lalu</span>
                        <a href="{{ route('articles.show', 3) }}" class="text-udinus-blue hover:text-blue-700 text-sm font-medium">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Berlangganan Newsletter Kami</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-blue-100">
                Dapatkan artikel terbaru dan informasi penting seputar UDINUS langsung di email Anda
            </p>
            <div class="mt-8 max-w-md mx-auto">
                <form class="sm:flex">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input type="email" name="email-address" id="email-address" autocomplete="email" required class="w-full px-5 py-3 border border-transparent rounded-md placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500 focus:ring-white" placeholder="your.email@example.com">
                    <button type="submit" class="mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500 focus:ring-white sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
        
        // Fade in animation for cards
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
        
        // Category filter functionality
        const categoryButtons = document.querySelectorAll('.category-filter');
        const articleCards = document.querySelectorAll('.article-card');
        const searchInput = document.getElementById('search-input');
        const noResults = document.getElementById('no-results');

        // Category filter
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update button styles
                categoryButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });
                this.classList.add('active');
                this.classList.remove('bg-gray-200', 'text-gray-700');
                
                // Add loading animation
                this.innerHTML = '<span class="loading"></span> Memuat...';
                
                // Simulate loading delay
                setTimeout(() => {
                    // Restore button content
                    const category = this.getAttribute('data-category');
                    const icon = this.querySelector('i').className;
                    const text = this.textContent.trim().replace('Memuat...', '').trim();
                    this.innerHTML = `<i class="${icon} mr-2"></i> ${text}`;
                    
                    // Filter article cards
                    let visibleCount = 0;
                    
                    articleCards.forEach(card => {
                        if (category === 'all' || card.getAttribute('data-category') === category) {
                            card.style.display = 'block';
                            visibleCount++;
                            
                            // Add animation when card becomes visible
                            setTimeout(() => {
                                card.classList.add('active');
                            }, 100);
                        } else {
                            card.style.display = 'none';
                            card.classList.remove('active');
                        }
                    });
                    
                    // Show/hide no results message
                    if (visibleCount === 0) {
                        noResults.classList.remove('hidden');
                    } else {
                        noResults.classList.add('hidden');
                    }
                }, 500);
            });
        });

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            if (searchTerm.length > 2) {
                articleCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const description = card.querySelector('p').textContent.toLowerCase();
                    
                    if (title.includes(searchTerm) || description.includes(searchTerm)) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.classList.add('active');
                        }, 100);
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('active');
                    }
                });
                
                // Check if any cards are visible
                const visibleCards = Array.from(articleCards).filter(card => card.style.display !== 'none');
                if (visibleCards.length === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            } else {
                // Show all cards if search term is too short
                articleCards.forEach(card => {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.classList.add('active');
                    }, 100);
                });
                noResults.classList.add('hidden');
            }
        });
    });
</script>
@endsection