@extends('admin.elements.elements')

@section('element_title')
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
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($components as $component)
                <tr>
                    <td>
                        <a href="{{ route('admin.components.show', $component->id) }}">
                            {{ $component->name }}
                        </a>
                    </td>
                    <td>{{ $component->category->name ?? 'No Category' }}</td>
                    <td>
                        <a href="{{ route('admin.components.show', $component->id) }}" class="text-blue-500">View</a>
                        <a href="{{ route('admin.components.edit', $component->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.components.destroy', $component->id) }}" method="POST" class="inline">
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
