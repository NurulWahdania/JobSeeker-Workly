@extends('dashboard.template')

@section('header')
    <h1 class="text-3xl font-semibold text-[#04BDC5]">Edit Pengguna</h1>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-8">
                    @if (session('success'))
                        <div class="bg-[#04BDC5] text-white p-4 mb-6 rounded-lg shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-4 mb-6 rounded-lg shadow-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.update', $user->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin memperbarui data pengguna ini?');">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Nama Pengguna</label>
                                <input id="username" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#04BDC5] focus:border-[#04BDC5] transition duration-150"
                                    type="text" 
                                    name="username" 
                                    value="{{ $user->username }}" 
                                    required 
                                    autofocus />
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                                <input id="email" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#04BDC5] focus:border-[#04BDC5] transition duration-150"
                                    type="email" 
                                    name="email" 
                                    value="{{ $user->email }}" 
                                    required />
                            </div>

                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('admin.index') }}" 
                                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150">
                                    Kembali
                                </a>
                                <button type="submit" 
                                    class="px-6 py-2 bg-[#04BDC5] text-white rounded-lg hover:bg-blue-500 transition duration-150 shadow-sm">
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