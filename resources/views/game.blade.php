@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-udinus-blue text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold sm:text-4xl">Game 3D Eksplorasi Kampus</h1>
        <p class="mt-3 max-w-2xl text-xl text-blue-100">
            Jelajahi kampus UDINUS dalam mode 3D interaktif
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Game Section -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Eksplorasi Kampus UDINUS</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Gunakan keyboard atau mouse untuk bergerak dan menjelajahi area kampus UDINUS
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <!-- Game Container -->
                        <div class="relative">
                            <div id="game-container" class="w-full h-96 bg-gray-900"></div>
                            
                            <!-- Loading Indicator -->
                            <div id="loading-indicator" class="absolute inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">
                                <div class="text-center">
                                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-udinus-blue"></div>
                                    <p class="mt-4 text-white">Memuat game 3D...</p>
                                </div>
                            </div>
                            
                            <!-- Game Controls -->
                            <div class="absolute bottom-4 left-4 bg-black bg-opacity-50 text-white p-3 rounded-md">
                                <p class="text-sm font-medium mb-2">Kontrol:</p>
                                <ul class="text-xs space-y-1">
                                    <li><i class="fas fa-arrow-up mr-1"></i> W - Maju</li>
                                    <li><i class="fas fa-arrow-down mr-1"></i> S - Mundur</li>
                                    <li><i class="fas fa-arrow-left mr-1"></i> A - Kiri</li>
                                    <li><i class="fas fa-arrow-right mr-1"></i> D - Kanan</li>
                                    <li><i class="fas fa-mouse mr-1"></i> Mouse - Melihat sekitar</li>
                                </ul>
                            </div>
                            
                            <!-- Game Info -->
                            <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white p-3 rounded-md">
                                <p class="text-sm font-medium">Lokasi: <span id="current-location">Gedung Rektorat</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Info -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Informasi Lokasi</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:p-6">
                            <div id="location-info">
                                <h4 class="text-md font-medium text-gray-900 mb-2">Gedung Rektorat</h4>
                                <p class="text-sm text-gray-700 mb-4">
                                    Gedung Rektorat adalah pusat administrasi Universitas Dian Nuswantoro. Di gedung ini terdapat kantor rektor, warek, dan berbagai unit administrasi lainnya.
                                </p>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-900 mb-1">Fasilitas</h5>
                                        <ul class="text-sm text-gray-700 list-disc pl-5">
                                            <li>Ruang Rektor</li>
                                            <li>Ruang Warek</li>
                                            <li>Unit Administrasi</li>
                                            <li>Ruang Rapat</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-900 mb-1">Jam Operasional</h5>
                                        <p class="text-sm text-gray-700">
                                            Senin - Jumat: 08.00 - 16.00 WIB<br>
                                            Sabtu: 08.00 - 12.00 WIB
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Location List -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Lokasi Kampus</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <ul class="divide-y divide-gray-200">
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="rektorat">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-university text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Gedung Rektorat</p>
                                        <p class="text-sm text-gray-500">Pusat administrasi</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="perpustakaan">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-book text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Perpustakaan</p>
                                        <p class="text-sm text-gray-500">Sumber belajar</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="laboratorium">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-flask text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Laboratorium</p>
                                        <p class="text-sm text-gray-500">Praktikum dan penelitian</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="aula">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-building text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Aula</p>
                                        <p class="text-sm text-gray-500">Acara dan seminar</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="kantin">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-utensils text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Kantin</p>
                                        <p class="text-sm text-gray-500">Tempat makan</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="gedung-olahraga">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-running text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Gedung Olahraga</p>
                                        <p class="text-sm text-gray-500">Aktivitas fisik</p>
                                    </div>
                                </div>
                            </li>
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 cursor-pointer location-item" data-location="taman">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-udinus-blue flex items-center justify-center">
                                            <i class="fas fa-tree text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-udinus-blue">Taman Kampus</p>
                                        <p class="text-sm text-gray-500">Area rekreasi</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Game Instructions -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Petunjuk Permainan</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-keyboard text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Gunakan tombol WASD pada keyboard untuk bergerak</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-mouse text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Gunakan mouse untuk melihat sekitar</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-hand-pointer text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Klik pada lokasi di daftar lokasi untuk langsung berpindah</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-expand-arrows-alt text-udinus-blue mt-0.5"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Tekan tombol F11 untuk mode layar penuh</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- System Requirements -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Spesifikasi Minimum</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h5 class="text-sm font-medium text-gray-900 mb-1">Prosesor</h5>
                                <p class="text-sm text-gray-700">Intel Core i3 atau setara</p>
                            </div>
                            <div>
                                <h5 class="text-sm font-medium text-gray-900 mb-1">Memori</h5>
                                <p class="text-sm text-gray-700">4 GB RAM</p>
                            </div>
                            <div>
                                <h5 class="text-sm font-medium text-gray-900 mb-1">Grafis</h5>
                                <p class="text-sm text-gray-700">WebGL 2.0 compatible</p>
                            </div>
                            <div>
                                <h5 class="text-sm font-medium text-gray-900 mb-1">Browser</h5>
                                <p class="text-sm text-gray-700">Chrome, Firefox, atau Edge</p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const gameContainer = document.getElementById('game-container');
        const loadingIndicator = document.getElementById('loading-indicator');
        const currentLocationElement = document.getElementById('current-location');
        const locationInfoElement = document.getElementById('location-info');
        const locationItems = document.querySelectorAll('.location-item');
        
        // Location data
        const locations = {
            'rektorat': {
                name: 'Gedung Rektorat',
                description: 'Gedung Rektorat adalah pusat administrasi Universitas Dian Nuswantoro. Di gedung ini terdapat kantor rektor, warek, dan berbagai unit administrasi lainnya.',
                facilities: ['Ruang Rektor', 'Ruang Warek', 'Unit Administrasi', 'Ruang Rapat'],
                operationalHours: 'Senin - Jumat: 08.00 - 16.00 WIB<br>Sabtu: 08.00 - 12.00 WIB',
                position: { x: 0, y: 0, z: 0 }
            },
            'perpustakaan': {
                name: 'Perpustakaan',
                description: 'Perpustakaan UDINUS menyediakan berbagai sumber belajar seperti buku, jurnal, e-book, dan akses database ilmiah.',
                facilities: ['Ruang Baca', 'Ruang Referensi', 'Ruang Diskusi', 'Komputer Catalog'],
                operationalHours: 'Senin - Sabtu: 08.00 - 20.00 WIB<br>Minggu: 10.00 - 18.00 WIB',
                position: { x: 50, y: 0, z: 0 }
            },
            'laboratorium': {
                name: 'Laboratorium',
                description: 'Laboratorium UDINUS dilengkapi dengan peralatan modern untuk mendukung kegiatan praktikum dan penelitian mahasiswa.',
                facilities: ['Lab Komputer', 'Lab Jaringan', 'Lab Multimedia', 'Lab Robotik'],
                operationalHours: 'Senin - Jumat: 08.00 - 16.00 WIB',
                position: { x: 100, y: 0, z: 0 }
            },
            'aula': {
                name: 'Aula',
                description: 'Aula UDINUS digunakan untuk berbagai acara seperti seminar, workshop, dan pertemuan besar.',
                facilities: ['Panggung', 'Ruang VIP', 'Sound System', 'Proyektor'],
                operationalHours: 'Senin - Sabtu: 08.00 - 20.00 WIB',
                position: { x: 0, y: 0, z: 50 }
            },
            'kantin': {
                name: 'Kantin',
                description: 'Kantin UDINUS menyediakan berbagai makanan dan minuman dengan harga terjangkau untuk seluruh sivitas akademika.',
                facilities: ['Food Court', 'Kedai Kopi', 'Vending Machine', 'Ruang Makan'],
                operationalHours: 'Senin - Sabtu: 07.00 - 20.00 WIB',
                position: { x: 0, y: 0, z: -50 }
            },
            'gedung-olahraga': {
                name: 'Gedung Olahraga',
                description: 'Gedung Olahraga UDINUS memiliki berbagai fasilitas untuk mendukung kegiatan olahraga mahasiswa.',
                facilities: ['Lapangan Basket', 'Lapangan Badminton', 'Fitness Center', 'Ruang Ganti'],
                operationalHours: 'Senin - Sabtu: 08.00 - 18.00 WIB',
                position: { x: -50, y: 0, z: 0 }
            },
            'taman': {
                name: 'Taman Kampus',
                description: 'Taman Kampus UDINUS adalah area hijau yang nyaman untuk bersantai dan berdiskusi.',
                facilities: ['Taman Hijau', 'Gazebo', 'Bangku Taman', 'Wi-Fi Area'],
                operationalHours: '24 jam',
                position: { x: 0, y: 0, z: 100 }
            }
        };
        
        // Initialize Three.js
        let scene, camera, renderer, controls;
        let currentLocation = 'rektorat';
        
        function init() {
            // Create scene
            scene = new THREE.Scene();
            scene.background = new THREE.Color(0x87CEEB); // Sky blue background
            
            // Create camera
            camera = new THREE.PerspectiveCamera(75, gameContainer.clientWidth / gameContainer.clientHeight, 0.1, 1000);
            camera.position.set(0, 5, 10);
            
            // Create renderer
            renderer = new THREE.WebGLRenderer({ antialias: true });
            renderer.setSize(gameContainer.clientWidth, gameContainer.clientHeight);
            renderer.shadowMap.enabled = true;
            gameContainer.appendChild(renderer.domElement);
            
            // Add lights
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
            scene.add(ambientLight);
            
            const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
            directionalLight.position.set(10, 20, 15);
            directionalLight.castShadow = true;
            scene.add(directionalLight);
            
            // Add ground
            const groundGeometry = new THREE.PlaneGeometry(200, 200);
            const groundMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x7CFC00, // Lawn green
                roughness: 0.8,
                metalness: 0.2
            });
            const ground = new THREE.Mesh(groundGeometry, groundMaterial);
            ground.rotation.x = -Math.PI / 2;
            ground.receiveShadow = true;
            scene.add(ground);
            
            // Add buildings
            addBuildings();
            
            // Add trees
            addTrees();
            
            // Add paths
            addPaths();
            
            // Setup controls
            setupControls();
            
            // Handle window resize
            window.addEventListener('resize', onWindowResize);
            
            // Hide loading indicator
            loadingIndicator.style.display = 'none';
            
            // Start animation
            animate();
        }
        
        function addBuildings() {
            // Rektorat Building
            const rektoratGeometry = new THREE.BoxGeometry(20, 15, 30);
            const rektoratMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x005BAC, // UDINUS blue
                roughness: 0.7,
                metalness: 0.3
            });
            const rektorat = new THREE.Mesh(rektoratGeometry, rektoratMaterial);
            rektorat.position.set(0, 7.5, 0);
            rektorat.castShadow = true;
            rektorat.receiveShadow = true;
            rektorat.userData = { location: 'rektorat' };
            scene.add(rektorat);
            
            // Add roof to rektorat
            const rektoratRoofGeometry = new THREE.ConeGeometry(15, 5, 4);
            const rektoratRoofMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x8B4513, // Saddle brown
                roughness: 0.9,
                metalness: 0.1
            });
            const rektoratRoof = new THREE.Mesh(rektoratRoofGeometry, rektoratRoofMaterial);
            rektoratRoof.position.set(0, 18.75, 0);
            rektoratRoof.rotation.y = Math.PI / 4;
            rektoratRoof.castShadow = true;
            scene.add(rektoratRoof);
            
            // Library Building
            const libraryGeometry = new THREE.BoxGeometry(25, 12, 20);
            const libraryMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x4682B4, // Steel blue
                roughness: 0.7,
                metalness: 0.3
            });
            const library = new THREE.Mesh(libraryGeometry, libraryMaterial);
            library.position.set(50, 6, 0);
            library.castShadow = true;
            library.receiveShadow = true;
            library.userData = { location: 'perpustakaan' };
            scene.add(library);
            
            // Laboratory Building
            const labGeometry = new THREE.BoxGeometry(30, 10, 25);
            const labMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x2E8B57, // Sea green
                roughness: 0.7,
                metalness: 0.3
            });
            const lab = new THREE.Mesh(labGeometry, labMaterial);
            lab.position.set(100, 5, 0);
            lab.castShadow = true;
            lab.receiveShadow = true;
            lab.userData = { location: 'laboratorium' };
            scene.add(lab);
            
            // Auditorium
            const auditoriumGeometry = new THREE.CylinderGeometry(15, 15, 8, 32);
            const auditoriumMaterial = new THREE.MeshStandardMaterial({ 
                color: 0xCD853F, // Peru
                roughness: 0.8,
                metalness: 0.2
            });
            const auditorium = new THREE.Mesh(auditoriumGeometry, auditoriumMaterial);
            auditorium.position.set(0, 4, 50);
            auditorium.castShadow = true;
            auditorium.receiveShadow = true;
            auditorium.userData = { location: 'aula' };
            scene.add(auditorium);
            
            // Canteen
            const canteenGeometry = new THREE.BoxGeometry(20, 5, 20);
            const canteenMaterial = new THREE.MeshStandardMaterial({ 
                color: 0xFF6347, // Tomato
                roughness: 0.8,
                metalness: 0.2
            });
            const canteen = new THREE.Mesh(canteenGeometry, canteenMaterial);
            canteen.position.set(0, 2.5, -50);
            canteen.castShadow = true;
            canteen.receiveShadow = true;
            canteen.userData = { location: 'kantin' };
            scene.add(canteen);
            
            // Sports Building
            const sportsGeometry = new THREE.BoxGeometry(40, 10, 30);
            const sportsMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x9370DB, // Medium purple
                roughness: 0.7,
                metalness: 0.3
            });
            const sports = new THREE.Mesh(sportsGeometry, sportsMaterial);
            sports.position.set(-50, 5, 0);
            sports.castShadow = true;
            sports.receiveShadow = true;
            sports.userData = { location: 'gedung-olahraga' };
            scene.add(sports);
        }
        
        function addTrees() {
            const treePositions = [
                { x: 30, z: 30 },
                { x: -30, z: 30 },
                { x: 30, z: -30 },
                { x: -30, z: -30 },
                { x: 70, z: 30 },
                { x: 70, z: -30 },
                { x: -70, z: 30 },
                { x: -70, z: -30 },
                { x: 0, z: 80 },
                { x: 0, z: -80 },
                { x: 80, z: 0 },
                { x: -80, z: 0 }
            ];
            
            treePositions.forEach(pos => {
                // Tree trunk
                const trunkGeometry = new THREE.CylinderGeometry(1, 1.5, 5, 8);
                const trunkMaterial = new THREE.MeshStandardMaterial({ 
                    color: 0x8B4513, // Saddle brown
                    roughness: 0.9,
                    metalness: 0.1
                });
                const trunk = new THREE.Mesh(trunkGeometry, trunkMaterial);
                trunk.position.set(pos.x, 2.5, pos.z);
                trunk.castShadow = true;
                trunk.receiveShadow = true;
                scene.add(trunk);
                
                // Tree leaves
                const leavesGeometry = new THREE.SphereGeometry(4, 8, 6);
                const leavesMaterial = new THREE.MeshStandardMaterial({ 
                    color: 0x228B22, // Forest green
                    roughness: 0.8,
                    metalness: 0.1
                });
                const leaves = new THREE.Mesh(leavesGeometry, leavesMaterial);
                leaves.position.set(pos.x, 7, pos.z);
                leaves.castShadow = true;
                leaves.receiveShadow = true;
                scene.add(leaves);
            });
            
            // Garden area
            const gardenGeometry = new THREE.CircleGeometry(15, 32);
            const gardenMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x32CD32, // Lime green
                roughness: 0.9,
                metalness: 0.1
            });
            const garden = new THREE.Mesh(gardenGeometry, gardenMaterial);
            garden.rotation.x = -Math.PI / 2;
            garden.position.set(0, 0.01, 100);
            garden.userData = { location: 'taman' };
            scene.add(garden);
            
            // Add benches in garden
            for (let i = 0; i < 4; i++) {
                const angle = (i / 4) * Math.PI * 2;
                const benchGeometry = new THREE.BoxGeometry(3, 1, 1);
                const benchMaterial = new THREE.MeshStandardMaterial({ 
                    color: 0x8B4513, // Saddle brown
                    roughness: 0.8,
                    metalness: 0.2
                });
                const bench = new THREE.Mesh(benchGeometry, benchMaterial);
                bench.position.set(Math.cos(angle) * 10, 0.5, 100 + Math.sin(angle) * 10);
                bench.rotation.y = angle + Math.PI / 2;
                bench.castShadow = true;
                bench.receiveShadow = true;
                scene.add(bench);
            }
        }
        
        function addPaths() {
            // Main path
            const mainPathGeometry = new THREE.PlaneGeometry(5, 200);
            const pathMaterial = new THREE.MeshStandardMaterial({ 
                color: 0x696969, // Dim gray
                roughness: 0.9,
                metalness: 0.1
            });
            const mainPath = new THREE.Mesh(mainPathGeometry, pathMaterial);
            mainPath.rotation.x = -Math.PI / 2;
            mainPath.position.set(0, 0.01, 0);
            scene.add(mainPath);
            
            // Horizontal paths
            const hPathGeometry = new THREE.PlaneGeometry(200, 5);
            const hPath1 = new THREE.Mesh(hPathGeometry, pathMaterial);
            hPath1.rotation.x = -Math.PI / 2;
            hPath1.position.set(0, 0.01, 0);
            scene.add(hPath1);
            
            // Path to garden
            const gardenPathGeometry = new THREE.PlaneGeometry(5, 50);
            const gardenPath = new THREE.Mesh(gardenPathGeometry, pathMaterial);
            gardenPath.rotation.x = -Math.PI / 2;
            gardenPath.position.set(0, 0.01, 75);
            scene.add(gardenPath);
            
            // Paths to buildings
            const buildingPaths = [
                { x: 50, z: 0 },
                { x: 100, z: 0 },
                { x: 0, z: 50 },
                { x: 0, z: -50 },
                { x: -50, z: 0 }
            ];
            
            buildingPaths.forEach(pos => {
                const pathGeometry = new THREE.PlaneGeometry(5, 50);
                const path = new THREE.Mesh(pathGeometry, pathMaterial);
                path.rotation.x = -Math.PI / 2;
                path.position.set(pos.x / 2, 0.01, pos.z / 2);
                
                // Rotate path if it's horizontal
                if (pos.z !== 0) {
                    path.rotation.z = Math.PI / 2;
                }
                
                scene.add(path);
            });
        }
        
        function setupControls() {
            // Keyboard controls
            const keyState = {};
            
            document.addEventListener('keydown', (e) => {
                keyState[e.key.toLowerCase()] = true;
            });
            
            document.addEventListener('keyup', (e) => {
                keyState[e.key.toLowerCase()] = false;
            });
            
            // Mouse controls
            let mouseX = 0, mouseY = 0;
            let isMouseDown = false;
            
            gameContainer.addEventListener('mousedown', () => {
                isMouseDown = true;
            });
            
            gameContainer.addEventListener('mouseup', () => {
                isMouseDown = false;
            });
            
            gameContainer.addEventListener('mousemove', (e) => {
                if (isMouseDown) {
                    const deltaX = e.movementX || 0;
                    const deltaY = e.movementY || 0;
                    
                    // Rotate camera based on mouse movement
                    camera.rotation.y -= deltaX * 0.005;
                    camera.rotation.x -= deltaY * 0.005;
                    
                    // Limit vertical rotation
                    camera.rotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, camera.rotation.x));
                }
            });
            
            // Update camera position based on keyboard input
            function updateCameraPosition() {
                const speed = 0.5;
                const direction = new THREE.Vector3();
                
                camera.getWorldDirection(direction);
                const right = new THREE.Vector3();
                right.crossVectors(direction, camera.up).normalize();
                
                if (keyState['w']) {
                    camera.position.addScaledVector(direction, speed);
                }
                if (keyState['s']) {
                    camera.position.addScaledVector(direction, -speed);
                }
                if (keyState['a']) {
                    camera.position.addScaledVector(right, -speed);
                }
                if (keyState['d']) {
                    camera.position.addScaledVector(right, speed);
                }
                
                // Keep camera at a constant height
                camera.position.y = 5;
                
                // Check if camera is near a building
                checkLocation();
            }
            
            // Add updateCameraPosition to the animation loop
            this.updateCameraPosition = updateCameraPosition;
        }
        
        function checkLocation() {
            const raycaster = new THREE.Raycaster();
            const directions = [
                new THREE.Vector3(1, 0, 0),
                new THREE.Vector3(-1, 0, 0),
                new THREE.Vector3(0, 0, 1),
                new THREE.Vector3(0, 0, -1)
            ];
            
            for (let direction of directions) {
                raycaster.set(camera.position, direction);
                const intersects = raycaster.intersectObjects(scene.children);
                
                if (intersects.length > 0 && intersects[0].distance < 10) {
                    const object = intersects[0].object;
                    if (object.userData && object.userData.location) {
                        const location = object.userData.location;
                        if (location !== currentLocation) {
                            currentLocation = location;
                            updateLocationInfo(location);
                        }
                        return;
                    }
                }
            }
        }
        
        function updateLocationInfo(location) {
            const locationData = locations[location];
            if (locationData) {
                currentLocationElement.textContent = locationData.name;
                
                let facilitiesHtml = '';
                locationData.facilities.forEach(facility => {
                    facilitiesHtml += `<li>${facility}</li>`;
                });
                
                locationInfoElement.innerHTML = `
                    <h4 class="text-md font-medium text-gray-900 mb-2">${locationData.name}</h4>
                    <p class="text-sm text-gray-700 mb-4">
                        ${locationData.description}
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h5 class="text-sm font-medium text-gray-900 mb-1">Fasilitas</h5>
                            <ul class="text-sm text-gray-700 list-disc pl-5">
                                ${facilitiesHtml}
                            </ul>
                        </div>
                        <div>
                            <h5 class="text-sm font-medium text-gray-900 mb-1">Jam Operasional</h5>
                            <p class="text-sm text-gray-700">
                                ${locationData.operationalHours}
                            </p>
                        </div>
                    </div>
                `;
            }
        }
        
        function onWindowResize() {
            camera.aspect = gameContainer.clientWidth / gameContainer.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(gameContainer.clientWidth, gameContainer.clientHeight);
        }
        
        function animate() {
            requestAnimationFrame(animate);
            
            // Update camera position based on keyboard input
            if (this.updateCameraPosition) {
                this.updateCameraPosition();
            }
            
            renderer.render(scene, camera);
        }
        
        // Handle location item clicks
        locationItems.forEach(item => {
            item.addEventListener('click', function() {
                const location = this.getAttribute('data-location');
                const locationData = locations[location];
                
                if (locationData) {
                    // Move camera to location
                    camera.position.set(
                        locationData.position.x,
                        10,
                        locationData.position.z + 20
                    );
                    
                    // Point camera at building
                    camera.lookAt(
                        locationData.position.x,
                        5,
                        locationData.position.z
                    );
                    
                    // Update location info
                    currentLocation = location;
                    updateLocationInfo(location);
                }
            });
        });
        
        // Initialize the game
        init();
    });
</script>
@endsection