@extends('admin.form')

@section('title', 'Admin Login')

@section('content')

    <div class="flex items-center justify-center min-h-screen dark:bg-[#101010]">
        <div class="w-full max-w-xs border-gray-300 rounded">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('admin.login.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="Email">
                    @error('email')
                    <p class="text-red-500 text-md italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-lg font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="******************">
                    @error('password')
                    <p class="text-red-500 text-md italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-rose-500 w-full hover:bg-rose-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign In
                    </button>
                </div>

                @if(session('error'))
                    <p class="text-red-500 text-md italic mt-4">{{ session('error') }}</p>
                @endif
            </form>
        </div>
    </div>

@endsection
