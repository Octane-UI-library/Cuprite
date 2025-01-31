@extends('admin.elements.elements')

@section('element_title')
    Show Component
@endsection

@section('element_txt')
    Show Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    Back to Components
@endsection

@section('element_content')

    <div class="border p-6">
        <label>name</label>
        <p class="border">{{ $component->name }}</p>

        <label>description</label>
        <p class="border">{{ $component->description }}</p>

        <label>slug</label>
        <p class="border">{{ $component->slug }}</p>

        <label>code</label>
        <p class="border">{{ $component->code }}</p>

        <label>category</label>
        <p class="border">{{ $component->category->name }}</p>
    </div>

@endsection
