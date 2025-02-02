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

    <form action="{{ route('admin.categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input class="border" type="text" name="name" id="name" value="{{ $category->name }}" required>

        <label for="description">Description</label>
        <input class="border" type="text" name="description" id="description" value="{{ $category->description }}" required>

        <label for="slug">Slug</label>
        <input class="border" type="text" name="slug" id="slug" value="{{ $category->slug }}" required>

        <label for="icon_id">Icon</label>
        <select class="border" name="icon_id" id="icon_id">
            @foreach($icons as $icon)
                <option value="{{ $icon->id }}" {{ $category->icon_id == $icon->id ? 'selected' : '' }}>
                    <i class="{{ $icon->class }}">{{ $icon->name }}</i>
                </option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>

@endsection
