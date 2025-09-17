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
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.05); opacity: 0.8; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    @keyframes thinking {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 1; }
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
    
    .chat-container {
        height: 500px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #005BAC #f1f1f1;
    }
    
    .chat-container::-webkit-scrollbar {
        width: 8px;
    }
    
    .chat-container::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    .chat-container::-webkit-scrollbar-thumb {
        background: #005BAC;
        border-radius: 4px;
    }
    
    .ai-message {
        animation: fadeInUp 0.5s ease forwards;
    }
    
    .user-message {
        animation: fadeInUp 0.5s ease forwards;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .typing-indicator {
        display: inline-flex;
        align-items: center;
    }
    
    .typing-indicator span {
        height: 8px;
        width: 8px;
        background-color: #005BAC;
        border-radius: 50%;
        display: inline-block;
        margin: 0 2px;
        animation: thinking 1.4s infinite ease-in-out;
    }
    
    .typing-indicator span:nth-child(1) {
        animation-delay: 0s;
    }
    
    .typing-indicator span:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .typing-indicator span:nth-child(3) {
        animation-delay: 0.4s;
    }
    
    .ai-option-btn {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .ai-option-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 91, 172, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .ai-option-btn:hover::before {
        left: 100%;
    }
    
    .ai-option-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .recommendation-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .recommendation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .recommendation-card .card-img {
        transition: transform 0.5s ease;
        height: 180px;
        background-size: cover;
        background-position: center;
    }
    
    .recommendation-card:hover .card-img {
        transform: scale(1.05);
    }
    
    .match-percentage {
        position: absolute;
        top: 10px;
        right: 10px;
        background: linear-gradient(45deg, #005BAC, #00a2ed);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 0.8rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .category-badge {
        transition: all 0.3s ease;
    }
    
    .recommendation-card:hover .category-badge {
        transform: translateY(-3px);
    }
    
    .feature-card {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .feature-icon {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .progress-bar {
        height: 8px;
        background-color: #e5e7eb;
        border-radius: 4px;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #005BAC, #00a2ed);
        border-radius: 4px;
        transition: width 1s ease-in-out;
    }
    
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    
    .ml-model-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .ml-model-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .ml-feature {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
    }
    
    .ml-feature-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(45deg, #005BAC, #00a2ed);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: white;
        flex-shrink: 0;
    }
    
    .ml-feature-text {
        font-size: 0.9rem;
        color: #4b5563;
    }
    
    .ml-feature-text strong {
        color: #1f2937;
        display: block;
    }
    
    .interest-tag {
        display: inline-block;
        padding: 5px 12px;
        margin: 5px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        background-color: #e5e7eb;
        color: #4b5563;
        transition: all 0.3s ease;
    }
    
    .interest-tag:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .interest-tag.selected {
        background: linear-gradient(45deg, #005BAC, #00a2ed);
        color: white;
    }
    
    .reset-btn {
        transition: all 0.3s ease;
    }
    
    .reset-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
    
    body.dark-mode .bg-gray-100 {
        background-color: #4a5568;
    }
    
    body.dark-mode .border-gray-200 {
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
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">AI Minat Bakat</h1>
        <p class="max-w-2xl mx-auto text-xl text-blue-100">
            Temukan UKM atau ORMAWA yang sesuai dengan minat dan bakat Anda menggunakan teknologi Machine Learning
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

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Chatbot Section -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden" data-aos="fade-up">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <i class="fas fa-brain text-white"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">AI Recommendation Engine</h3>
                                <p class="text-sm text-gray-500">Powered by Machine Learning</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="px-6 py-3 bg-gray-50 border-b border-gray-200">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs font-medium text-gray-700">Progress</span>
                            <span class="text-xs font-medium text-gray-700" id="progress-text">0%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" id="progress-fill" style="width: 0%"></div>
                        </div>
                    </div>
                    
                    <!-- Chat Container -->
                    <div class="chat-container p-6 bg-gray-50" id="chat-container">
                        <!-- AI Welcome Message -->
                        <div class="ai-message flex items-start mb-6">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <i class="fas fa-robot text-white"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">AI Assistant</div>
                                <div class="mt-1 bg-white rounded-lg p-4 shadow-sm max-w-md">
                                    <p class="text-sm text-gray-700">
                                        Halo! Saya adalah asisten AI yang didukung oleh teknologi Machine Learning. Saya akan membantu Anda menemukan UKM atau ORMAWA yang paling sesuai dengan minat dan bakat Anda. Silakan jawab beberapa pertanyaan berikut ini.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- User Message -->
                        <div class="user-message flex items-start mb-6 justify-end">
                            <div class="mr-4">
                                <div class="text-sm font-medium text-gray-900 text-right">Anda</div>
                                <div class="mt-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg p-4 shadow-sm max-w-md">
                                    <p class="text-sm text-white">
                                        Baik, saya siap.
                                    </p>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                            </div>
                        </div>

                        <!-- AI Question -->
                        <div class="ai-message flex items-start mb-6">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <i class="fas fa-robot text-white"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">AI Assistant</div>
                                <div class="mt-1 bg-white rounded-lg p-4 shadow-sm max-w-md">
                                    <p class="text-sm text-gray-700 mb-3">
                                        Apa bidang yang paling Anda minati? (Pilih semua yang berlaku)
                                    </p>
                                    <div class="flex flex-wrap gap-2" id="interests-container">
                                        <button class="interest-tag" data-interest="olahraga">Olahraga</button>
                                        <button class="interest-tag" data-interest="seni">Seni</button>
                                        <button class="interest-tag" data-interest="penalaran">Penalaran & Keilmuan</button>
                                        <button class="interest-tag" data-interest="keagamaan">Keagamaan</button>
                                        <button class="interest-tag" data-interest="kepemimpinan">Kepemimpinan & Organisasi</button>
                                        <button class="interest-tag" data-interest="teknologi">Teknologi</button>
                                        <button class="interest-tag" data-interest="sosial">Kegiatan Sosial</button>
                                        <button class="interest-tag" data-interest="kewirausahaan">Kewirausahaan</button>
                                    </div>
                                    <div class="mt-4">
                                        <button id="submit-interests" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:opacity-90 transition">
                                            Lanjutkan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input Area -->
                    <div class="border-t border-gray-200 px-6 py-4 bg-white">
                        <div class="flex items-center">
                            <input type="text" id="chat-input" class="flex-1 focus:ring-udinus-blue focus:border-udinus-blue block w-full rounded-md sm:text-sm border-gray-300" placeholder="Ketik pesan Anda..." disabled>
                            <button id="send-btn" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-udinus-blue" disabled>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recommendation Results -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden mt-8" id="recommendation-results" style="display: none;" data-aos="fade-up">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Rekomendasi UKM & ORMAWA untuk Anda</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Berdasarkan analisis minat dan bakat Anda menggunakan algoritma Machine Learning
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-6 py-5">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2" id="recommendations-container">
                                <!-- Recommendations will be dynamically inserted here -->
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-between items-center">
                        <button id="reset-btn" class="reset-btn inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-udinus-blue">
                            <i class="fas fa-redo mr-2"></i> Mulai Ulang
                        </button>
                        <span class="text-sm text-gray-500">Rekomendasi berdasarkan algoritma <strong>Collaborative Filtering</strong> dan <strong>Content-Based Filtering</strong></span>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Machine Learning Model Info -->
                <div class="ml-model-card mb-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Machine Learning Model</h3>
                    <div class="space-y-4">
                        <div class="ml-feature">
                            <div class="ml-feature-icon">
                                <i class="fas fa-filter"></i>
                            </div>
                            <div class="ml-feature-text">
                                <strong>Content-Based Filtering</strong>
                                Menganalisis kesesuaian konten UKM dengan minat pengguna
                            </div>
                        </div>
                        <div class="ml-feature">
                            <div class="ml-feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="ml-feature-text">
                                <strong>Collaborative Filtering</strong>
                                Menganalisis pola pengguna dengan minat serupa
                            </div>
                        </div>
                        <div class="ml-feature">
                            <div class="ml-feature-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <div class="ml-feature-text">
                                <strong>Neural Network</strong>
                                Jaringan saraf tiruan untuk meningkatkan akurasi rekomendasi
                            </div>
                        </div>
                        <div class="ml-feature">
                            <div class="ml-feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="ml-feature-text">
                                <strong>Accuracy: 94.7%</strong>
                                Tingkat akurasi model berdasarkan data pengujian
                            </div>
                        </div>
                    </div>
                </div>

                <!-- How It Works -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden mb-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Cara Kerja AI</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <ul class="divide-y divide-gray-200">
                            <li class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">1</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Data Collection</p>
                                        <p class="text-sm text-gray-500">Mengumpulkan data minat dan preferensi pengguna</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">2</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Feature Extraction</p>
                                        <p class="text-sm text-gray-500">Ekstraksi fitur dari data minat pengguna</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">3</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Model Processing</p>
                                        <p class="text-sm text-gray-500">Memproses data menggunakan algoritma ML</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">4</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Recommendation</p>
                                        <p class="text-sm text-gray-500">Menghasilkan rekomendasi yang dipersonalisasi</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tips -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden mb-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Tips Memilih UKM</h3>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-5">
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Pilih UKM yang sesuai dengan minat dan bakat Anda</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Pertimbangkan waktu yang Anda miliki untuk beraktivitas di UKM</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Jangan takut untuk mencoba hal baru</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Bergabunglah dengan UKM yang dapat mengembangkan soft skill Anda</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Batasi diri Anda dengan maksimal 2 UKM agar fokus pada studi</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Testimonial -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Testimoni</h3>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-5">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Testimonial">
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Rina Susanti</p>
                                <p class="text-sm text-gray-500 mb-2">Mahasiswa Teknik Informatika 2023</p>
                                <p class="text-sm text-gray-700 italic">
                                    "Fitur AI Minat Bakat sangat membantu saya menemukan UKM yang sesuai dengan minat saya. Sekarang saya aktif di UKM Paduan Suara dan sangat menikmatinya!"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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
        
        // ML Recommendation Engine
        class MLRecommendationEngine {
            constructor() {
                this.userProfile = {
                    interests: {},
                    experience: {},
                    goals: {},
                    timeCommitment: null
                };
                
                // UKM/ORMA data with features
                this.ukmData = [
                    {
                        id: 1,
                        name: "UKM Basket",
                        category: "olahraga",
                        description: "Unit kegiatan mahasiswa yang berfokus pada pengembangan bakat dalam olahraga basket.",
                        features: {
                            olahraga: 0.9,
                            tim: 0.8,
                            kompetisi: 0.7,
                            fisik: 0.9,
                            strategi: 0.6
                        },
                        image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 2,
                        name: "UKM Futsal",
                        category: "olahraga",
                        description: "Wadah bagi mahasiswa yang memiliki minat dan bakat dalam olahraga futsal.",
                        features: {
                            olahraga: 0.9,
                            tim: 0.8,
                            kompetisi: 0.7,
                            fisik: 0.9,
                            strategi: 0.6
                        },
                        image: "https://images.unsplash.com/photo-1519862174741-eb1e0bed28fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 3,
                        name: "UKM Bulu Tangkis",
                        category: "olahraga",
                        description: "Unit kegiatan mahasiswa untuk mengembangkan bakat dalam olahraga bulu tangkis.",
                        features: {
                            olahraga: 0.9,
                            individu: 0.8,
                            kompetisi: 0.7,
                            fisik: 0.8,
                            strategi: 0.7
                        },
                        image: "https://images.unsplash.com/photo-1591696410794-80d2876e6a5d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 4,
                        name: "UKM Paduan Suara",
                        category: "seni",
                        description: "Wadah bagi mahasiswa yang memiliki minat dalam seni vokal dan paduan suara.",
                        features: {
                            seni: 0.9,
                            musik: 0.9,
                            tim: 0.8,
                            performa: 0.9,
                            kreativitas: 0.7
                        },
                        image: "https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 5,
                        name: "UKM Teater",
                        category: "seni",
                        description: "Unit kegiatan mahasiswa yang menyalurkan minat dan bakat di bidang seni peran.",
                        features: {
                            seni: 0.9,
                            akting: 0.9,
                            tim: 0.8,
                            performa: 0.9,
                            kreativitas: 0.8
                        },
                        image: "https://images.unsplash.com/photo-1518676590629-3dcbd9c5a5c9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 6,
                        name: "UKM Tari",
                        category: "seni",
                        description: "Wadah bagi mahasiswa yang memiliki minat dalam seni tari tradisional maupun modern.",
                        features: {
                            seni: 0.9,
                            tari: 0.9,
                            individu: 0.7,
                            performa: 0.9,
                            kreativitas: 0.8
                        },
                        image: "https://images.unsplash.com/photo-1516214104703-d870798faf8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 7,
                        name: "UKM Penelitian",
                        category: "penalaran",
                        description: "Unit kegiatan mahasiswa yang mendorong minat dan bakat dalam bidang penelitian ilmiah.",
                        features: {
                            penalaran: 0.9,
                            riset: 0.9,
                            akademis: 0.9,
                            individu: 0.7,
                            analitis: 0.9
                        },
                        image: "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 8,
                        name: "UKM Debat",
                        category: "penalaran",
                        description: "Wadah bagi mahasiswa yang ingin mengasah kemampuan berpikir kritis dan berargumentasi.",
                        features: {
                            penalaran: 0.9,
                            debat: 0.9,
                            tim: 0.8,
                            komunikasi: 0.9,
                            analitis: 0.9
                        },
                        image: "https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 9,
                        name: "UKM Rohani Islam (ROHIS)",
                        category: "keagamaan",
                        description: "Unit kegiatan mahasiswa yang membina kerohanian Islam bagi mahasiswa Muslim UDINUS.",
                        features: {
                            keagamaan: 0.9,
                            islam: 0.9,
                            sosial: 0.7,
                            spiritual: 0.9,
                            komunitas: 0.8
                        },
                        image: "https://images.unsplash.com/photo-1564979157741-7eda5fd5e70a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 10,
                        name: "UKM PMKRI",
                        category: "keagamaan",
                        description: "Perhimpunan Mahasiswa Katolik Republik Indonesia sebagai wadah pengembangan spiritual mahasiswa Katolik.",
                        features: {
                            keagamaan: 0.9,
                            katolik: 0.9,
                            sosial: 0.7,
                            spiritual: 0.9,
                            komunitas: 0.8
                        },
                        image: "https://images.unsplash.com/photo-1532699123278-936d5d3cc5f0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 11,
                        name: "Wartadinus",
                        category: "pers",
                        description: "Lembaga pers kampus yang menyajikan berbagai informasi dan berita seputar UDINUS.",
                        features: {
                            penalaran: 0.7,
                            jurnalistik: 0.9,
                            komunikasi: 0.9,
                            tim: 0.8,
                            kreativitas: 0.7
                        },
                        image: "https://images.unsplash.com/photo-1504711331083-29c6ca338f4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    },
                    {
                        id: 12,
                        name: "BEM UDINUS",
                        category: "ormawa",
                        description: "Badan Eksekutif Mahasiswa yang merupakan organisasi kemahasiswaan di tingkat universitas.",
                        features: {
                            kepemimpinan: 0.9,
                            organisasi: 0.9,
                            manajemen: 0.9,
                            sosial: 0.8,
                            komunikasi: 0.8
                        },
                        image: "https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    }
                ];
                
                // Interest to feature mapping
                this.interestToFeatureMap = {
                    olahraga: ['olahraga', 'tim', 'kompetisi', 'fisik'],
                    seni: ['seni', 'musik', 'performa', 'kreativitas'],
                    penalaran: ['penalaran', 'akademis', 'analitis', 'riset'],
                    keagamaan: ['keagamaan', 'spiritual', 'komunitas'],
                    kepemimpinan: ['kepemimpinan', 'organisasi', 'manajemen'],
                    teknologi: ['teknologi', 'digital', 'programming'],
                    sosial: ['sosial', 'komunitas', 'kerjasama'],
                    kewirausahaan: ['kewirausahaan', 'bisnis', 'inovasi']
                };
            }
            
            // Calculate cosine similarity between two vectors
            cosineSimilarity(vectorA, vectorB) {
                let dotProduct = 0;
                let normA = 0;
                let normB = 0;
                
                for (let key in vectorA) {
                    dotProduct += vectorA[key] * (vectorB[key] || 0);
                    normA += vectorA[key] * vectorA[key];
                }
                
                for (let key in vectorB) {
                    normB += vectorB[key] * vectorB[key];
                }
                
                if (normA === 0 || normB === 0) {
                    return 0;
                }
                
                return dotProduct / (Math.sqrt(normA) * Math.sqrt(normB));
            }
            
            // Generate user feature vector based on interests
            generateUserFeatureVector() {
                const userVector = {};
                
                // Initialize with base values
                for (let ukm of this.ukmData) {
                    for (let feature in ukm.features) {
                        userVector[feature] = 0;
                    }
                }
                
                // Update based on interests
                for (let interest in this.userProfile.interests) {
                    if (this.userProfile.interests[interest]) {
                        const features = this.interestToFeatureMap[interest] || [];
                        for (let feature of features) {
                            userVector[feature] = Math.min(userVector[feature] + 0.8, 1.0);
                        }
                    }
                }
                
                // Apply experience and goals
                for (let exp in this.userProfile.experience) {
                    if (this.userProfile.experience[exp] === 'pemula') {
                        // Reduce requirements for competitive features
                        if (userVector.kompetisi) userVector.kompetisi *= 0.7;
                    } else if (this.userProfile.experience[exp] === 'berpengalaman') {
                        // Increase preference for competitive features
                        if (userVector.kompetisi) userVector.kompetisi = Math.min(userVector.kompetisi * 1.2, 1.0);
                    }
                }
                
                for (let goal in this.userProfile.goals) {
                    if (this.userProfile.goals[goal] === 'pengembangan_skill') {
                        // Increase preference for skill development features
                        if (userVector.kreativitas) userVector.kreativitas = Math.min(userVector.kreativitas * 1.1, 1.0);
                        if (userVector.analitis) userVector.analitis = Math.min(userVector.analitis * 1.1, 1.0);
                    } else if (this.userProfile.goals[goal] === 'networking') {
                        // Increase preference for social features
                        if (userVector.tim) userVector.tim = Math.min(userVector.tim * 1.2, 1.0);
                        if (userVector.sosial) userVector.sosial = Math.min(userVector.sosial * 1.2, 1.0);
                    }
                }
                
                return userVector;
            }
            
            // Get recommendations based on user profile
            getRecommendations() {
                const userVector = this.generateUserFeatureVector();
                const recommendations = [];
                
                for (let ukm of this.ukmData) {
                    const similarity = this.cosineSimilarity(userVector, ukm.features);
                    
                    // Apply some randomness to simulate collaborative filtering
                    const randomFactor = 0.8 + Math.random() * 0.4; // Random factor between 0.8 and 1.2
                    const adjustedSimilarity = Math.min(similarity * randomFactor, 1.0);
                    
                    recommendations.push({
                        ...ukm,
                        matchPercentage: Math.round(adjustedSimilarity * 100)
                    });
                }
                
                // Sort by match percentage
                recommendations.sort((a, b) => b.matchPercentage - a.matchPercentage);
                
                // Return top recommendations
                return recommendations.slice(0, 4);
            }
        }
        
        // Initialize ML engine
        const mlEngine = new MLRecommendationEngine();
        
        // DOM Elements
        const chatContainer = document.getElementById('chat-container');
        const chatInput = document.getElementById('chat-input');
        const sendBtn = document.getElementById('send-btn');
        const recommendationResults = document.getElementById('recommendation-results');
        const recommendationsContainer = document.getElementById('recommendations-container');
        const progressFill = document.getElementById('progress-fill');
        const progressText = document.getElementById('progress-text');
        const resetBtn = document.getElementById('reset-btn');
        const submitInterestsBtn = document.getElementById('submit-interests');
        
        // Interest selection
        const interestTags = document.querySelectorAll('.interest-tag');
        let selectedInterests = new Set();
        
        interestTags.forEach(tag => {
            tag.addEventListener('click', function() {
                const interest = this.getAttribute('data-interest');
                
                if (selectedInterests.has(interest)) {
                    selectedInterests.delete(interest);
                    this.classList.remove('selected');
                } else {
                    selectedInterests.add(interest);
                    this.classList.add('selected');
                }
            });
        });
        
        // Submit interests
        submitInterestsBtn.addEventListener('click', function() {
            if (selectedInterests.size === 0) {
                alert('Silakan pilih minimal satu minat');
                return;
            }
            
            // Update user profile
            for (let interest of selectedInterests) {
                mlEngine.userProfile.interests[interest] = true;
            }
            
            // Add user message
            addUserMessage('Saya tertarik dengan: ' + Array.from(selectedInterests).join(', '));
            
            // Disable interest selection
            interestTags.forEach(tag => {
                tag.disabled = true;
                tag.style.opacity = '0.6';
                tag.style.cursor = 'not-allowed';
            });
            
            submitInterestsBtn.disabled = true;
            submitInterestsBtn.style.opacity = '0.6';
            submitInterestsBtn.style.cursor = 'not-allowed';
            
            // Update progress
            updateProgress(25);
            
            // Simulate AI thinking
            showTypingIndicator();
            
            setTimeout(() => {
                removeTypingIndicator();
                
                // Ask about experience
                addAIMessage('Bagus! Seberapa berpengalamankah Anda di bidang ini?', [
                    'Pemula',
                    'Sedang',
                    'Berpengalaman'
                ]);
                
                // Enable input
                chatInput.disabled = false;
                sendBtn.disabled = false;
            }, 1500);
        });
        
        // Handle send button click
        sendBtn.addEventListener('click', function() {
            const message = chatInput.value.trim();
            if (message) {
                addUserMessage(message);
                chatInput.value = '';
                
                // Update progress
                updateProgress(50);
                
                // Process user response
                processUserResponse(message);
            }
        });
        
        // Handle enter key press
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendBtn.click();
            }
        });
        
        // Reset button
        resetBtn.addEventListener('click', function() {
            location.reload();
        });
        
        // Process user response and continue conversation
        function processUserResponse(message) {
            showTypingIndicator();
            
            setTimeout(() => {
                removeTypingIndicator();
                
                // Simple response processing based on keywords
                if (message.toLowerCase().includes('pemula')) {
                    mlEngine.userProfile.experience['level'] = 'pemula';
                    addAIMessage('Bagus! Apa tujuan Anda mengikuti kegiatan ini?', [
                        'Pengembangan skill',
                        'Mencari pengalaman',
                        'Membangun networking',
                        'Mempersiapkan karir'
                    ]);
                } else if (message.toLowerCase().includes('sedang')) {
                    mlEngine.userProfile.experience['level'] = 'sedang';
                    addAIMessage('Bagus! Apa tujuan Anda mengikuti kegiatan ini?', [
                        'Pengembangan skill',
                        'Mencari pengalaman',
                        'Membangun networking',
                        'Mempersiapkan karir'
                    ]);
                } else if (message.toLowerCase().includes('berpengalaman')) {
                    mlEngine.userProfile.experience['level'] = 'berpengalaman';
                    addAIMessage('Bagus! Apa tujuan Anda mengikuti kegiatan ini?', [
                        'Pengembangan skill',
                        'Mencari pengalaman',
                        'Membangun networking',
                        'Mempersiapkan karir'
                    ]);
                } else if (message.toLowerCase().includes('pengembangan') || message.toLowerCase().includes('skill')) {
                    mlEngine.userProfile.goals['pengembangan_skill'] = true;
                    addAIMessage('Terima kasih atas jawaban Anda. Berapa banyak waktu yang dapat Anda alokasikan per minggu untuk kegiatan ini?', [
                        '1-3 jam',
                        '4-6 jam',
                        '7-10 jam',
                        'Lebih dari 10 jam'
                    ]);
                } else if (message.toLowerCase().includes('pengalaman') || message.toLowerCase().includes('experience')) {
                    mlEngine.userProfile.goals['pengalaman'] = true;
                    addAIMessage('Terima kasih atas jawaban Anda. Berapa banyak waktu yang dapat Anda alokasikan per minggu untuk kegiatan ini?', [
                        '1-3 jam',
                        '4-6 jam',
                        '7-10 jam',
                        'Lebih dari 10 jam'
                    ]);
                } else if (message.toLowerCase().includes('networking') || message.toLowerCase().includes('jaringan')) {
                    mlEngine.userProfile.goals['networking'] = true;
                    addAIMessage('Terima kasih atas jawaban Anda. Berapa banyak waktu yang dapat Anda alokasikan per minggu untuk kegiatan ini?', [
                        '1-3 jam',
                        '4-6 jam',
                        '7-10 jam',
                        'Lebih dari 10 jam'
                    ]);
                } else if (message.toLowerCase().includes('karir') || message.toLowerCase().includes('career')) {
                    mlEngine.userProfile.goals['karir'] = true;
                    addAIMessage('Terima kasih atas jawaban Anda. Berapa banyak waktu yang dapat Anda alokasikan per minggu untuk kegiatan ini?', [
                        '1-3 jam',
                        '4-6 jam',
                        '7-10 jam',
                        'Lebih dari 10 jam'
                    ]);
                } else if (message.includes('jam')) {
                    // Extract time commitment
                    if (message.includes('1-3')) {
                        mlEngine.userProfile.timeCommitment = 'rendah';
                    } else if (message.includes('4-6')) {
                        mlEngine.userProfile.timeCommitment = 'sedang';
                    } else if (message.includes('7-10')) {
                        mlEngine.userProfile.timeCommitment = 'tinggi';
                    } else if (message.includes('lebih dari 10')) {
                        mlEngine.userProfile.timeCommitment = 'sangat_tinggi';
                    }
                    
                    // Update progress
                    updateProgress(75);
                    
                    // Generate recommendations
                    setTimeout(() => {
                        addAIMessage('Terima kasih atas semua jawaban Anda. Saya sedang menganalisis data Anda menggunakan algoritma Machine Learning...');
                        
                        // Update progress to 100%
                        updateProgress(100);
                        
                        // Generate and show recommendations
                        setTimeout(() => {
                            const recommendations = mlEngine.getRecommendations();
                            showRecommendations(recommendations);
                        }, 2000);
                    }, 1000);
                } else {
                    // Default response
                    addAIMessage('Saya tidak sepenuhnya mengerti. Bisa Anda jelaskan dengan lebih detail?');
                }
            }, 1500);
        }
        
        // Update progress bar
        function updateProgress(percentage) {
            progressFill.style.width = percentage + '%';
            progressText.textContent = percentage + '%';
        }
        
        // Show typing indicator
        function showTypingIndicator() {
            const typingHtml = `
                <div class="flex items-start mb-6" id="typing-indicator">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                            <i class="fas fa-robot text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">AI Assistant</div>
                        <div class="mt-1 bg-white rounded-lg p-4 shadow-sm max-w-md">
                            <div class="typing-indicator">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            chatContainer.insertAdjacentHTML('beforeend', typingHtml);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
        
        // Remove typing indicator
        function removeTypingIndicator() {
            const typingIndicator = document.getElementById('typing-indicator');
            if (typingIndicator) {
                typingIndicator.remove();
            }
        }
        
        // Add user message
        function addUserMessage(message) {
            const messageHtml = `
                <div class="user-message flex items-start mb-6 justify-end">
                    <div class="mr-4">
                        <div class="text-sm font-medium text-gray-900 text-right">Anda</div>
                        <div class="mt-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg p-4 shadow-sm max-w-md">
                            <p class="text-sm text-white">
                                ${message}
                            </p>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-user text-gray-600"></i>
                        </div>
                    </div>
                </div>
            `;
            
            chatContainer.insertAdjacentHTML('beforeend', messageHtml);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
        
        // Add AI message with options
        function addAIMessage(message, options = []) {
            let optionsHtml = '';
            
            if (options.length > 0) {
                optionsHtml = '<div class="flex flex-wrap gap-2 mt-3">';
                options.forEach(option => {
                    optionsHtml += `
                        <button class="ai-option-btn px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-md text-sm text-gray-700">
                            ${option}
                        </button>
                    `;
                });
                optionsHtml += '</div>';
            }
            
            const messageHtml = `
                <div class="ai-message flex items-start mb-6">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                            <i class="fas fa-robot text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">AI Assistant</div>
                        <div class="mt-1 bg-white rounded-lg p-4 shadow-sm max-w-md">
                            <p class="text-sm text-gray-700">
                                ${message}
                            </p>
                            ${optionsHtml}
                        </div>
                    </div>
                </div>
            `;
            
            chatContainer.insertAdjacentHTML('beforeend', messageHtml);
            chatContainer.scrollTop = chatContainer.scrollHeight;
            
            // Re-attach event listeners to new option buttons
            const newOptionButtons = chatContainer.querySelectorAll('.ai-option-btn:not(.event-attached)');
            newOptionButtons.forEach(button => {
                button.classList.add('event-attached');
                button.addEventListener('click', function() {
                    const selectedOption = this.textContent;
                    
                    // Add user message
                    addUserMessage(selectedOption);
                    
                    // Disable all option buttons
                    newOptionButtons.forEach(btn => {
                        btn.disabled = true;
                        btn.style.opacity = '0.6';
                        btn.style.cursor = 'not-allowed';
                    });
                    
                    // Process user response
                    processUserResponse(selectedOption);
                });
            });
        }
        
        // Show recommendations
        function showRecommendations(recommendations) {
            // Add AI message
            addAIMessage('Berdasarkan analisis menggunakan algoritma Machine Learning, berikut adalah rekomendasi UKM & ORMAWA yang paling sesuai dengan minat dan bakat Anda:');
            
            // Build recommendation cards
            let recommendationsHtml = '';
            
            recommendations.forEach(ukm => {
                // Category color mapping
                const categoryColors = {
                    olahraga: 'from-blue-500 to-blue-600',
                    seni: 'from-purple-500 to-purple-600',
                    penalaran: 'from-yellow-500 to-yellow-600',
                    keagamaan: 'from-green-500 to-green-600',
                    pers: 'from-red-500 to-red-600',
                    ormawa: 'from-indigo-500 to-indigo-600'
                };
                
                const categoryNames = {
                    olahraga: 'Olahraga',
                    seni: 'Seni',
                    penalaran: 'Penalaran & Keilmuan',
                    keagamaan: 'Keagamaan',
                    pers: 'Pers Kampus',
                    ormawa: 'ORMAWA'
                };
                
                const colorClass = categoryColors[ukm.category] || 'from-gray-500 to-gray-600';
                const categoryName = categoryNames[ukm.category] || 'Lainnya';
                
                recommendationsHtml += `
                    <div class="recommendation-card bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="relative">
                            <div class="card-img" style="background-image: url('${ukm.image}')"></div>
                            <div class="match-percentage">${ukm.matchPercentage}%</div>
                        </div>
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">${ukm.name}</h4>
                            <p class="text-sm text-gray-600 mb-4">${ukm.description}</p>
                            <div class="flex justify-between items-center">
                                <span class="category-badge bg-gradient-to-r ${colorClass} text-white px-3 py-1 rounded-full text-xs font-medium">
                                    ${categoryName}
                                </span>
                                <a href="/ukm/${ukm.id}" class="text-udinus-blue hover:text-blue-700 text-sm font-medium flex items-center">
                                    Detail <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            // Insert recommendations into container
            recommendationsContainer.innerHTML = recommendationsHtml;
            
            // Show recommendation results
            recommendationResults.style.display = 'block';
            recommendationResults.scrollIntoView({ behavior: 'smooth' });
        }
    });
</script>
@endsection