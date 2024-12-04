<nav class="fixed top-0 z-50 w-full bg-white shadow-sm border-b border-gray-100 dark:bg-gray-900 dark:border-gray-800">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ url('dashboard') }}" class="flex items-center transform hover:scale-105 transition-transform">
                    <img src="{{ asset('storage/assets/LOGOO.png') }}" class="h-10 w-10 rounded-lg shadow-md" alt="Logo">
                    <span class="ml-3 text-2xl font-bold bg-gradient-to-r from-[#04BDC5] to-indigo-600 bg-clip-text text-transparent">
                        Workly
                    </span>
                </a>

                <!-- Menu Navigasi -->
                <div class="hidden lg:flex items-center space-x-4">
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                            {{ __('Kelola Pengguna') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.listEmployers')" :active="request()->routeIs('admin.listEmployers')">
                            {{ __('Kelola Pemberi Kerja') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::check() && Auth::user()->role === 'employer')
                        <x-nav-link :href="route('jobPost')" :active="request()->routeIs('jobPost')">
                            {{ __('Daftar Pekerjaan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('employer.index')" :active="request()->routeIs('employer.create')">
                            {{ __('Profil Pemberi Kerja') }}
                        </x-nav-link>
                        <x-nav-link :href="route('employer.applications')" :active="request()->routeIs('employer.applications')">
                            {{ __('Pelamar Diterima/Ditolak') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::check() && Auth::user()->role === 'job_seeker')
                        <x-nav-link :href="route('jobSeeker.create')" :active="request()->routeIs('jobSeeker.create')">
                            {{ __('Profil Pencari Kerja') }}
                        </x-nav-link>
                        <x-nav-link :href="route('jobseeker.job.list')" :active="request()->routeIs('jobseeker.job.list')">
                            {{ __('Lihat Pekerjaan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('jobSeeker.applications')" :active="request()->routeIs('jobSeeker.applications')">
                            {{ __('Status Lamaran') }}
                        </x-nav-link>
                        <x-nav-link :href="route('jobseeker.favorites')" :active="request()->routeIs('jobseeker.favorites')">
                            {{ __('Pekerjaan Favorit') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Tombol Menu Mobile -->
            <div class="flex items-center lg:hidden">
                <button class="mobile-menu-button p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>

            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center space-x-3 px-4 py-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
                        @if (Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                                 class="h-8 w-8 rounded-full object-cover" 
                                 alt="Foto Profil">
                        @else
                            <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                            </div>
                        @endif
                        <div class="text-gray-700 dark:text-gray-300">{{ Auth::user()->username }}</div>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                        <ion-icon name="person-outline" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Profil') }}</span>
                    </x-dropdown-link>

                    {{-- Autentikasi --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                            class="flex items-center">
                            <ion-icon name="log-out-outline" class="w-5 h-5 text-gray-700"></ion-icon>
                            <span class="ms-3">{{ __('Keluar') }}</span>
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Menu Navigasi Mobile -->
        <div class="mobile-menu hidden lg:hidden mt-4">
            @if (Auth::check() && Auth::user()->role === 'admin')
                <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                    {{ __('Kelola Pengguna') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.listEmployers')" :active="request()->routeIs('admin.listEmployers')">
                    {{ __('Kelola Pemberi Kerja') }}
                </x-nav-link>
            @endif

            @if (Auth::check() && Auth::user()->role === 'employer')
                <x-nav-link :href="route('jobPost')" :active="request()->routeIs('jobPost')">
                    {{ __('Daftar Pekerjaan') }}
                </x-nav-link>
                <x-nav-link :href="route('employer.index')" :active="request()->routeIs('employer.create')">
                    {{ __('Profil Pemberi Kerja') }}
                </x-nav-link>
                <x-nav-link :href="route('employer.applications')" :active="request()->routeIs('employer.applications')">
                    {{ __('Pelamar Diterima/Ditolak') }}
                </x-nav-link>
            @endif

            @if (Auth::check() && Auth::user()->role === 'job_seeker')
                <x-nav-link :href="route('jobSeeker.create')" :active="request()->routeIs('jobSeeker.create')">
                    {{ __('Profil Pencari Kerja') }}
                </x-nav-link>
                <x-nav-link :href="route('jobseeker.job.list')" :active="request()->routeIs('jobseeker.job.list')">
                    {{ __('Lihat Pekerjaan') }}
                </x-nav-link>
                <x-nav-link :href="route('jobSeeker.applications')" :active="request()->routeIs('jobSeeker.applications')">
                    {{ __('Status Lamaran') }}
                </x-nav-link>
                <x-nav-link :href="route('jobseeker.favorites')" :active="request()->routeIs('jobseeker.favorites')">
                    {{ __('Pekerjaan Favorit') }}
                </x-nav-link>
            @endif
        </div>
    </div>
</nav>

<style>
    .x-nav-link {
        @apply px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all;
    }
    
    .x-nav-link.active {
        @apply text-blue-600 bg-blue-50;
    }

    @media (max-width: 1024px) {
        .mobile-menu {
            @apply pb-4 space-y-2;
        }
        
        .mobile-menu .x-nav-link {
            @apply block w-full;
        }
    }
</style>

<script>
    // Tambahkan fungsionalitas toggle menu mobile
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
</script>