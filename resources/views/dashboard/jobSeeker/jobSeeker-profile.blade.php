@extends('dashboard.template')

@section('content')
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-100">
                <div class="p-8">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4" style="color: #04BDC5">Profil Pencari Kerja</h2>
                    
                    @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                        <form action="{{ route('jobSeeker.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                    @endif

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                            @if(isset($jobSeeker) && $jobSeeker->profile_picture)
                                <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" alt="Foto Profil" 
                                    class="mt-2 w-32 h-32 rounded-full shadow-lg border-4" style="border-color: #04BDC5">
                            @else
                                @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                                    <input type="file" name="profile_picture" 
                                        class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-500 hover:file:bg-blue-100">
                                @else
                                    <div class="mt-2 w-32 h-32 rounded-full shadow-lg flex items-center justify-center text-2xl font-bold text-white" style="background-color: #04BDC5">
                                        {{ strtoupper(substr($jobSeeker->full_name ?? 'NA', 0, 2)) }}
                                    </div>
                                @endif
                            @endif
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="full_name" value="{{ $jobSeeker->full_name ?? '' }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" name="date_of_birth" value="{{ $jobSeeker->date_of_birth ?? '' }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                            @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                                <select name="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            @else
                                <input type="text" value="{{ ucfirst($jobSeeker->gender ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly>
                            @endif
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Telepon</label>
                            <input type="text" name="contact" value="{{ $jobSeeker->contact ?? '' }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                            <input type="text" name="address" value="{{ $jobSeeker->address ?? '' }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Bio</label>
                            <textarea rows="4" name="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>{{ $jobSeeker->bio ?? '' }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Keahlian</label>
                            <textarea rows="4" name="skills" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>{{ $jobSeeker->skills ?? '' }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                            <textarea rows="4" name="education_history" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>{{ $jobSeeker->education_history ?? '' }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Sertifikat</label>
                            @if(isset($jobSeeker) && $jobSeeker->certificates)
                                <a href="{{ asset('storage/' . $jobSeeker->certificates) }}" target="_blank" 
                                    class="inline-flex items-center px-4 py-2 rounded-lg text-white bg-[#04BDC5] hover:bg-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat Sertifikat
                                </a>
                            @else
                                <input type="file" name="certificates" 
                                    class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-500 hover:file:bg-blue-100">
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 border-t pt-6">
                        @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                            <button type="submit" style="background-color: #04BDC5" 
                                class="inline-flex items-center px-6 py-3 rounded-lg text-white hover:bg-opacity-90 transition-colors shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                                Simpan Profil
                            </button>
                            </form>
                        @else
                            <a href="{{ route('jobSeeker.edit', $jobSeeker->id) }}" 
                                class="inline-flex items-center px-6 py-3 rounded-lg text-white hover:bg-opacity-90 transition-colors shadow-lg" style="background-color: #04BDC5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Profil
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection