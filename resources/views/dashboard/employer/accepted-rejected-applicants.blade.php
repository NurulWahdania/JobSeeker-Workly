@extends('dashboard.template')

@section('header')
    <h1 class="text-2xl font-bold text-[#04BDC5]">Pelamar Diterima/Ditolak</h1>
@endsection

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (!$employer)
            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 001.414-1.414L11.414 10l1.293-1.293a1 1 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Profil Belum Lengkap</h3>
                        <p class="text-sm text-red-700">Silakan lengkapi profil Anda sebelum mengakses halaman ini.</p>
                    </div>
                </div>
            </div>
        @else
            @foreach ($jobPosts as $jobPost)
                <div class="bg-white rounded-lg shadow-sm mb-6 overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-[#04BDC5] mb-6">{{ $jobPost->title }}</h2>
                        
                        <!-{{-- - Tabs -->
                        <div class="mb-6 border-b border-gray-200">
                            <div class="flex space-x-8">
                                <button class="border-b-2 border-[#04BDC5] py-2 px-1 text-[#04BDC5] font-medium">
                                    Pelamar Diterima
                                </button>
                                <button class="py-2 px-1 text-gray-500 hover:text-[#04BDC5]">
                                    Pelamar Ditolak
                                </button>
                            </div>
                        </div>

       --}}                  <!-- Tables -->
                        <div class="space-y-8">
                            <!-- Accepted Applicants Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelamar</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokumen</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($jobPost->jobAplications as $application)
                                            @if ($application->status === 'accepted')
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center">
                                                            <div>
                                                                <div class="text-sm font-medium text-gray-900">{{ $application->jobSeeker->full_name }}</div>
                                                                <div class="text-sm text-gray-500">{{ $application->jobSeeker->user->email }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="text-sm text-gray-900">{{ $application->jobSeeker->date_of_birth }}</div>
                                                        <div class="text-sm text-gray-500">{{ ucfirst($application->jobSeeker->gender) }}</div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex space-x-2">
                                                            <a href="{{ asset('storage/' . $application->cv) }}" target="_blank"
                                                                class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                                Lihat CV
                                                            </a>
                                                            <a href="{{ route('employer.profile', $application->jobSeeker->id) }}"
                                                                class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-[#04BDC5] hover:bg-[#03a9b0] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#04BDC5]">
                                                                Profil
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            Diterima
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Similar structure for Rejected Applicants -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelamar</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokumen</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($jobPost->jobAplications as $application)
                                            @if ($application->status === 'rejected')
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center">
                                                            <div>
                                                                <div class="text-sm font-medium text-gray-900">{{ $application->jobSeeker->full_name }}</div>
                                                                <div class="text-sm text-gray-500">{{ $application->jobSeeker->user->email }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="text-sm text-gray-900">{{ $application->jobSeeker->date_of_birth }}</div>
                                                        <div class="text-sm text-gray-500">{{ ucfirst($application->jobSeeker->gender) }}</div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex space-x-2">
                                                            <a href="{{ asset('storage/' . $application->cv) }}" target="_blank"
                                                                class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                                Lihat CV
                                                            </a>
                                                            <a href="{{ route('employer.profile', $application->jobSeeker->id) }}"
                                                                class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-[#04BDC5] hover:bg-[#03a9b0] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#04BDC5]">
                                                                Profil
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                            Ditolak
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection