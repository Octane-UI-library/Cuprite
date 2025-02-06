@extends('layouts.layout')

@section('app_main_layout_title')
    Cuprite
@endsection

@push('app_main_layout_stack_head')
    @inertiaHead
    @routes
@endpush

@section('app_main_layout_content')
    <div class="fixed top-0 left-0 w-full !z-50">
        @if(auth()->check() && auth()->user()->role === 'admin')
            @include('components.admin-nav')
        @endif
    </div>
    <div class="@if(auth()->check() && auth()->user()->role === 'admin') pt-7 @endif">
        @inertia
    </div>
@endsection
