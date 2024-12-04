@extends('dashboard.template')

@section('header')
    <h1 class="text-2xl font-semibold text-gray-800">Daftar Pekerjaan</h1>
@endsection

@section('content')
<div class="p-6 bg-white rounded-lg shadow-sm">
    <div class="mb-6">
        <a href="{{ route('jobPost.create') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-[#04BDC5] hover:bg-[#03a9b0] rounded-lg focus:ring-4 focus:ring-blue-300 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Pekerjaan
        </a>
    </div>

    <div class="relative overflow-hidden rounded-lg border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-black uppercase bg-[#04BDC5]">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nama Pekerjaan</th>
                        <th scope="col" class="px-6 py-4">Lokasi</th>
                        <th scope="col" class="px-6 py-4">Tipe Pekerjaan</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Target Pembayaran</th>
                        <th scope="col" class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobPosts as $jobPost)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <a href="{{ route('jobPost.show', $jobPost->id) }}" class="font-medium text-blue-500 hover:text-blue-700">
                                {{ $jobPost->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4">{{ $jobPost->location }}</td>
                        <td class="px-6 py-4">{{ $jobPost->job_type }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full {{ $jobPost->status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $jobPost->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $jobPost->payday }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <a href="{{ route('jobPost.edit', $jobPost->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('jobPost.destroy', $jobPost->id) }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                                <a href="{{ route('employer.aplication', ['id' => $jobPost->id]) }}" class="text-[#04BDC5] hover:text-[#03a9b0]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this job post?');
    }
</script>
@endsection
