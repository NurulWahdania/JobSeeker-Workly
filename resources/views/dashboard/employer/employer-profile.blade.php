@extends('dashboard.template')

@section('header')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Profil Perusahaan
        </h1>
        <div class="h-1 w-20 bg-gradient-to-r from-[#04BDC5] to-blue-500 mt-2"></div>
    </div>
@endsection

@section('content')
<div class="container mx-auto px-4 max-w-4xl py-6">
    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
        @if(isset($employer) && $employer->id)
            <div class="flex flex-col items-center p-6 border-b border-gray-100">
                <img src="{{ asset('storage/' . $employer->profile_picture) }}" 
                     alt="Logo Perusahaan" 
                     class="h-40 w-40 object-cover rounded-full border-4 border-[#04BDC5] mb-4 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mt-2">{{ $employer->company_name }}</h2>
            </div>
            
            <div class="border-b border-gray-100">
                <div class="flex items-center space-x-3 p-6">
                    <svg class="w-6 h-6 text-[#04BDC5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Informasi Perusahaan</h2>
                </div>
            </div>

            <div class="p-6">
                <div class="grid gap-6">
                    <div class="group hover:bg-gray-50 p-4 rounded-lg transition-all duration-200">
                        <label class="block text-sm font-semibold text-gray-600 mb-2 group-hover:text-[#04BDC5]">
                            Nama Perusahaan
                        </label>
                        <p class="text-lg text-gray-900">{{ $employer->company_name }}</p>
                    </div>

                    <div class="group hover:bg-gray-50 p-4 rounded-lg transition-all duration-200">
                        <label class="block text-sm font-semibold text-gray-600 mb-2 group-hover:text-[#04BDC5]">
                            Deskripsi Perusahaan
                        </label>
                        <p class="text-lg text-gray-900">{{ $employer->company_description }}</p>
                    </div>

                    <div class="group hover:bg-gray-50 p-4 rounded-lg transition-all duration-200">
                        <label class="block text-sm font-semibold text-gray-600 mb-2 group-hover:text-[#04BDC5]">
                            Industri
                        </label>
                        <p class="text-lg text-gray-900">{{ $employer->industry }}</p>
                    </div>

                    <div class="group hover:bg-gray-50 p-4 rounded-lg transition-all duration-200">
                        <label class="block text-sm font-semibold text-gray-600 mb-2 group-hover:text-[#04BDC5]">
                            Website
                        </label>
                        <p class="text-lg text-gray-900">{{ $employer->website }}</p>
                    </div>

                    <div class="group hover:bg-gray-50 p-4 rounded-lg transition-all duration-200">
                        <label class="block text-sm font-semibold text-gray-600 mb-2 group-hover:text-[#04BDC5]">
                            Nomor Telepon
                        </label>
                        <p class="text-lg text-gray-900">{{ $employer->contact }}</p>
                    </div>

                    <div class="group hover:bg-gray-50 p-4 rounded-lg transition-all duration-200">
                        <label class="block text-sm font-semibold text-gray-600 mb-2 group-hover:text-[#04BDC5]">
                            Alamat
                        </label>
                        <p class="text-lg text-gray-900">{{ $employer->address }}</p>
                    </div>

                    <div class="flex justify-end pt-6">
                        <a href="{{ route('employer.edit', $employer->id) }}" 
                           class="inline-flex items-center px-6 py-3 bg-[#04BDC5] text-white font-medium rounded-lg transition-all duration-200 ease-in-out hover:bg-[#03a9b0] hover:shadow-lg focus:ring-2 focus:ring-offset-2 focus:ring-[#04BDC5]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="p-6">
                <form action="{{ route('employer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md animate-shake">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <ul class="list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="space-y-6">
                        <!-- Move profile picture input to top -->
                        <div class="group mb-6">
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-[#04BDC5]">
                                Logo Perusahaan
                            </label>
                            <input type="file" 
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 hover:border-[#04BDC5] transition-colors duration-200" 
                                   id="profile_picture" 
                                   name="profile_picture">
                        </div>

                        <div class="group">
                            <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Perusahaan
                            </label>
                            <input type="text" 
                                   class="w-full rounded-lg border-gray-200 focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 transition-colors duration-200" 
                                   id="company_name" 
                                   name="company_name" 
                                   value="{{ old('company_name') }}" 
                                   required>
                        </div>

                        <div class="group">
                            <label for="company_description" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-[#04BDC5]">
                                Deskripsi Perusahaan
                            </label>
                            <textarea class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 hover:border-[#04BDC5] transition-colors duration-200" 
                                      id="company_description" 
                                      name="company_description" 
                                      rows="4">{{ old('company_description') }}</textarea>
                        </div>

                        <div class="group">
                            <label for="industry" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-[#04BDC5]">
                                Industri
                            </label>
                            <input type="text" 
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 hover:border-[#04BDC5] transition-colors duration-200" 
                                   id="industry" 
                                   name="industry" 
                                   value="{{ old('industry') }}">
                        </div>

                        <div class="group">
                            <label for="website" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-[#04BDC5]">
                                Website
                            </label>
                            <input type="url" 
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 hover:border-[#04BDC5] transition-colors duration-200" 
                                   id="website" 
                                   name="website" 
                                   value="{{ old('website') }}">
                        </div>

                        <div class="group">
                            <label for="contact" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-[#04BDC5]">
                                Nomor Telepon
                            </label>
                            <input type="tel" 
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 hover:border-[#04BDC5] transition-colors duration-200" 
                                   id="contact" 
                                   name="contact" 
                                   value="{{ old('contact') }}">
                        </div>

                        <div class="group">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-[#04BDC5]">
                                Alamat
                            </label>
                            <textarea class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#04BDC5] focus:ring focus:ring-[#04BDC5] focus:ring-opacity-20 hover:border-[#04BDC5] transition-colors duration-200" 
                                      id="address" 
                                      name="address" 
                                      rows="3">{{ old('address') }}</textarea>
                        </div>

                        <button type="submit" 
                                class="w-full sm:w-auto px-6 py-3 bg-[#04BDC5] text-white font-medium rounded-lg transition-all duration-200 ease-in-out hover:bg-[#03a9b0] hover:shadow-lg focus:ring-2 focus:ring-offset-2 focus:ring-[#04BDC5] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Profil
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>

<style>
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }
</style>
@endsection