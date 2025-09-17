@extends('layouts.app')

@section('styles')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
    /* Custom Animations */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.05); opacity: 0.8; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    
    /* Custom Classes */
    .gradient-bg {
        background: linear-gradient(-45deg, #005BAC, #0078d4, #00a2ed, #004c99);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
    }
    
    .delay-200 {
        animation-delay: 0.2s;
    }
    
    .delay-500 {
        animation-delay: 0.5s;
    }
    
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    
    .blob {
        animation: blob 7s infinite;
    }
    
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .text-gradient {
        background: linear-gradient(to right, #005BAC, #00a2ed);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .feature-icon {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .btn-primary {
        background: linear-gradient(45deg, #005BAC, #0078d4);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 91, 172, 0.3);
    }
    
    .btn-outline {
        transition: all 0.3s ease;
    }
    
    .btn-outline:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 255, 255, 0.3);
    }
    
    .testimonial-card {
        position: relative;
        overflow: hidden;
    }
    
    .testimonial-card::before {
        content: """;
        position: absolute;
        top: -20px;
        left: 10px;
        font-size: 150px;
        color: rgba(0, 91, 172, 0.1);
        font-family: serif;
    }
    
    .parallax {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .dark-mode-toggle {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        background: #005BAC;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .dark-mode-toggle:hover {
        transform: scale(1.1);
    }
    
    .counter {
        font-size: 3rem;
        font-weight: 700;
        color: #005BAC;
    }
    
    .ukm-card {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 400px;
        border-radius: 20px;
    }
    
    .ukm-card:hover .ukm-overlay {
        opacity: 1;
    }
    
    .ukm-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 91, 172, 0.9), transparent);
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        color: white;
    }
    
    /* Swiper Custom Styles */
    .swiper {
        width: 100%;
        height: 100%;
        padding: 0 0 50px 0;
    }
    
    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 400px;
        border-radius: 20px;
        overflow: hidden;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        color: #005BAC;
        background: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }
    
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 18px;
        font-weight: bold;
    }
    
    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #ccc;
        opacity: 0.5;
        transition: all 0.3s ease;
    }
    
    .swiper-pagination-bullet-active {
        background: #005BAC;
        opacity: 1;
        transform: scale(1.2);
    }
    
    .section-title {
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #005BAC, #00a2ed);
        border-radius: 2px;
    }
    
    /* Carousel Container */
    .carousel-container {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
    }
    
    .carousel-wrapper {
        display: flex;
        transition: transform 0.5s ease;
    }
    
    .carousel-item {
        min-width: 300px;
        margin-right: 20px;
    }
    
    /* Custom Horizontal Scroll */
    .horizontal-scroll {
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        padding: 20px 0;
        scrollbar-width: thin;
        scrollbar-color: #005BAC #f1f1f1;
    }
    
    .horizontal-scroll::-webkit-scrollbar {
        height: 8px;
    }
    
    .horizontal-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .horizontal-scroll::-webkit-scrollbar-thumb {
        background: #005BAC;
        border-radius: 10px;
    }
    
    .horizontal-scroll::-webkit-scrollbar-thumb:hover {
        background: #004c99;
    }
    
    .scroll-item {
        display: inline-block;
        width: 300px;
        margin-right: 20px;
        vertical-align: top;
        white-space: normal;
    }
    
    /* Dark mode styles */
    body.dark-mode {
        background-color: #1a202c;
        color: #e2e8f0;
    }
    
    body.dark-mode .bg-white {
        background-color: #2d3748;
    }
    
    body.dark-mode .text-gray-900 {
        color: #e2e8f0;
    }
    
    body.dark-mode .text-gray-600 {
        color: #cbd5e0;
    }
    
    body.dark-mode .text-gray-500 {
        color: #a0aec0;
    }
    
    body.dark-mode .bg-gray-50 {
        background-color: #2d3748;
    }
    
    body.dark-mode .swiper-button-next,
    body.dark-mode .swiper-button-prev {
        background: #2d3748;
        color: #63b3ed;
    }
    
    body.dark-mode .horizontal-scroll::-webkit-scrollbar-track {
        background: #2d3748;
    }
    
    body.dark-mode .horizontal-scroll::-webkit-scrollbar-thumb {
        background: #63b3ed;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="relative gradient-bg text-white overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse blob"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse blob" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse blob" style="animation-delay: 4s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-36 text-center">
        <h1 class="text-5xl text-blue-700 md:text-7xl font-extrabold tracking-tight animate-fade-in-up">
            #SUPORTMABA
        </h1>
        <p class="mt-6 max-w-xl mx-auto text-xl md:text-2xl text-blue-400 animate-fade-in-up delay-200">
            Supporting Mahasiswa Baru UDINUS dengan Cara yang Lebih Menyenangkan 🚀
        </p>
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up delay-500">
            <a href="{{ route('ukm.index') }}"
                class="border-blue-400 text-blue-400 px-8 py-3 rounded-full font-semibold shadow hover:shadow-lg hover:scale-105 transition transform duration-300">
                Jelajahi UKM & ORMAWA
            </a>
            <a href="{{ route('ai.recommendation') }}"
                class="btn-outline border-2 border-blue-400 text-blue-400 px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-udinus-blue transition transform duration-300">
                Cari Minat Bakat
            </a>
        </div>
        
        <div class="mt-16 flex justify-center animate-fade-in-up delay-700">
            <div class="floating">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-aos="fade-up">
            <div class="p-6">
                <div class="counter" data-target="50">0</div>
                <p class="text-gray-600 mt-2">UKM & ORMAWA</p>
            </div>
            <div class="p-6">
                <div class="counter" data-target="1000">0</div>
                <p class="text-gray-600 mt-2">Mahasiswa Aktif</p>
            </div>
            <div class="p-6">
                <div class="counter" data-target="200">0</div>
                <p class="text-gray-600 mt-2">Artikel</p>
            </div>
            <div class="p-6">
                <div class="counter" data-target="50">0</div>
                <p class="text-gray-600 mt-2">Kegiatan/Bulan</p>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-20 bg-gray-50 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/memphis-mini.png')]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-900 section-title">✨ Fitur Utama</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Semua yang kamu butuhkan untuk mengenal UDINUS lebih dekat
            </p>
        </div>

        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $features = [
                    ['icon'=>'fas fa-users','title'=>'UKM & ORMAWA','desc'=>'Temukan berbagai Unit Kegiatan Mahasiswa yang sesuai minatmu.','route'=>'ukm.index'],
                    ['icon'=>'fas fa-newspaper','title'=>'Artikel','desc'=>'Baca artikel menarik seputar kampus & mahasiswa.','route'=>'articles.index'],
                    ['icon'=>'fas fa-robot','title'=>'AI Minat Bakat','desc'=>'Gunakan AI untuk menemukan UKM/ORMAWA paling sesuai denganmu.','route'=>'ai.recommendation'],
                    ['icon'=>'fas fa-gamepad','title'=>'Game 3D','desc'=>'Jelajahi kampus UDINUS dalam mode 3D interaktif yang seru.','route'=>'game.3d']
                ];
            @endphp

            @foreach($features as $index => $f)
            <div class="feature-card bg-white rounded-2xl shadow-md hover:shadow-xl p-8 text-center transform hover:-translate-y-2 transition duration-500 group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="bg-udinus-blue group-hover:bg-indigo-500 transition duration-300 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 feature-icon">
                    <i class="{{ $f['icon'] }} text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $f['title'] }}</h3>
                <p class="text-gray-500 mb-4">{{ $f['desc'] }}</p>
                <a href="{{ route($f['route']) }}" class="inline-flex items-center text-udinus-blue hover:text-indigo-600 font-medium">
                    Lihat Selengkapnya <span class="ml-2">&rarr;</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- UKM Preview Section -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-900 section-title">UKM & ORMAWA Populer</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Beberapa UKM dan ORMAWA yang paling diminati di UDINUS
            </p>
        </div>

        <!-- Horizontal Scroll Container -->
        <div class="horizontal-scroll" data-aos="fade-up">
            <!-- UKM Card 1 -->
            <div class="scroll-item">
                <div class="ukm-card rounded-2xl overflow-hidden shadow-lg card-hover">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="ukm-overlay">
                        <span class="inline-block px-3 py-1 bg-blue-500 rounded-full text-xs font-medium mb-3">Olahraga</span>
                        <h3 class="text-xl font-bold mb-2">UKM Basket</h3>
                        <p class="text-sm opacity-90 mb-4">
                            Unit kegiatan mahasiswa yang berfokus pada pengembangan bakat dalam olahraga basket.
                        </p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('ukm.show', 1) }}" class="text-white hover:text-blue-200 font-medium flex items-center">
                                Detail <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UKM Card 2 -->
            <div class="scroll-item">
                <div class="ukm-card rounded-2xl overflow-hidden shadow-lg card-hover">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="ukm-overlay">
                        <span class="inline-block px-3 py-1 bg-purple-500 rounded-full text-xs font-medium mb-3">Seni</span>
                        <h3 class="text-xl font-bold mb-2">UKM Paduan Suara</h3>
                        <p class="text-sm opacity-90 mb-4">
                            Wadah bagi mahasiswa yang memiliki minat dalam seni vokal dan paduan suara.
                        </p>
                        <a href="{{ route('ukm.show', 2) }}" class="inline-flex items-center text-white font-medium">
                            Detail <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 3 -->
            <div class="scroll-item">
                <div class="ukm-card rounded-2xl overflow-hidden shadow-lg card-hover">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="ukm-overlay">
                        <span class="inline-block px-3 py-1 bg-green-500 rounded-full text-xs font-medium mb-3">ORMAWA</span>
                        <h3 class="text-xl font-bold mb-2">BEM UDINUS</h3>
                        <p class="text-sm opacity-90 mb-4">
                            Badan Eksekutif Mahasiswa yang merupakan organisasi kemahasiswaan di tingkat universitas.
                        </p>
                        <a href="{{ route('ukm.show', 3) }}" class="inline-flex items-center text-white font-medium">
                            Detail <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- UKM Card 4 -->
            <div class="scroll-item">
                <div class="ukm-card rounded-2xl overflow-hidden shadow-lg card-hover">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="ukm-overlay">
                        <span class="inline-block px-3 py-1 bg-red-500 rounded-full text-xs font-medium mb-3">Teknologi</span>
                        <h3 class="text-xl font-bold mb-2">UKM Robotik</h3>
                        <p class="text-sm opacity-90 mb-4">
                            Unit kegiatan mahasiswa yang berfokus pada pengembangan teknologi robotika dan AI.
                        </p>
                        <a href="{{ route('ukm.show', 4) }}" class="inline-flex items-center text-white font-medium">
                            Detail <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('ukm.index') }}" class="btn-primary px-8 py-3 rounded-full font-medium text-white inline-flex items-center">
                Lihat Semua UKM & ORMAWA <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<!-- Articles Preview Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-900 section-title">Artikel Terbaru</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Berita dan informasi terkini seputar UDINUS
            </p>
        </div>

        <!-- Horizontal Scroll Container -->
        <div class="horizontal-scroll" data-aos="fade-up">
            <!-- Article Card 1 -->
            <div class="scroll-item">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center relative flex-shrink-0" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                        <div class="absolute top-4 left-4">
                            <span class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Berita Kampus</span>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">UDINUS Raih Peringkat Terbaik dalam Pemeringkatan Kampus</h3>
                        <p class="text-gray-600 mb-4 flex-grow">
                            Universitas Dian Nuswantoro kembali meraih prestasi membanggakan dalam pemeringkatan kampus terbaik di Indonesia...
                        </p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-sm text-gray-500">3 hari yang lalu</span>
                            <a href="{{ route('articles.show', 1) }}" class="text-udinus-blue hover:text-blue-700 font-medium flex items-center">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="scroll-item">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center relative flex-shrink-0" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                        <div class="absolute top-4 left-4">
                            <span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-xs font-medium">Kegiatan Mahasiswa</span>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Festival Kreativitas Mahasiswa UDINUS 2023 Sukses Digelar</h3>
                        <p class="text-gray-600 mb-4 flex-grow">
                            Festival Kreativitas Mahasiswa (FKM) UDINUS tahun 2023 berhasil digelar dengan meriah dan diikuti oleh ratusan mahasiswa...
                        </p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-sm text-gray-500">1 minggu yang lalu</span>
                            <a href="{{ route('articles.show', 2) }}" class="text-udinus-blue hover:text-blue-700 font-medium flex items-center">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Card 3 -->
            <div class="scroll-item">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center relative flex-shrink-0" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                        <div class="absolute top-4 left-4">
                            <span class="inline-block px-3 py-1 bg-blue-500 text-white rounded-full text-xs font-medium">Wartadinus</span>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Tips Menjalani Perkuliahan Online dengan Efektif</h3>
                        <p class="text-gray-600 mb-4 flex-grow">
                            Di era digital seperti sekarang, perkuliahan online menjadi bagian yang tidak terpisahkan dari kehidupan mahasiswa...
                        </p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-sm text-gray-500">2 minggu yang lalu</span>
                            <a href="{{ route('articles.show', 3) }}" class="text-udinus-blue hover:text-blue-700 font-medium flex items-center">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Card 4 -->
            <div class="scroll-item">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center relative flex-shrink-0" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                        <div class="absolute top-4 left-4">
                            <span class="inline-block px-3 py-1 bg-purple-500 text-white rounded-full text-xs font-medium">Prestasi</span>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Tim Robotik UDINUS Juara Nasional</h3>
                        <p class="text-gray-600 mb-4 flex-grow">
                            Tim Robotik UDINUS berhasil meraih juara pertama dalam kompetisi robotik tingkat nasional yang diikuti oleh 50 perguruan tinggi...
                        </p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-sm text-gray-500">3 minggu yang lalu</span>
                            <a href="{{ route('articles.show', 4) }}" class="text-udinus-blue hover:text-blue-700 font-medium flex items-center">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('articles.index') }}" class="btn-primary px-8 py-3 rounded-full font-medium text-white inline-flex items-center">
                Lihat Semua Artikel <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-20 bg-gradient-to-br from-indigo-50 to-blue-100 relative">
    <div class="absolute inset-0 opacity-30 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/dot-grid.png')]"></div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-gray-900 section-title">💬 Apa Kata Mereka?</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Testimoni mahasiswa yang sudah merasakan manfaat #SUPORTMABA
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @php
                $testimonials = [
                    ['name'=>'Andi Pratama','prodi'=>'Teknik Informatika 2023','text'=>'#SUPORTMABA sangat membantu saya saat pertama kali kuliah. Saya bisa menemukan UKM yang sesuai dengan minat saya.'],
                    ['name'=>'Siti Nurhaliza','prodi'=>'Manajemen 2023','text'=>'Fitur AI Minat Bakat sangat keren! Game 3D-nya juga seru untuk eksplorasi kampus.'],
                    ['name'=>'Budi Santoso','prodi'=>'Sistem Informasi 2023','text'=>'Website ini informatif dan mudah digunakan. Artikel-artikelnya selalu update.']
                ];
            @endphp

            @foreach($testimonials as $index => $t)
            <div class="testimonial-card bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition transform hover:-translate-y-2 duration-500" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="flex items-center mb-6">
                    <div class="h-14 w-14 rounded-full bg-udinus-blue flex items-center justify-center text-white font-bold text-lg">
                        {{ substr($t['name'],0,1) }}
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $t['name'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $t['prodi'] }}</p>
                    </div>
                </div>
                <p class="text-gray-600 italic relative z-10">"{{ $t['text'] }}"</p>
                <div class="mt-6 flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-20 gradient-bg relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse blob"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse blob" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-4xl font-extrabold text-white mb-6">Bergabunglah dengan Komunitas Kampus UDINUS</h2>
        <p class="max-w-2xl mx-auto text-xl text-blue-100 mb-10">
            Temukan informasi, teman, dan pengalaman baru di #SUPORTMABA
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('register') }}" class="btn-primary px-8 py-3 rounded-full font-medium text-white">
                Daftar Sekarang
            </a>
            <a href="{{ route('about') }}" class="btn-outline border-2 border-white text-white px-8 py-3 rounded-full font-medium">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>

<!-- Dark Mode Toggle -->
<div id="darkModeToggle" class="dark-mode-toggle">
    <i class="fas fa-moon"></i>
</div>
@endsection

@section('scripts')
<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
    
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    
    const countUp = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;
            
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(countUp, 10);
            } else {
                counter.innerText = target;
            }
        });
    };
    
    // Trigger counter animation when in viewport
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                countUp();
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    const statsSection = document.querySelector('.counter').parentElement.parentElement;
    if (statsSection) {
        observer.observe(statsSection);
    }
    
    // Horizontal scroll enhancement
    document.querySelectorAll('.horizontal-scroll').forEach(container => {
        let isDown = false;
        let startX;
        let scrollLeft;
        
        container.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
        });
        
        container.addEventListener('mouseleave', () => {
            isDown = false;
        });
        
        container.addEventListener('mouseup', () => {
            isDown = false;
        });
        
        container.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 2;
            container.scrollLeft = scrollLeft - walk;
        });
        
        // Smooth scroll for arrow keys
        container.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                container.scrollBy({ left: -300, behavior: 'smooth' });
            } else if (e.key === 'ArrowRight') {
                container.scrollBy({ left: 300, behavior: 'smooth' });
            }
        });
        
        // Make container focusable for keyboard navigation
        container.setAttribute('tabindex', '0');
    });
    
    // Dark Mode Toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
    }
    
    darkModeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
            darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            localStorage.setItem('darkMode', 'disabled');
            darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
    });
    
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection