@extends('layouts.layout')

@section('title', 'Page Not Found')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 dark:from-[#0a0a0a] dark:to-[#1a1a1a] flex items-center justify-center p-4">
        <div class="max-w-2xl w-full text-center relative">

            <div
                class="absolute -top-20 -left-20 w-48 h-48 bg-gradient-to-r from-red-500/10 to-rose-400/10 rounded-full blur-3xl opacity-50"></div>
            <div
                class="absolute -bottom-20 -right-20 w-48 h-48 bg-gradient-to-l from-red-500/10 to-rose-400/10 rounded-full blur-3xl opacity-50"></div>

            <div
                class="relative z-10 p-8 bg-white/80 dark:bg-[#212124]/80 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/20 dark:border-[#ffffff10]">
                <div class="mb-8 flex justify-center">
                    <div
                        class="w-32 h-32 bg-red-100/50 dark:bg-red-900/20 rounded-full flex items-center justify-center">
                        <i class="ri-alert-line text-6xl text-red-600 dark:text-red-400"></i>
                    </div>
                </div>

                <h1 class="text-8xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent mb-6">
                    404
                </h1>

                <h2 class="text-3xl font-semibold dark:text-white mb-4">
                    Oops! Page Not Found
                </h2>

                <p class="text-gray-600 dark:text-gray-400 text-lg mb-8 max-w-md mx-auto">
                    The page you're looking for seems to have vanished into the digital void. Let's get you back to
                    safety.
                </p>

                <a
                    href="{{ url()->previous() }}"
                    class="inline-block bg-gradient-to-r from-red-600 to-rose-500 hover:from-red-700 hover:to-rose-600 text-white px-8 py-3.5 rounded-lg text-lg font-semibold shadow-lg transition-all transform hover:scale-[1.02] hover:shadow-xl"
                >
                    <i class="ri-home-4-line mr-2"></i>
                    Return Back
                </a>
            </div>

            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[15rem] font-black opacity-5 pointer-events-none select-none -z-10">
                404
            </div>
        </div>
    </div>
@endsection
