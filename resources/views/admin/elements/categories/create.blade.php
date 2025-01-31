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
        <label for="name">name</label>
        <input class="border" type="text" name="name" id="name">

        <label for="description">description</label>
        <input class="border" type="text" name="description" id="description">

        <label for="description">slug</label>
        <input class="border" type="text" name="slug" id="slug">

        <label for="description">icon</label>
        <input class="border" type="text" name="icon" id="icon">

        <button type="submit">Create</button>
    </form>

@endsection
