@extends('admin.layouts.layout')

@section('title_admin')
    @yield('element_title')
@endsection

@section('content_admin')

    <header class="bg-white/80 mb-4 dark:bg-[#212124]/80 backdrop-blur-sm border-b border-white/20 dark:border-[#ffffff10] shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between gap-4">
                <!-- Заголовок с иконкой -->
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-red-100/50 dark:bg-red-900/20 rounded-lg flex items-center justify-center">
                        <i class="ri-puzzle-2-line text-red-600 dark:text-red-400 text-xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                        @yield('element_txt')
                    </h1>
                </div>

                <!-- Кнопка действия -->
                <a
                        href="@yield('element_create_link')"
                        class="px-6 py-3 border-2 border-red-200 dark:border-red-900/50 text-red-600 dark:text-red-400 rounded-xl dark:bg-red-900/20 hover:bg-red-50/50 dark:hover:bg-red-900/50 transition-all duration-300"
                >
                    <span class="font-medium">
                        @yield('element_create_txt')
                    </span>
                </a>
            </div>
        </div>
    </header>

    @yield('element_content')

@endsection

