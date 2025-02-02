@extends('admin.form')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 dark:from-[#0a0a0a] dark:to-[#1a1a1a]">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white/80 dark:bg-[#212124]/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10] mx-4">
            <!-- Logo -->
            <div class="text-center">
                <h1 class="text-5xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                    Cuprite
                </h1>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Admin Dashboard
                </p>
            </div>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="space-y-4">
                    <!-- Email Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 bg-gray-50/50 dark:bg-[#19191a] border-2 border-red-200/50 dark:border-red-900/30 rounded-xl focus:outline-none focus:border-red-500 transition-all duration-300"
                            placeholder="Email"
                            required
                            autofocus
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Password
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="w-full px-4 py-3 bg-gray-50/50 dark:bg-[#19191a] border-2 border-red-200/50 dark:border-red-900/30 rounded-xl focus:outline-none focus:border-red-500 transition-all duration-300"
                            placeholder="Password"
                            required
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full mt-6 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow-lg transition-all duration-300"
                >
                    Sign In
                </button>

                @if(session('error'))
                    <p class="text-red-500 text-sm mt-4 text-center">{{ session('error') }}</p>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
