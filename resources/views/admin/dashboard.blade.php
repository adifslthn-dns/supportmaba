@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-udinus-blue text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold sm:text-4xl">Admin Dashboard</h1>
        <p class="mt-3 max-w-2xl text-xl text-blue-100">
            Kelola konten website #SUPORTMABA
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Stats Section -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <!-- Stat Card 1 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-udinus-blue rounded-md p-3">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total UKM & ORMAWA</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">24</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('admin.ukm.index') }}" class="font-medium text-udinus-blue hover:text-blue-700">
                            Kelola
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-newspaper text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Artikel</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">48</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('admin.articles.index') }}" class="font-medium text-green-600 hover:text-green-500">
                            Kelola
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total User</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">312</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('admin.users.index') }}" class="font-medium text-purple-600 hover:text-purple-500">
                            Kelola
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stat Card 4 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <i class="fas fa-comments text-white text-xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Komentar</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">128</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('admin.comments.index') }}" class="font-medium text-yellow-600 hover:text-yellow-500">
                            Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Aksi Cepat</h3>
            </div>
            <div class="border-t border-gray-200">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <a href="{{ route('admin.ukm.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-udinus-blue hover:bg-blue-700">
                            <i class="fas fa-plus mr-2"></i> Tambah UKM
                        </a>
                        <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                            <i class="fas fa-plus mr-2"></i> Tambah Artikel
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-plus mr-2"></i> Tambah User
                        </a>
                        <a href="{{ route('admin.settings') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-600 hover:bg-yellow-700">
                            <i class="fas fa-cog mr-2"></i> Pengaturan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            <!-- Recent Articles -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Artikel Terbaru</h3>
                        <a href="{{ route('admin.articles.index') }}" class="text-sm font-medium text-udinus-blue hover:text-blue-700">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <ul class="divide-y divide-gray-200">
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/100x100?text=Article1" alt="Article">
                                    </div>
                                    <div class="min-w-0 flex-1 px-4">
                                        <div>
                                            <p class="text-sm font-medium text-udinus-blue truncate">UDINUS Raih Peringkat Terbaik dalam Pemeringkatan Kampus</p>
                                            <p class="mt-1 text-sm text-gray-500">Oleh Ahmad Fauzi • 3 hari yang lalu</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.articles.edit', 1) }}" class="text-gray-400 hover:text-gray-500">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/100x100?text=Article2" alt="Article">
                                    </div>
                                    <div class="min-w-0 flex-1 px-4">
                                        <div>
                                            <p class="text-sm font-medium text-udinus-blue truncate">Festival Kreativitas Mahasiswa UDINUS 2023 Sukses Digelar</p>
                                            <p class="mt-1 text-sm text-gray-500">Oleh Siti Nurhaliza • 1 minggu yang lalu</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.articles.edit', 2) }}" class="text-gray-400 hover:text-gray-500">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/100x100?text=Article3" alt="Article">
                                    </div>
                                    <div class="min-w-0 flex-1 px-4">
                                        <div>
                                            <p class="text-sm font-medium text-udinus-blue truncate">Tips Menjalani Perkuliahan Online dengan Efektif</p>
                                            <p class="mt-1 text-sm text-gray-500">Oleh Budi Santoso • 2 minggu yang lalu</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.articles.edit', 3) }}" class="text-gray-400 hover:text-gray-500">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Recent Comments -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Komentar Terbaru</h3>
                        <a href="{{ route('admin.comments.index') }}" class="text-sm font-medium text-udinus-blue hover:text-blue-700">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <ul class="divide-y divide-gray-200">
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=User1" alt="User">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Andi Pratama</p>
                                        <div class="flex space-x-2">
                                            <button class="text-green-600 hover:text-green-500">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-500">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-1">Pada artikel: UDINUS Raih Peringkat Terbaik</p>
                                    <p class="text-sm text-gray-700">Selamat untuk UDINUS! Semoga terus meningkatkan kualitas pendidikannya...</p>
                                </div>
                            </div>
                        </li>
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=User2" alt="User">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Siti Nurhaliza</p>
                                        <div class="flex space-x-2">
                                            <button class="text-green-600 hover:text-green-500">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-500">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-1">Pada artikel: Festival Kreativitas Mahasiswa</p>
                                    <p class="text-sm text-gray-700">Bangga sekali menjadi bagian dari UDINUS. Terima kasih atas dedikasi seluruh sivitas akademika...</p>
                                </div>
                            </div>
                        </li>
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/100x100?text=User3" alt="User">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Budi Santoso</p>
                                        <div class="flex space-x-2">
                                            <button class="text-yellow-600 hover:text-yellow-500">
                                                <i class="fas fa-clock"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-500">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-1">Pada artikel: Tips Menjalani Perkuliahan Online</p>
                                    <p class="text-sm text-gray-700">Semoga UDINUS bisa terus berinovasi dan berkolaborasi dengan industri untuk menghasilkan lulusan yang siap kerja...</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection