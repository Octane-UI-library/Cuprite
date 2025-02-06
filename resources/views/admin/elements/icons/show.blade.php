@extends('admin.elements.elements')

@section('element_title')
    Show Icon
@endsection

@section('element_txt')
    Show Icon
@endsection

@section('element_create_link')
    {{ route('admin.icons.index') }}
@endsection

@section('element_create_txt')
    Back to Icons
@endsection

@section('element_content')

    <div class="border border-rose-300 p-6 rounded-lg bg-rose-50">
        <label class="text-rose-600 font-semibold">Name</label>
        <p class="border border-rose-300 p-2 rounded-lg mb-4">{{ $icon->name }}</p>

        <label class="text-rose-600 font-semibold">Class</label>
        <p class="border border-rose-300 p-2 rounded-lg">{{ $icon->class }}</p>
    </div>

@endsection
