@extends('dashboard.template')

@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('jobPost') }}" class="inline-flex items-center px-4 py-2 bg-[#04BDC5] text-white rounded-lg hover:bg-[#03a9b1] transition duration-150 ease-in-out mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar Pekerjaan
            </a>

            @if($jobSeeker)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-[#04BDC5] p-6 text-white">
                        <h2 class="text-3xl font-bold">Profil {{ $jobSeeker->full_name }}</h2>
                        <p class="mt-2 opacity-90">{{ $jobSeeker->bio }}</p>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="rounded-lg bg-gray-50 p-4 hover:shadow-md transition">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Kontak</h3>
                                <p class="text-gray-600"><span class="font-medium">Email:</span> {{ $jobSeeker->user->email }}</p>
                                <p class="text-gray-600"><span class="font-medium">Telepon:</span> {{ $jobSeeker->contact }}</p>
                                <p class="text-gray-600"><span class="font-medium">Alamat:</span> {{ $jobSeeker->address }}</p>
                            </div>

                            <div class="rounded-lg bg-gray-50 p-4 hover:shadow-md transition">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Data Pribadi</h3>
                                <p class="text-gray-600"><span class="font-medium">Tanggal Lahir:</span> {{ $jobSeeker->date_of_birth }}</p>
                                <p class="text-gray-600"><span class="font-medium">Jenis Kelamin:</span> {{ $jobSeeker->gender }}</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="rounded-lg bg-gray-50 p-4 hover:shadow-md transition">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Profesional</h3>
                                <p class="text-gray-600"><span class="font-medium">Keahlian:</span> {{ $jobSeeker->skills }}</p>
                                <p class="text-gray-600"><span class="font-medium">Pengalaman:</span> {{ $jobSeeker->experience }}</p>
                            </div>

                            <div class="rounded-lg bg-gray-50 p-4 hover:shadow-md transition">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Pendidikan & Sertifikat</h3>
                                <p class="text-gray-600"><span class="font-medium">Riwayat Pendidikan:</span> {{ $jobSeeker->education_history }}</p>
                                @if($jobSeeker->certificates)
                                    <p class="mt-2">
                                        <a href="{{ asset('storage/' . $jobSeeker->certificates) }}" 
                                           target="_blank" 
                                           class="inline-flex items-center text-blue-500 hover:text-blue-700 transition">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            Lihat Sertifikat
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
                    <p class="font-medium">Profil Pencari Kerja tidak ditemukan.</p>
                </div>
            @endif
        </div>
    </div>
@endsection