@extends('admin.elements.elements')

@section('element_title')
    Show Example
@endsection

@section('element_txt')
    Show Example
@endsection

@section('element_create_link')
    {{ route('admin.examples.index') }}
@endsection

@section('element_create_txt')
    Back to Examples
@endsection

@section('element_content')

    <div class="border p-6">
        <label>name</label>
        <p class="border">{{ $example->name }}</p>

        <label>description</label>
        <p class="border">{{ $example->description }}</p>

        <label>slug</label>
        <p class="border">{{ $example->slug }}</p>

        <label>icon</label>
        <p class="border">{{ $example->icon }}</p>
    </div>

@endsection
