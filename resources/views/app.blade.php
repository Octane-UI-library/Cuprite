@extends('layouts.layout')

@section('title')
    Cuprite
@endsection

@push('head')
    @inertiaHead
    @routes
@endpush

@section('content')
    @inertia
@endsection
