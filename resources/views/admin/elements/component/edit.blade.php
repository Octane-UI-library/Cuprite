@extends('admin.elements.elements')

@section('element_title')
    Edit Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    Back to Components
@endsection

@section('element_content')
    <form action="{{ route('admin.components.update', $component->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $component->name }}" required>

        <label for="description">Description</label>
        <textarea class="border" name="description" id="description" required>{{ $component->description }}</textarea>

        <label for="code_html">HTML Code</label>
        <textarea class="border" name="code_html" id="code_html">{{ $component->code_html }}</textarea>

        <label for="code_vue">Vue Code</label>
        <textarea class="border" name="code_vue" id="code_vue">{{ $component->code_vue }}</textarea>

        <label for="code_react">React Code</label>
        <textarea class="border" name="code_react" id="code_react">{{ $component->code_react }}</textarea>

        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $component->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
