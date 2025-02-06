@extends('admin.elements.elements')

@section('element_title')
    Edit Example
@endsection

@section('element_txt')
    Edit Example
@endsection

@section('element_create_link')
    {{ route('admin.examples.index') }}
@endsection

@section('element_create_txt')
    Back to Examples
@endsection

@section('element_content')

    <form action="{{ route('admin.examples.update', $example->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">name</label>
        <input class="border" type="text" name="name" id="name" value="{{ $example->name }}">

        <label for="description">description</label>
        <input class="border" type="text" name="description" id="description" value="{{ $example->description }}">

        <label for="slug">slug</label>
        <input class="border" type="text" name="slug" id="slug" value="{{ $example->slug }}">

        <label for="icon">icon</label>
        <input class="border" type="text" name="icon" id="icon" value="{{ $example->icon }}">

        <button type="submit">Update</button>
    </form>

@endsection
