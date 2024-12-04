@extends('dashboard.template')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#04BDC5] to-blue-500 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Edit Profil</h2>
            </div>

            <div class="p-6">
                <form action="{{ route('jobSeeker.update', $jobSeeker->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Profile Picture Section -->
                    <div class="flex justify-center mb-8">
                        <div class="relative">
                            @if(isset($jobSeeker) && $jobSeeker->profile_picture)
                                <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" 
                                     class="w-32 h-32 rounded-full border-4 border-[#04BDC5] object-cover">
                            @else
                                <div class="w-32 h-32 rounded-full bg-[#04BDC5] flex items-center justify-center text-white text-3xl">
                                    {{ strtoupper(substr($jobSeeker->full_name ?? 'NA', 0, 2)) }}
                                </div>
                            @endif
                            <label class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-lg cursor-pointer hover:bg-gray-50">
                                <input type="file" name="profile_picture" class="hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#04BDC5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="space-y-6">
                        <!-- Personal Info Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="full_name" value="{{ old('full_name', $jobSeeker->full_name ?? '') }}"
                                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent">
                            </div>

                            <div class="form-group">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                                <input type="text" name="contact" value="{{ old('contact', $jobSeeker->contact ?? '') }}"
                                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent">
                            </div>
                        </div>

                        <!-- Additional Fields -->
                        <div class="space-y-4">
                            <div>
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $jobSeeker->date_of_birth ?? '') }}"
                                       class="w-full rounded-lg border-gray-300 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                                <select name="gender" id="gender" 
                                        class="w-full rounded-lg border-gray-300 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-50">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="male" {{ old('gender', $jobSeeker->gender ?? '') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="female" {{ old('gender', $jobSeeker->gender ?? '') == 'female' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $jobSeeker->address ?? '') }}"
                                       class="w-full rounded-lg border-gray-300 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Bidang Lebar Penuh -->
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                                <textarea name="bio" id="bio" rows="3" 
                                          class="w-full rounded-lg border-gray-300 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-50">{{ old('bio', $jobSeeker->bio ?? '') }}</textarea>
                            </div>
                            <div>
                                <label for="skills" class="block text-sm font-medium text-gray-700 mb-1">Keahlian</label>
                                <textarea name="skills" id="skills" rows="3"
                                          class="w-full rounded-lg border-gray-300 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-50">{{ old('skills', $jobSeeker->skills ?? '') }}</textarea>
                            </div>
                            <div>
                                <label for="education_history" class="block text-sm font-medium text-gray-700 mb-1">Pendidikan</label>
                                <textarea name="education_history" id="education_history" rows="3"
                                          class="w-full rounded-lg border-gray-300 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-50">{{ old('education_history', $jobSeeker->education_history ?? '') }}</textarea>
                            </div>
                            
                            <div class="certificates-section">
                                <label for="certificates" class="block text-sm font-medium text-gray-700 mb-1">Sertifikat</label>
                                <input type="file" name="certificates" id="certificates" 
                                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                                              file:text-sm file:bg-[#04BDC5] file:text-white hover:file:bg-blue-500">
                                @if(isset($jobSeeker) && $jobSeeker->certificates)
                                    <a href="{{ asset('storage/' . $jobSeeker->certificates) }}" target="_blank" 
                                       class="inline-block mt-2 text-[#04BDC5] hover:text-blue-500">Lihat Sertifikat Saat Ini</a>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button type="submit" 
                                    style="background-color: #04BDC5;"
                                    class="px-6 py-3 text-white rounded-lg hover:bg-blue-500 
                                           transition-all duration-200 transform hover:scale-105 
                                           focus:outline-none focus:ring-2 focus:ring-offset-2 
                                           focus:ring-[#04BDC5] font-medium">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
