@extends('layouts.layout')

@section('app_main_layout_title')
    @yield('admin_title', 'Cuprite Admin Panel')
@endsection

@section('app_main_layout_content')
    @yield('admin_content')
@endsection
