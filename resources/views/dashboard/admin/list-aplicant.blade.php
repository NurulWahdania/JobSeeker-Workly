@extends('dashboard.template')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Simple Header -->
        <div class="bg-[#04BDC5] rounded-lg shadow-md mb-6 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('employer.jobs', $jobPost->employer->id) }}" 
                       class="inline-flex items-center px-3 py-2 bg-white/10 hover:bg-white/20 rounded-md text-white text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    <h1 class="text-2xl font-bold text-white mt-3">{{ $jobPost->title }}</h1>
                    <p class="text-white/90 text-sm mt-1">{{ $jobPost->jobAplications->count() }} Pelamar</p>
                </div>
            </div>
        </div>

        <!-- Simplified Applicants List -->
        <div class="bg-white rounded-lg shadow-md">
            @if($jobPost->jobAplications->isEmpty())
                <div class="p-8 text-center">
                    <svg class="w-16 h-16 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900">Tidak ada Pelamar</h3>
                </div>
            @else
                <div class="divide-y divide-gray-100">
                    @foreach ($jobPost->jobAplications as $application)
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-start space-x-4">
                                <!-- Profile Picture -->
                                <div class="flex-shrink-0">
                                    @if($application->jobSeeker->profile_picture)
                                        <img src="{{ asset('storage/' . $application->jobSeeker->profile_picture) }}" 
                                             alt="Profile" 
                                             class="h-16 w-16 rounded-lg object-cover">
                                    @else
                                        <div class="h-16 w-16 rounded-lg bg-[#04BDC5] flex items-center justify-center">
                                            <span class="text-xl font-bold text-white">
                                                {{ substr($application->jobSeeker->name, 0, 1) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Applicant Info -->
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $application->jobSeeker->full_name }}</h3>
                                        <span class="text-sm text-gray-500">{{ $application->created_at->format('d M Y') }}</span>
                                    </div>

                                    <!-- Contact & Basic Info -->
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <div class="space-y-1">
                                            @if($application->jobSeeker->contact)
                                                <p class="text-gray-600">📞 {{ $application->jobSeeker->contact }}</p>
                                            @endif
                                            @if($application->jobSeeker->education)
                                                <p class="text-gray-600">🎓 {{ $application->jobSeeker->education }}</p>
                                            @endif
                                        </div>
                                        <div class="space-y-1">
                                            @if($application->jobSeeker->experience)
                                                <p class="text-gray-600">💼 {{ $application->jobSeeker->experience }}</p>
                                            @endif
                                            @if($application->jobSeeker->certificates)
                                                <a href="{{ asset('storage/' . $application->jobSeeker->certificates) }}" 
                                                   target="_blank" 
                                                   class="text-blue-500 hover:underline">📄 View Certificate</a>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Skills -->
                                    @if($application->jobSeeker->skills)
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            @foreach(explode(',', $application->jobSeeker->skills) as $skill)
                                                <span class="px-2 py-1 bg-[#04BDC5]/10 text-[#04BDC5] text-xs rounded">
                                                    {{ trim($skill) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection