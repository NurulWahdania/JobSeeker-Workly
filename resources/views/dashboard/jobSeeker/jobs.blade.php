@extends('dashboard.template')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Search Bar yang Lebih Sederhana -->
        <div class="mb-10">
            <form method="GET" action="{{ route('jobseeker.job.list') }}">
                <div class="flex gap-2">
                    <input type="text" name="search" 
                        placeholder="Cari lowongan pekerjaan..." 
                        class="flex-1 p-3 rounded-lg border-2 border-[#04BDC5] focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent"
                        value="{{ request('search') }}">
                    <button type="submit" 
                        class="px-6 py-3 bg-[#04BDC5] text-white rounded-lg hover:bg-opacity-90 transition-all font-medium">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Card Lowongan dengan Desain yang Lebih Bersih -->
        <div class="space-y-8">
            <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-[#04BDC5] pb-2">Lowongan Tersedia</h2>
            
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($jobs as $job)
                @if ($job->status !== 'closed' && !$appliedJobs->contains($job->id))
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <!-- Header Lowongan -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $job->title }}</h3>
                            <p class="text-[#04BDC5] font-medium">{{ $job->employer->company_name }}</p>
                        </div>
                        <span class="px-3 py-1 bg-blue-500 text-white rounded-full text-sm">
                            {{ $job->job_type }}
                        </span>
                    </div>

                    <!-- Lokasi -->
                    <div class="flex items-center text-gray-600 mb-6">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        {{ $job->location }}
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="space-y-3">
                        <a href="{{ route('jobseeker.job.details', $job->id) }}" 
                            class="block text-center py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                            Lihat Detail
                        </a>
                        
                        <form action="{{ route('jobseeker.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    <span class="inline-block mb-1">Unggah CV</span>
                                    <input type="file" name="cv" 
                                        class="w-full border border-gray-300 rounded-lg cursor-pointer file:border-0 file:py-2 file:px-4 file:bg-[#04BDC5] file:text-white hover:file:bg-opacity-90"
                                        onchange="handleFileSelect(this)">
                                </label>
                                <button type="submit" 
                                    class="w-full py-2 px-4 bg-[#04BDC5] text-white rounded-lg hover:bg-opacity-90 transition-colors disabled:bg-gray-300"
                                    id="submitBtn" disabled>
                                    Lamar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
<script>
function handleFileSelect(input) {
    const submitBtn = input.closest('form').querySelector('#submitBtn');
    const cvError = input.closest('form').querySelector('#cvError');
    
    if (input.files.length > 0) {
        submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
        submitBtn.classList.add('bg-green-500', 'hover:bg-green-600');
        submitBtn.disabled = false;
        cvError.classList.add('hidden');
    } else {
        submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
        submitBtn.classList.remove('bg-green-500', 'hover:bg-green-600');
        submitBtn.disabled = true;
    }
}

function validateForm(form) {
    const fileInput = form.querySelector('input[type="file"]');
    const cvError = form.querySelector('#cvError');
    
    if (!fileInput.files.length) {
        cvError.classList.remove('hidden');
        return false;
    }
    return true;
}
</script>
@endsection