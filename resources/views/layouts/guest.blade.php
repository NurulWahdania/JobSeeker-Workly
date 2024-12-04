<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Additional Fonts & Icons -->
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .simple-bg {
                background: linear-gradient(135deg, #04BDC5 0%, #3b82f6 100%);
                position: relative;
                overflow: hidden;
            }
            .card-hover {
                transition: transform 0.2s ease;
            }
            .card-hover:hover {
                transform: translateY(-5px);
            }
            .glass-effect {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen simple-bg flex flex-col items-center justify-center p-4">
            <!-- Logo Section -->
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-bold text-white mb-1">
                    <i class="fas fa-briefcase mr-2"></i>workly
                </h1>
                <p class="text-white/90 text-sm">Temukan Pekerjaan Impianmu</p>
            </div>

            <!-- Main Content Card -->
            <div class="w-full max-w-md">
                <div class="glass-effect p-6 rounded-lg shadow-lg card-hover">
                    {{ $slot }}
                </div>
            </div>

            <!-- Simple Footer -->
            <div class="mt-8 text-white/80 text-sm">
                <p>&copy; {{ date('Y') }} workly - Portal Lowongan Kerja</p>
            </div>
        </div>
    </body>
</html>
