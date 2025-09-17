<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register - #SUPORTMABA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-container {
            transition: all 0.5s ease;
        }
        .form-hidden {
            opacity: 0;
            transform: translateY(-20px);
            pointer-events: none;
            position: absolute;
        }
        .form-visible {
            opacity: 1;
            transform: translateY(0);
            position: relative;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #005BAC 0%, #003d75 100%);
        }
        .input-focus:focus {
            border-color: #005BAC;
            box-shadow: 0 0 0 3px rgba(0, 91, 172, 0.2);
        }
        .btn-primary {
            background-color: #005BAC;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #004a94;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 91, 172, 0.3);
        }
        .switch-btn {
            transition: all 0.3s ease;
        }
        .switch-btn.active {
            background-color: #005BAC;
            color: white;
        }
    </style>
</head>
<body class="h-full gradient-bg flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row">
        <!-- Left Side - Illustration -->
        <div class="md:w-1/2 bg-blue-50 p-8 flex flex-col justify-center items-center">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-800 mb-2">#SUPORTMABA</h1>
                <p class="text-blue-600">Portal Informasi Mahasiswa Baru UDINUS</p>
            </div>
            
            <div class="mb-8">
                <img src="https://udinus.ac.id/wp-content/uploads/2021/08/cropped-logo-udinus-1.png" alt="UDINUS Logo" class="h-24 mx-auto">
            </div>
            
            <div class="text-center">
                <h2 class="text-xl font-semibold text-blue-800 mb-4">Selamat Datang di Komunitas Kampus!</h2>
                <p class="text-blue-600">Bergabunglah dengan ribuan mahasiswa UDINUS untuk mendapatkan informasi terkini seputar kampus, UKM, dan kegiatan mahasiswa.</p>
            </div>
        </div>
        
        <!-- Right Side - Forms -->
        <div class="md:w-1/2 p-8 relative">
            <!-- Toggle Buttons -->
            <div class="flex mb-8 rounded-lg bg-gray-100 p-1">
                <button id="loginBtn" class="flex-1 py-2 px-4 rounded-md font-medium switch-btn active">Login</button>
                <button id="registerBtn" class="flex-1 py-2 px-4 rounded-md font-medium switch-btn">Register</button>
            </div>
            
            <!-- Login Form -->
            <div id="loginForm" class="form-container form-visible">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Masuk ke Akun Anda</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="nama@email.com" required>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" name="password" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="••••••••" required>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                        </div>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Lupa password?</a>
                    </div>
                    
                    <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md btn-primary focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Masuk
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">Belum punya akun? <a href="#" id="showRegister" class="text-blue-600 font-medium hover:text-blue-800">Daftar sekarang</a></p>
                </div>
            </div>
            
            <!-- Register Form -->
            <div id="registerForm" class="form-container form-hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Akun Baru</h2>
                
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="John Doe" required>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="nim" class="block text-gray-700 mb-2">NIM</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <input id="nim" type="text" name="nim" value="{{ old('nim') }}" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="A21.XXXX.XXXXX" required>
                        </div>
                        @error('nim')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="prodi" class="block text-gray-700 mb-2">Program Studi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-graduation-cap text-gray-400"></i>
                            </div>
                            <select id="prodi" name="prodi" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" required>
                                <option value="" disabled selected>Pilih Program Studi</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                            </select>
                        </div>
                        @error('prodi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="nama@mahasiswa.udinus.ac.id" required>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" name="password" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="••••••••" required>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" 
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus" 
                                placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md btn-primary focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Daftar
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">Sudah punya akun? <a href="#" id="showLogin" class="text-blue-600 font-medium hover:text-blue-800">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginBtn = document.getElementById('loginBtn');
            const registerBtn = document.getElementById('registerBtn');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');
            
            function showLoginForm() {
                loginForm.classList.remove('form-hidden');
                loginForm.classList.add('form-visible');
                registerForm.classList.remove('form-visible');
                registerForm.classList.add('form-hidden');
                loginBtn.classList.add('active');
                registerBtn.classList.remove('active');
            }
            
            function showRegisterForm() {
                registerForm.classList.remove('form-hidden');
                registerForm.classList.add('form-visible');
                loginForm.classList.remove('form-visible');
                loginForm.classList.add('form-hidden');
                registerBtn.classList.add('active');
                loginBtn.classList.remove('active');
            }
            
            loginBtn.addEventListener('click', showLoginForm);
            showLogin.addEventListener('click', function(e) {
                e.preventDefault();
                showLoginForm();
            });
            
            registerBtn.addEventListener('click', showRegisterForm);
            showRegister.addEventListener('click', function(e) {
                e.preventDefault();
                showRegisterForm();
            });
        });
    </script>
</body>
</html>