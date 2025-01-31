@extends('admin.elements.elements')

@section('element_title')
    Categories
@endsection

@section('element_txt')
    Categories
@endsection

@section('element_create_link')
    {{ route('admin.categories.create') }}
@endsection

@section('element_create_txt')
    Create Category
@endsection

@section('element_content')

    <div>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Slug</th>
                    <th class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
