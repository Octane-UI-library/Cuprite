@extends('admin.elements.elements')

@section('element_title')
    Edit Icon
@endsection

@section('element_txt')
    Edit Icon
@endsection

@section('element_create_link')
    {{ route('admin.icons.index') }}
@endsection

@section('element_create_txt')
    Back to Icons
@endsection

@section('element_content')

    <form action="{{ route('admin.icons.update', $icon->id) }}" method="POST" class="bg-rose-50 p-6 rounded-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-rose-600 font-semibold">Name</label>
            <input class="border border-rose-300 p-2 w-full rounded-lg" type="text" name="name" id="name" value="{{ $icon->name }}" required>
        </div>

        <div class="mb-4">
            <label for="class" class="block text-rose-600 font-semibold">Class</label>
            <input class="border border-rose-300 p-2 w-full rounded-lg" type="text" name="class" id="class" value="{{ $icon->class }}" required>
        </div>

        <button type="submit" class="bg-rose-500 text-white px-4 py-2 rounded-lg hover:bg-rose-600">
            Update
        </button>
    </form>


@endsection
