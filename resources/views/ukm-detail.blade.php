@extends('layouts.app')

@section('content')
<!-- Header Section with Image -->
<div class="relative h-64 md:h-80">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://via.placeholder.com/1200x400?text=UKM+Detail')"></div>
    <div class="absolute inset-0 bg-udinus-blue bg-opacity-70"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-3xl font-extrabold sm:text-4xl">UKM Basket</h1>
            <p class="mt-2 text-xl text-blue-100">Unit Kegiatan Mahasiswa</p>
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
                        <a href="{{ route('ukm.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">UKM & ORMAWA</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500">Olahraga</span>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-700" aria-current="page">UKM Basket</span>
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
                <!-- UKM Info -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Informasi UKM</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Detail informasi mengenai UKM Basket</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Unit Kegiatan Mahasiswa Basket UDINUS</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-udinus-blue">
                                        Olahraga
                                    </span>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Tahun Berdiri</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">2005</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Jumlah Anggota</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">45 orang</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Pembina</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Dr. Ahmad Susanto, M.Pd</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Deskripsi</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <p class="text-gray-700">
                            UKM Basket UDINUS merupakan unit kegiatan mahasiswa yang berfokus pada pengembangan bakat dalam olahraga basket. UKM ini didirikan pada tahun 2005 dan telah menghasilkan banyak atlet basket berprestasi baik di tingkat universitas maupun regional.
                        </p>
                        <p class="mt-4 text-gray-700">
                            Kami menyediakan fasilitas latihan yang memadai, termasuk lapangan basket standar, peralatan latihan, dan pelatih berpengalaman. Selain itu, kami juga rutin mengikuti berbagai kompetisi basket antar universitas.
                        </p>
                        <p class="mt-4 text-gray-700">
                            UKM Basket terbuka bagi seluruh mahasiswa UDINUS yang memiliki minat dan bakat dalam olahraga basket, baik yang sudah berpengalaman maupun pemula yang ingin belajar.
                        </p>
                    </div>
                </div>

                <!-- Activities -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Kegiatan Rutin</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <ul class="divide-y divide-gray-200">
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                                <i class="fas fa-basketball-ball text-white"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">Latihan Rutin</p>
                                                <p class="mt-1 text-sm text-gray-500">Setiap Senin & Rabu, 16.00 - 18.00 WIB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                                <i class="fas fa-trophy text-white"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">Kompetisi Antar Universitas</p>
                                                <p class="mt-1 text-sm text-gray-500">Partisipasi dalam berbagai kompetisi basket tingkat regional</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                                <i class="fas fa-users text-white"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">Pelatihan Dasar Basket</p>
                                                <p class="mt-1 text-sm text-gray-500">Setiap awal semester untuk anggota baru</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                                <i class="fas fa-handshake text-white"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">Kegiatan Sosial</p>
                                                <p class="mt-1 text-sm text-gray-500">Basket bersama dengan anak-anak panti asuhan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Gallery -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Galeri</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x300?text=Gallery+1" alt="Gallery 1" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x300?text=Gallery+2" alt="Gallery 2" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x300?text=Gallery+3" alt="Gallery 3" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x300?text=Gallery+4" alt="Gallery 4" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x300?text=Gallery+5" alt="Gallery 5" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x300?text=Gallery+6" alt="Gallery 6" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Contact Info -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Kontak</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Ketua Umum</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Budi Santoso</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">No. HP</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">0812-3456-7890</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">basket@ukm.udinus.ac.id</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Instagram</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">@ukmbasketudinus</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Sekretariat</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Gedung Olahraga Lt. 2</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Join Button -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Bergabung dengan Kami</h3>
                        <p class="mt-1 text-sm text-gray-500">Isi formulir pendaftaran untuk menjadi anggota UKM Basket</p>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-udinus-blue hover:bg-blue-700">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- Related UKM -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">UKM Terkait</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <ul class="divide-y divide-gray-200">
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-futbol text-gray-600"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">UKM Futsal</p>
                                                <p class="mt-1 text-sm text-gray-500">Unit kegiatan mahasiswa futsal</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('ukm.show', 2) }}" class="text-udinus-blue hover:text-blue-700">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-volleyball-ball text-gray-600"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">UKM Voli</p>
                                                <p class="mt-1 text-sm text-gray-500">Unit kegiatan mahasiswa voli</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('ukm.show', 3) }}" class="text-udinus-blue hover:text-blue-700">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-running text-gray-600"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1 px-4">
                                            <div>
                                                <p class="text-sm font-medium text-udinus-blue">UKM Atletik</p>
                                                <p class="mt-1 text-sm text-gray-500">Unit kegiatan mahasiswa atletik</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('ukm.show', 4) }}" class="text-udinus-blue hover:text-blue-700">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
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