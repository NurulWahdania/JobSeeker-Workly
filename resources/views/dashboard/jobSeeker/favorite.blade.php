@extends('dashboard.template')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        @if (session('success'))
            <div class="bg-white border-l-4 border-green-500 p-4 mb-4 shadow-md rounded-r transition duration-500 ease-in-out">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-green-600">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-white border-l-4 border-red-500 p-4 mb-4 shadow-md rounded-r transition duration-500 ease-in-out">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 001.414-1.414L11.414 10l1.293-1.293a1 1 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-red-600">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Pekerjaan Favorit</h2>
            <span class="bg-[#04BDC5]/10 text-[#04BDC5] px-4 py-2 rounded-full text-sm font-medium">
                {{ count($favorites) }} tersimpan
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($favorites as $favorite)
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <div class="p-6">
                    <div class="flex justify-between">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $favorite->job->title }}</h3>
                            <p class="text-[#04BDC5] font-medium mb-3">{{ $favorite->job->employer->company_name }}</p>
                            
                            <div class="inline-flex items-center bg-gray-50 px-3 py-1 rounded-lg mb-4">
                                <svg class="w-4 h-4 text-[#04BDC5] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span class="text-gray-600 text-sm">{{ $favorite->job->location }}</span>
                            </div>
                        </div>

                        <form action="{{ route('jobseeker.favorite.remove', $favorite->job->id) }}" method="POST" 
                            class="self-start" onsubmit="return confirm('Hapus dari favorit?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 hover:bg-gray-50 rounded-full transition-colors">
                                <svg class="w-5 h-5 text-[#04BDC5]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-6.828 6.828a.5.5 0 01-.707 0L3.172 10.828a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <a href="{{ route('jobseeker.job.details', $favorite->job->id) }}" 
                        class="mt-4 block w-full text-center px-4 py-2 bg-gradient-to-r from-[#04BDC5] to-blue-500 text-white rounded-lg hover:opacity-90 transition-opacity">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
