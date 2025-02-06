@extends('admin.layouts.main')

@section('admin_title')
    @yield('title_admin', 'Cuprite Admin Panel')
@endsection

@push('app_main_layout_stack_head')
    @stack('admin_layout_stack_head')
@endpush

@section('admin_content')
    <div class="flex min-h-screen">
        <aside class="sm:w-72">
            @component('admin.components.nav') @endcomponent
        </aside>

        <main class="flex-1 mt-12 sm:mt-0">
            @yield('content_admin')
        </main>
    </div>

    @push('app_main_layout_scripts')
        @stack('admin_layout_stack_scripts')
    @endpush
@endsection
