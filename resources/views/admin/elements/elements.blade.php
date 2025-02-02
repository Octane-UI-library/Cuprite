@extends('admin.layout')

@section('title')
    @yield('element_title')
@endsection

@section('content')

    <header class="border-b h-20">
        <div class="flex items-center justify-between h-full px-6">
            <h1 class="text-2xl font-semibold">
                @yield('element_txt')
            </h1>
            <a href="@yield('element_create_link')" class="bg-rose-500 text-white px-6 py-2 rounded">
                @yield('element_create_txt')
            </a>
        </div>
    </header>

    @yield('element_content')

@endsection

