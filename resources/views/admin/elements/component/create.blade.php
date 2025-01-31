@extends('admin.elements.elements')

@section('element_title')
    Create Component
@endsection

@section('element_txt')
    Create Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    Back to Components
@endsection

@section('element_content')

    <form action="{{ route('admin.components.store') }}" method="post">
        @csrf
        <label for="name">name</label>
        <input class="border" type="text" name="name" id="name">

        <label for="description">description</label>
        <input class="border" type="text" name="description" id="description">

        <label for="slug">slug</label>
        <input class="border" type="text" name="slug" id="slug">

        <label for="code">code</label>
        <input class="border" type="text" name="code" id="code">

        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            @foreach ( $categories as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>


@endsection
