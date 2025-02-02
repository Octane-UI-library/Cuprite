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
        <label>Name</label>
        <p class="border">{{ $category->name }}</p>

        <label>Description</label>
        <p class="border">{{ $category->description }}</p>

        <label>Slug</label>
        <p class="border">{{ $category->slug }}</p>

        <label>Icon</label>
        <p class="border">{{ $category->icon?->name ?? 'No Icon' }}</p>
    </div>

@endsection
