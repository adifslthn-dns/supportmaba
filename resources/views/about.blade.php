@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-udinus-blue text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold sm:text-4xl">Tentang #SUPORTMABA</h1>
        <p class="mt-3 max-w-2xl text-xl text-blue-100">
            Informasi mengenai website proyek tugas akhir ini
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Main Column -->
            <div class="lg:col-span-2">
                <!-- Project Description -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Deskripsi Proyek</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <p class="text-gray-700 mb-4">
                            #SUPORTMABA adalah website yang dikembangkan sebagai proyek tugas akhir untuk membantu mahasiswa baru (MABA) Universitas Dian Nuswantoro (UDINUS) dalam mendapatkan informasi seputar kampus, organisasi kemahasiswaan (ORMAWA), unit kegiatan mahasiswa (UKM), artikel, dan hiburan interaktif.
                        </p>
                        <p class="text-gray-700 mb-4">
                            Website ini dirancang dengan tujuan untuk memudahkan mahasiswa baru beradaptasi dengan lingkungan kampus, menemukan komunitas yang sesuai dengan minat dan bakat, serta mendapatkan informasi terkini seputar kegiatan kampus.
                        </p>
                        <p class="text-gray-700">
                            Dengan fitur-fitur yang disediakan, diharapkan mahasiswa baru dapat lebih aktif dalam kegiatan kemahasiswaan dan merasa lebih terhubung dengan kampus.
                        </p>
                    </div>
                </div>

                <!-- Objectives -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Tujuan Proyek</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Menyediakan informasi lengkap seputar UKM dan ORMAWA di UDINUS</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Membantu mahasiswa baru menemukan UKM atau ORMAWA yang sesuai dengan minat dan bakat</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Menyajikan artikel terkait kegiatan kampus dan berita dari Wartadinus</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Menyediakan hiburan interaktif melalui game 3D eksplorasi kampus</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Meningkatkan keterlibatan mahasiswa baru dalam kegiatan kemahasiswaan</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Features -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Fitur Website</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Informasi UKM & ORMAWA</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    Menyediakan informasi lengkap mengenai berbagai UKM dan ORMAWA di UDINUS yang dibagi per kategori: Olahraga, Seni, Penalaran & Keilmuan, Keagamaan, dan Pers Kampus.
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Artikel</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    Menyajikan artikel terkait kegiatan kampus, mahasiswa, dan berita dari Wartadinus dengan fitur pencarian dan filter kategori.
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">AI Minat Bakat</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    Fitur chatbot sederhana yang bisa membantu mahasiswa baru memilih UKM sesuai minat & bakat mereka melalui serangkaian pertanyaan interaktif.
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Game 3D</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    Mini-game eksplorasi 3D sekitar gedung UDINUS menggunakan Three.js untuk menampilkan model 3D kampus yang dapat dijelajahi.
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Login/Registrasi Admin</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    Sistem login dan registrasi untuk admin yang dapat mengelola data UKM, artikel, dan user.
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Dark Mode</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    Fitur dark mode toggle untuk kenyamanan pengguna dalam mengakses website, terutama dalam kondisi cahaya rendah.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Technology Stack -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Teknologi yang Digunakan</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-md font-medium text-gray-900 mb-3">Frontend</h4>
                                <ul class="space-y-2">
                                    <li class="flex items-center">
                                        <i class="fab fa-html5 text-orange-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">HTML5</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fab fa-css3-alt text-blue-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">CSS3</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fab fa-js text-yellow-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">JavaScript</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-wind text-teal-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">Tailwind CSS</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fab fa-react text-cyan-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">Three.js</span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-md font-medium text-gray-900 mb-3">Backend</h4>
                                <ul class="space-y-2">
                                    <li class="flex items-center">
                                        <i class="fab fa-php text-purple-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">PHP</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-horse text-red-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">Laravel</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-database text-blue-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">MySQL</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fab fa-node-js text-green-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">Node.js (Opsional)</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-robot text-indigo-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">TensorFlow.js / OpenAI API</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Development Team -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Tim Pengembang</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Team Member 1 -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/100x100?text=Developer1" alt="Developer">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Ahmad Fauzi</h4>
                                    <p class="text-sm text-gray-500">Project Lead & Full Stack Developer</p>
                                    <div class="mt-2 flex space-x-2">
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-github"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Team Member 2 -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/100x100?text=Developer2" alt="Developer">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Siti Nurhaliza</h4>
                                    <p class="text-sm text-gray-500">UI/UX Designer & Frontend Developer</p>
                                    <div class="mt-2 flex space-x-2">
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-github"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Team Member 3 -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/100x100?text=Developer3" alt="Developer">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Budi Santoso</h4>
                                    <p class="text-sm text-gray-500">Backend Developer & Database Specialist</p>
                                    <div class="mt-2 flex space-x-2">
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-github"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-stack-overflow"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Team Member 4 -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/100x100?text=Developer4" alt="Developer">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Rina Susanti</h4>
                                    <p class="text-sm text-gray-500">3D Developer & AI Specialist</p>
                                    <div class="mt-2 flex space-x-2">
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-github"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Project Info -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Informasi Proyek</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Nama Proyek</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">#SUPORTMABA</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Jenis Proyek</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Tugas Akhir</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Periode</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">2023</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Selesai
                                    </span>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Repository</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href="#" class="text-udinus-blue hover:text-blue-700">
                                        <i class="fab fa-github mr-1"></i> GitHub
                                    </a>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Contact -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Kontak</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-envelope text-udinus-blue mt-1"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Email</p>
                                    <p class="text-sm text-gray-500">info@suportmaba.udinus.ac.id</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-phone-alt text-udinus-blue mt-1"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Telepon</p>
                                    <p class="text-sm text-gray-500">(024) 3517261</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-udinus-blue mt-1"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Alamat</p>
                                    <p class="text-sm text-gray-500">Jl. Imam Bonjol No.207, Semarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Kritik & Saran</h3>
                        <p class="mt-1 text-sm text-gray-500">Kami sangat menghargai feedback Anda</p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
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
                                <label for="feedback" class="block text-sm font-medium text-gray-700">Kritik & Saran</label>
                                <textarea id="feedback" name="feedback" rows="4" class="mt-1 focus:ring-udinus-blue focus:border-udinus-blue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-udinus-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-udinus-blue">
                                    Kirim Feedback
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection