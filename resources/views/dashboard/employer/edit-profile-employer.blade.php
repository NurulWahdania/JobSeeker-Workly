@extends('dashboard.template')

@section('header')
<div class="bg-[#04BDC5] text-white py-4 px-6 mb-6 rounded-lg">
    <h1 class="text-2xl font-bold">Edit Profil Perusahaan</h1>
</div>
@endsection

@section('content')
<div class="container max-w-4xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="p-6">
            <form action="{{ route('employer.update', $employer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        <ul class="list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label for="company_name" class="block text-gray-700 font-medium mb-2">Nama Perusahaan</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="company_name" name="company_name" value="{{ old('company_name', $employer->company_name ?? '') }}" required>
                        </div>

                        <div>
                            <label for="industry" class="block text-gray-700 font-medium mb-2">Industri</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="industry" name="industry" value="{{ old('industry', $employer->industry ?? '') }}">
                        </div>

                        <div>
                            <label for="website" class="block text-gray-700 font-medium mb-2">Website</label>
                            <input type="url" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="website" name="website" value="{{ old('website', $employer->website ?? '') }}">
                        </div>

                        <div>
                            <label for="contact" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                            <input type="tel" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="contact" name="contact" value="{{ old('contact', $employer->contact ?? '') }}">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="company_description" class="block text-gray-700 font-medium mb-2">Deskripsi Perusahaan</label>
                            <textarea class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="company_description" name="company_description" rows="4">{{ old('company_description', $employer->company_description ?? '') }}</textarea>
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <textarea class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="address" name="address" rows="3">{{ old('address', $employer->address ?? '') }}</textarea>
                        </div>

                        <div>
                            <label for="profile_picture" class="block text-gray-700 font-medium mb-2">Logo Perusahaan</label>
                            @if($employer->profile_picture)
                                <img src="{{ asset('storage/' . $employer->profile_picture) }}" alt="Logo Perusahaan" 
                                    class="mb-4 rounded-lg shadow-sm" style="max-width: 150px">
                            @endif
                            <input type="file" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-[#04BDC5]" 
                                id="profile_picture" name="profile_picture">
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button type="submit" class="bg-[#04BDC5] hover:bg-blue-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
                        Simpan Perubahan
                    </button>
                    {{-- <a href="{{ route('employer.create') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ml-4">
                        Batal
                    </a> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
