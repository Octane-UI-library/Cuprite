@extends('layouts.layout')

@section('title')
    @yield('title_admin', 'Cuprite Admin Panel')
@endsection

@section('content')
    <div class="flex min-h-screen">
        <aside class="sm:w-72">
            @component('admin.components.nav') @endcomponent
        </aside>

        <main class="flex-1 mt-12 sm:mt-0">
            @yield('content_admin')
        </main>
    </div>

    @push('scripts')
        @stack('scripts')
    @endpush
@endsection
