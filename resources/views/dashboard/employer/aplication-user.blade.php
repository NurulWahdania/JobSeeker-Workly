@extends('dashboard.template')

@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('jobPost') }}" class="inline-block bg-[#04BDC5] text-white px-6 py-2 rounded-lg hover:opacity-90 transition-all mb-6">
                ← Back to Job Listings
            </a>
            @if($jobPost)
                <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-[#04BDC5]">{{ $jobPost->title }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-3">
                            <p class="flex items-center"><span class="font-semibold w-32">Company:</span> {{ $jobPost->employer->company_name }}</p>
                            <p class="flex items-center"><span class="font-semibold w-32">Location:</span> {{ $jobPost->location }}</p>
                            <p class="flex items-center"><span class="font-semibold w-32">Job Type:</span> {{ $jobPost->job_type }}</p>
                        </div>
                        <div class="space-y-3">
                            <p class="flex items-center"><span class="font-semibold w-32">Salary:</span> {{ $jobPost->salary }}</p>
                            <p class="flex items-center"><span class="font-semibold w-32">Experience:</span> {{ $jobPost->experience }}</p>
                            <p class="flex items-center"><span class="font-semibold w-32">Posted Date:</span> {{ $jobPost->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2 text-[#04BDC5]">Job Description</h3>
                            <p class="text-gray-700">{{ $jobPost->description }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2 text-[#04BDC5]">Requirements</h3>
                            <p class="text-gray-700">{{ $jobPost->requirements }}</p>
                        </div>
                    </div>
                </div>

                <h3 class="text-2xl font-bold mb-6 text-[#04BDC5]">Pending Applications</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($jobPost->jobAplications as $applicant)
                        @if ($applicant->status == 'pending')
                            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all">
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="text-xl font-bold text-[#04BDC5]">{{ $applicant->jobSeeker->name }}</h3>
                                        <p class="text-gray-600">{{ $applicant->jobSeeker->email }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold mb-1">Cover Letter:</p>
                                        <p class="text-gray-600 text-sm">{{ $applicant->cover_letter }}</p>
                                    </div>
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ asset('storage/' . $applicant->cv) }}" target="_blank"
                                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all">
                                            View CV
                                        </a>
                                        <a href="{{ route('employer.profile', $applicant->jobSeeker->id) }}" target="_blank"
                                            class="inline-block bg-[#04BDC5] text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all">
                                            View Profile
                                        </a>
                                    </div>
                                    <div class="flex gap-2 pt-2">
                                        <form action="{{ route('employer.acceptApplicant', $applicant->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full bg-[#04BDC5] text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all">
                                                Accept
                                            </button>
                                        </form>
                                        <form action="{{ route('employer.rejectApplicant', $applicant->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <h2 class="text-2xl font-bold text-gray-600">Job post not found.</h2>
                </div>
            @endif
        </div>
    </div>
@endsection