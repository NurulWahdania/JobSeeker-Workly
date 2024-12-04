@extends('dashboard.template')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('jobPost.update', $selectedEmployer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="grid gap-6 mb-6">
                <div class="form-group">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Nama Pekerjaan</label>
                    <input type="text" name="title" id="title" value="{{ $selectedEmployer->title }}" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">
                </div>
                <div class="form-group">
                    <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="location" id="location" value="{{ $selectedEmployer->location }}" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">
                </div>
                <div class="form-group">
                    <label for="job_type" class="block text-sm font-semibold text-gray-700 mb-2">Tipe Pekerjaan</label>
                    <select name="job_type" id="job_type" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">
                        <option value="full-time" {{ $selectedEmployer->job_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ $selectedEmployer->job_type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="freelance" {{ $selectedEmployer->job_type == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">{{ $selectedEmployer->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="requirements" class="block text-sm font-semibold text-gray-700 mb-2">Persyaratan</label>
                    <textarea name="requirements" id="requirements" rows="4" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">{{ $selectedEmployer->requirements }}</textarea>
                </div>
                <div class="form-group">
                    <label for="salary" class="block text-sm font-semibold text-gray-700 mb-2">Gaji</label>
                    <input type="number" name="salary" id="salary" value="{{ $selectedEmployer->salary }}" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">
                    @if ($errors->has('salary'))
                        <span class="text-red-500 text-sm">{{ $errors->first('salary') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="payday" class="block text-sm font-semibold text-gray-700 mb-2">Target Pembayaran</label>
                    <select name="payday" id="payday" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">
                        <option value="yearly" {{ $selectedEmployer->payday == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        <option value="monthly" {{ $selectedEmployer->payday == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="weekly" {{ $selectedEmployer->payday == 'weekly' ? 'selected' : '' }}>Weekly</option>
                        <option value="daily" {{ $selectedEmployer->payday == 'daily' ? 'selected' : '' }}>Daily</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" 
                        class="w-full rounded-lg border-gray-300 transition duration-200 ease-in-out focus:border-[#04BDC5] focus:ring-[#04BDC5] hover:border-blue-500">
                        <option value="active" {{ $selectedEmployer->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="closed" {{ $selectedEmployer->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ url()->previous() }}" 
                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-200">
                    Batal
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 text-sm font-medium text-white bg-[#04BDC5] rounded-lg hover:bg-blue-500 transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        box-shadow: 0 0 0 2px rgba(4, 189, 197, 0.2);
    }
</style>
@endsection
