@extends('admin.elements.elements')

@section('element_title')
    Edit Component
@endsection

@section('element_txt')
    Edit Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    Back to Components
@endsection

@section('element_content')

    <form action="{{ route('admin.components.update', $component->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">name</label>
        <input class="border" type="text" name="name" id="name" value="{{ $component->name }}">

        <label for="description">description</label>
        <input class="border" type="text" name="description" id="description" value="{{ $component->description }}">

        <label for="slug">slug</label>
        <input class="border" type="text" name="slug" id="slug" value="{{ $component->slug }}">

        <label for="code">code</label>
        <input class="border" type="text" name="code" id="code" value="{{ $component->code }}">

        <select name="category_id" id="category_id">
            @foreach ( $categories as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>

@endsection
