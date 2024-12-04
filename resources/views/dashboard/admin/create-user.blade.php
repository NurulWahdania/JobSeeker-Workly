@extends('dashboard.template')

@section('header')
    <h1 class="text-3xl font-bold text-[#04BDC5]">Create New User</h1>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="p-8">
                    @if (session('success'))
                        <div class="bg-[#04BDC5] text-white p-4 mb-6 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-4 mb-6 rounded-md">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.store') }}" onsubmit="return confirm('Are you sure you want to create this user?');" class="space-y-6">
                        @csrf
                        <div>
                            <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                            <input id="username" 
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent transition" 
                                type="text" 
                                name="username" 
                                required 
                                autofocus />
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input id="email" 
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent transition" 
                                type="email" 
                                name="email" 
                                required />
                        </div>

                        <div>
                            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                            <input id="password" 
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent transition" 
                                type="password" 
                                name="password" 
                                required />
                        </div>

                        <div>
                            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                            <select id="role" 
                                name="role" 
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#04BDC5] focus:border-transparent transition" 
                                required>
                                <option value="admin">Admin</option>
                                <option value="employer">Employer</option>
                                <option value="job_seeker">Job Seeker</option>
                            </select>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" 
                                class="px-6 py-3 bg-[#04BDC5] hover:bg-blue-500 text-white font-medium rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection