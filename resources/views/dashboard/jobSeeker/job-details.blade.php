@extends('dashboard.template')

@section('content')
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8">
                    <!-- Header Section -->
                    <div class="flex justify-between items-start mb-8 border-b pb-6">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $job->title }}</h2>
                            <p class="text-lg text-[#04BDC5] font-medium">{{ $job->employer->company_name }}</p>
                        </div>
                        @if ($cekFavorit)
                            <form action="{{ route('jobseeker.favorite', $job->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-600 transition-colors">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-6.828 6.828a.5.5 0 01-.707 0L3.172 10.828a4 4 0 010-5.656z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('jobseeker.favorite', $job->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-6.828 6.828a.5.5 0 01-.707 0L3.172 10.828a4 4 0 010-5.656z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Info Pekerjaan -->
                    <div class="grid grid-cols-2 gap-6 mb-8 bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center text-gray-700">
                            <svg class="w-6 h-6 mr-3 text-[#04BDC5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-base font-medium">{{ $job->location }}</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-6 h-6 mr-3 text-[#04BDC5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-base font-medium">{{ $job->job_type }}</span>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4 text-[#04BDC5]">Deskripsi Pekerjaan</h3>
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <p class="text-gray-700 leading-relaxed">{{ $job->description }}</p>
                        </div>
                    </div>

                    <!-- Persyaratan -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4 text-[#04BDC5]">Persyaratan</h3>
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <ul class="list-disc list-inside space-y-2">
                                @foreach (explode("\n", $job->requirements) as $requirement)
                                    <li class="text-gray-700">{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Detail Pekerjaan -->
                    <div class="grid grid-cols-3 gap-6 mb-8">
                        <div class="bg-gradient-to-br from-[#04BDC5]/10 to-blue-500/10 p-6 rounded-xl border border-[#04BDC5]/20">
                            <h4 class="font-semibold text-[#04BDC5] mb-2">Gaji</h4>
                            <p class="text-gray-700 font-medium">Rp {{ number_format($job->salary, 0, ',', '.') }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-[#04BDC5]/10 to-blue-500/10 p-6 rounded-xl border border-[#04BDC5]/20">
                            <h4 class="font-semibold text-[#04BDC5] mb-2">Pembayaran</h4>
                            <p class="text-gray-700 font-medium">
                                @switch($job->payday)
                                    @case('weekly')
                                        Mingguan
                                        @break
                                    @case('daily')
                                        Harian
                                        @break
                                    @case('yearly')
                                        Tahunan
                                        @break
                                    @case('monthly')
                                        Bulanan
                                        @break
                                    @default
                                        {{ $job->payday }}
                                @endswitch
                            </p>
                        </div>
                        <div class="bg-gradient-to-br from-[#04BDC5]/10 to-blue-500/10 p-6 rounded-xl border border-[#04BDC5]/20">
                            <h4 class="font-semibold text-[#04BDC5] mb-2">Status</h4>
                            <p class="text-gray-700 font-medium">{{ $job->status == 'active' ? 'Aktif' : $job->status }}</p>
                        </div>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="flex justify-start">
                        <a href="{{ route('jobseeker.job.list') }}" 
                            class="inline-flex items-center px-6 py-3 bg-[#04BDC5] text-white font-medium rounded-lg hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali ke Daftar Pekerjaan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
