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
    
    .ukm-card {
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }
    
    .ukm-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .ukm-card:hover .ukm-image {
        transform: scale(1.1);
    }
    
    .ukm-image {
        transition: transform 0.5s ease;
        height: 220px;
        background-size: cover;
        background-position: center;
    }
    
    .ukm-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 60%, rgba(0, 0, 0, 0.7));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .ukm-card:hover .ukm-overlay {
        opacity: 1;
    }
    
    .ukm-category {
        transition: all 0.3s ease;
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
    
    .filter-section {
        position: sticky;
        top: 0;
        z-index: 10;
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
    
    .category-badge {
        transition: all 0.3s ease;
    }
    
    .ukm-card:hover .category-badge {
        transform: translateY(-5px);
    }
    
    .detail-link {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .ukm-card:hover .detail-link {
        transform: translateX(5px);
    }
    
    .detail-link i {
        transition: transform 0.3s ease;
    }
    
    .ukm-card:hover .detail-link i {
        transform: translateX(3px);
    }
    
    /* Category Colors */
    .olahraga { background: linear-gradient(45deg, #3b82f6, #2563eb); }
    .seni { background: linear-gradient(45deg, #8b5cf6, #7c3aed); }
    .penalaran { background: linear-gradient(45deg, #f59e0b, #d97706); }
    .keagamaan { background: linear-gradient(45deg, #10b981, #059669); }
    .pers { background: linear-gradient(45deg, #ef4444, #dc2626); }
    .ormawa { background: linear-gradient(45deg, #06b6d4, #0891b2); }
    
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
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">UKM & ORMAWA</h1>
        <p class="max-w-2xl mx-auto text-xl text-blue-100">
            Temukan Unit Kegiatan Mahasiswa dan Organisasi Kemahasiswaan yang sesuai dengan minat Anda
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

<!-- Filter Section -->
<div class="filter-section py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="w-full md:w-auto">
                <h2 class="text-lg font-medium text-gray-900 flex items-center">
                    <i class="fas fa-filter mr-2 text-udinus-blue"></i> Kategori
                </h2>
            </div>
            <div class="flex flex-wrap gap-2 justify-center">
                <button class="category-filter active px-4 py-2 rounded-full text-sm font-medium" data-category="all">
                    <i class="fas fa-th mr-2"></i> Semua
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="olahraga">
                    <i class="fas fa-running mr-2"></i> Olahraga
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="seni">
                    <i class="fas fa-palette mr-2"></i> Seni
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="penalaran">
                    <i class="fas fa-brain mr-2"></i> Penalaran & Keilmuan
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="keagamaan">
                    <i class="fas fa-pray mr-2"></i> Keagamaan
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="pers">
                    <i class="fas fa-newspaper mr-2"></i> Pers Kampus
                </button>
                <button class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-gray-200 text-gray-700" data-category="ormawa">
                    <i class="fas fa-users mr-2"></i> ORMAWA
                </button>
            </div>
        </div>
    </div>
</div>

<!-- UKM List Section -->
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3" id="ukm-container">
            <!-- UKM Card 1 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="olahraga" data-aos="fade-up" data-aos-delay="100">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Basket</h3>
                    <p class="text-gray-600 mb-4">
                        Unit kegiatan mahasiswa yang berfokus pada pengembangan bakat dalam olahraga basket.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge olahraga text-white px-3 py-1 rounded-full text-xs font-medium">
                            Olahraga
                        </span>
                        <a href="{{ route('ukm.show', 1) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 2 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="olahraga" data-aos="fade-up" data-aos-delay="200">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1519862174741-eb1e0bed28fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Futsal</h3>
                    <p class="text-gray-600 mb-4">
                        Wadah bagi mahasiswa yang memiliki minat dan bakat dalam olahraga futsal.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge olahraga text-white px-3 py-1 rounded-full text-xs font-medium">
                            Olahraga
                        </span>
                        <a href="{{ route('ukm.show', 2) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 3 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="olahraga" data-aos="fade-up" data-aos-delay="300">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1591696410794-80d2876e6a5d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Bulu Tangkis</h3>
                    <p class="text-gray-600 mb-4">
                        Unit kegiatan mahasiswa untuk mengembangkan bakat dalam olahraga bulu tangkis.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge olahraga text-white px-3 py-1 rounded-full text-xs font-medium">
                            Olahraga
                        </span>
                        <a href="{{ route('ukm.show', 3) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 4 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="seni" data-aos="fade-up" data-aos-delay="400">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Paduan Suara</h3>
                    <p class="text-gray-600 mb-4">
                        Wadah bagi mahasiswa yang memiliki minat dalam seni vokal dan paduan suara.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge seni text-white px-3 py-1 rounded-full text-xs font-medium">
                            Seni
                        </span>
                        <a href="{{ route('ukm.show', 4) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 5 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="seni" data-aos="fade-up" data-aos-delay="500">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1518676590629-3dcbd9c5a5c9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Teater</h3>
                    <p class="text-gray-600 mb-4">
                        Unit kegiatan mahasiswa yang menyalurkan minat dan bakat di bidang seni peran.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge seni text-white px-3 py-1 rounded-full text-xs font-medium">
                            Seni
                        </span>
                        <a href="{{ route('ukm.show', 5) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 6 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="seni" data-aos="fade-up" data-aos-delay="600">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1516214104703-d870798faf8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Tari</h3>
                    <p class="text-gray-600 mb-4">
                        Wadah bagi mahasiswa yang memiliki minat dalam seni tari tradisional maupun modern.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge seni text-white px-3 py-1 rounded-full text-xs font-medium">
                            Seni
                        </span>
                        <a href="{{ route('ukm.show', 6) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 7 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="penalaran" data-aos="fade-up" data-aos-delay="700">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Penelitian</h3>
                    <p class="text-gray-600 mb-4">
                        Unit kegiatan mahasiswa yang mendorong minat dan bakat dalam bidang penelitian ilmiah.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge penalaran text-white px-3 py-1 rounded-full text-xs font-medium">
                            Penalaran & Keilmuan
                        </span>
                        <a href="{{ route('ukm.show', 7) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 8 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="penalaran" data-aos="fade-up" data-aos-delay="800">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Debat</h3>
                    <p class="text-gray-600 mb-4">
                        Wadah bagi mahasiswa yang ingin mengasah kemampuan berpikir kritis dan berargumentasi.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge penalaran text-white px-3 py-1 rounded-full text-xs font-medium">
                            Penalaran & Keilmuan
                        </span>
                        <a href="{{ route('ukm.show', 8) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 9 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="keagamaan" data-aos="fade-up" data-aos-delay="900">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1564979157741-7eda5fd5e70a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM Rohani Islam (ROHIS)</h3>
                    <p class="text-gray-600 mb-4">
                        Unit kegiatan mahasiswa yang membina kerohanian Islam bagi mahasiswa Muslim UDINUS.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge keagamaan text-white px-3 py-1 rounded-full text-xs font-medium">
                            Keagamaan
                        </span>
                        <a href="{{ route('ukm.show', 9) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 10 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="keagamaan" data-aos="fade-up" data-aos-delay="1000">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1532699123278-936d5d3cc5f0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">UKM PMKRI</h3>
                    <p class="text-gray-600 mb-4">
                        Perhimpunan Mahasiswa Katolik Republik Indonesia sebagai wadah pengembangan spiritual mahasiswa Katolik.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge keagamaan text-white px-3 py-1 rounded-full text-xs font-medium">
                            Keagamaan
                        </span>
                        <a href="{{ route('ukm.show', 10) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 11 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="pers" data-aos="fade-up" data-aos-delay="1100">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1504711331083-29c6ca338f4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Wartadinus</h3>
                    <p class="text-gray-600 mb-4">
                        Lembaga pers kampus yang menyajikan berbagai informasi dan berita seputar UDINUS.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge pers text-white px-3 py-1 rounded-full text-xs font-medium">
                            Pers Kampus
                        </span>
                        <a href="{{ route('ukm.show', 11) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 12 -->
            <div class="ukm-card bg-white rounded-2xl shadow-lg fade-in" data-category="ormawa" data-aos="fade-up" data-aos-delay="1200">
                <div class="ukm-image" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="ukm-overlay"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">BEM UDINUS</h3>
                    <p class="text-gray-600 mb-4">
                        Badan Eksekutif Mahasiswa yang merupakan organisasi kemahasiswaan di tingkat universitas.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="category-badge ormawa text-white px-3 py-1 rounded-full text-xs font-medium">
                            ORMAWA
                        </span>
                        <a href="{{ route('ukm.show', 12) }}" class="detail-link text-udinus-blue hover:text-blue-700 font-medium">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
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
            <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada hasil</h3>
            <p class="text-gray-500">Coba pilih kategori lain untuk melihat UKM & ORMAWA yang tersedia</p>
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
        const ukmCards = document.querySelectorAll('.ukm-card');
        const noResults = document.getElementById('no-results');
        
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
                    
                    // Filter UKM cards
                    let visibleCount = 0;
                    
                    ukmCards.forEach(card => {
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
    });
</script>
@endsection