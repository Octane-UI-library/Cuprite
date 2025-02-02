@extends('admin.elements.elements')

@section('element_title')
    Examples
@endsection

@section('element_txt')
    Examples
@endsection

@section('element_create_link')
    {{ route('admin.examples.create') }}
@endsection

@section('element_create_txt')
    Create Example
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
                @foreach($examples as $example)
                    <tr>
                        <td>{{ $example->name }}</td>
                        <td>{{ $example->slug }}</td>
                        <td>
                            <a href="{{ route('admin.examples.edit', $example) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('admin.examples.destroy', $example) }}" method="POST" class="inline">
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
