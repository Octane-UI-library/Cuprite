@extends('admin.elements.elements')

@section('element_title')
    Create Example
@endsection

@section('element_txt')
    Create Example
@endsection

@section('element_create_link')
    {{ route('admin.examples.index') }}
@endsection

@section('element_create_txt')
    Back to Examples
@endsection

@section('element_content')

    <form action="{{ route('admin.examples.store') }}" method="post">
        @csrf
        <label for="name">name</label>
        <input class="border" type="text" name="name" id="name">

        <label for="description">description</label>
        <input class="border" type="text" name="description" id="description">

        <label for="slug">slug</label>
        <input class="border" type="text" name="slug" id="slug">

        <label for="icon">icon</label>
        <input class="border" type="text" name="icon" id="icon">

        <button type="submit">Create</button>
    </form>

@endsection
