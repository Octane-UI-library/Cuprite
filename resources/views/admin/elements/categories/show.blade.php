<!-- resources/views/admin/elements/categories/show.blade.php -->
@extends('admin.elements.elements')

@section('element_title')
    Show Category
@endsection

@section('element_txt')
    Show Category
@endsection

@section('element_create_link')
    {{ route('admin.categories.index') }}
@endsection

@section('element_create_txt')
    Back to Categories
@endsection

@section('element_content')

    <div class="border p-6">
        <label>name</label>
        <p class="border">{{ $category->name }}</p>

        <label>description</label>
        <p class="border">{{ $category->description }}</p>

        <label>slug</label>
        <p class="border">{{ $category->slug }}</p>

        <label>icon</label>
        <p class="border">{{ $category->icon }}</p>
    </div>

@endsection
