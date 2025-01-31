@extends('admin.elements.elements')

@section('element_title')
    Edit Category
@endsection

@section('element_txt')
    Edit Category
@endsection

@section('element_create_link')
    {{ route('admin.categories.index') }}
@endsection

@section('element_create_txt')
    Back to Categories
@endsection

@section('element_content')

    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">name</label>
        <input class="border" type="text" name="name" id="name" value="{{ $category->name }}">

        <label for="description">description</label>
        <input class="border" type="text" name="description" id="description" value="{{ $category->description }}">

        <label for="slug">slug</label>
        <input class="border" type="text" name="slug" id="slug" value="{{ $category->slug }}">

        <label for="icon">icon</label>
        <input class="border" type="text" name="icon" id="icon" value="{{ $category->icon }}">

        <button type="submit">Update</button>
    </form>

@endsection
