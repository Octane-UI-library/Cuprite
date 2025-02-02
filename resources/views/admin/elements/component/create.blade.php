@extends('admin.elements.elements')

@section('element_title')
    Create Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    Back to Components
@endsection

@section('element_content')
    <form action="{{ route('admin.components.store') }}" method="POST" class="max-w-xs mx-auto">
        @csrf
        <label for="name">Name</label>
        <input class="border my-5" type="text" name="name" id="name" required>

        <label for="description">Description</label>
        <textarea class="border my-5" name="description" id="description" required></textarea>

        <label for="code_html">HTML Code</label>
        <textarea class="border my-5" name="code_html" id="code_html"></textarea>

        <label for="code_vue">Vue Code</label>
        <textarea class="border my-5" name="code_vue" id="code_vue"></textarea>

        <label for="code_react">React Code</label>
        <textarea class="border my-5" name="code_react" id="code_react"></textarea>

        <label  for="category_id">Category</label>
        <select class="border" name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>
@endsection
