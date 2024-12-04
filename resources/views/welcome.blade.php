<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Workly - Temukan Pekerjaan Impianmu</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-sm fixed w-full z-[1000] shadow-sm ">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-[#04BDC5] to-blue-600 bg-clip-text text-transparent">Workly</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-[#04BDC5]">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#04BDC5]">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-[#04BDC5] to-blue-600 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all">Daftar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-[#04BDC5] to-blue-600 min-h-screen flex items-center">
            <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
            <div class="max-w-6xl mx-auto px-4 py-20">
                <div class="text-center text-white">
                    <h1 class="text-5xl font-bold mb-6 leading-tight">Temukan Karir Impian Anda</h1>
                    <p class="text-2xl mb-12 text-blue-50">Ribuan lowongan kerja menanti Anda</p>
                    <div class="bg-white/20 backdrop-blur-md p-8 rounded-2xl max-w-3xl mx-auto">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="max-w-5xl mx-auto px-4 py-12">
            <h2 class="text-2xl font-bold mb-6">Kategori Populer</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach(['Teknologi', 'Keuangan', 'Kesehatan', 'Pendidikan'] as $category)
                    <div class="p-4 bg-white rounded-lg border hover:shadow-md transition-shadow">
                        <h3 class="font-medium text-gray-900">{{ $category }}</h3>
                        <p class="text-sm text-gray-500">500+ Lowongan</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Job Listings -->
        <div class="max-w-5xl mx-auto px-4 py-12">
            <h2 class="text-2xl font-bold mb-6">Lowongan Terbaru</h2>
            <div class="space-y-4">
                @foreach($jobs as $job)
                    <div class="bg-white p-4 rounded-lg border hover:shadow-md transition-shadow">
                        <h3 class="text-lg font-semibold">{{ $job->title }}</h3>
                        <p class="text-gray-600">{{ $job->location }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-blue-600">{{ $job->job_type }}</span>
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Lihat Detail →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-5xl mx-auto px-4 text-center">
                <p>© {{ date('Y') }} Workly. Hak Cipta Dilindungi.</p>
                <div class="mt-4 space-x-4 text-sm">
                    <a href="#" class="hover:text-blue-400">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-blue-400">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-blue-400">Hubungi Kami</a>
                </div>
            </div>
        </footer>
    </body>
</html>