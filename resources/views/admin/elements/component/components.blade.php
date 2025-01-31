@extends('admin.elements.elements')

@section('element_title')
    Components
@endsection

@section('element_txt')
    Components
@endsection

@section('element_create_link')
    {{ route('admin.components.create') }}
@endsection

@section('element_create_txt')
    Create Component
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
                @foreach( $components as $component)
                    <tr>
                        <td>
                            <a href="{{ route('admin.component.show', $component) }}">
                                {{ $component->name }}
                            </a>
                        </td>
                        <td>{{ $component->slug }}</td>
                        <td>
                            <a href="{{ route('admin.components.edit', $component) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('admin.components.destroy', $component) }}" method="POST" class="inline">
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
