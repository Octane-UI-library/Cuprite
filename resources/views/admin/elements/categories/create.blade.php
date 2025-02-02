@extends('admin.elements.elements')

@section('element_title')
    Create Category
@endsection

@section('element_txt')
    Create Category
@endsection

@section('element_create_link')
    {{ route('admin.categories.index') }}
@endsection

@section('element_create_txt')
    Back to Categories
@endsection

@section('element_content')

    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input class="border" type="text" name="name" id="name" required>

        <label for="description">Description</label>
        <input class="border" type="text" name="description" id="description" required>

        <label for="slug">Slug</label>
        <input class="border" type="text" name="slug" id="slug" required>

        <label for="icon_id">Icon</label>

        <select class="border" name="icon_id" id="icon_id">
            @foreach($icons as $icon)
                <option value="{{ $icon->id }}">{{ $icon->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>

@endsection
