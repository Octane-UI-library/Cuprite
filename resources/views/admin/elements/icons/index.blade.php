@extends('admin.elements.elements')

@section('element_title')
    Icons
@endsection

@section('element_txt')
    Icons
@endsection

@section('element_create_link')
    {{ route('admin.icons.create') }}
@endsection

@section('element_create_txt')
    Create Icon
@endsection

@section('element_content')

    <div>
        <table class="w-full table-auto border-collapse border border-rose-300">
            <thead>
            <tr class="bg-rose-100">
                <th class="border border-rose-300 px-4 py-2 text-left text-rose-600">Name</th>
                <th class="border border-rose-300 px-4 py-2 text-left text-rose-600">Class</th>
                <th class="border border-rose-300 px-4 py-2 text-left text-rose-600">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($icons as $icon)
                <tr class="odd:bg-white even:bg-rose-50">
                    <td class="border border-rose-300 px-4 py-2">
                        <a href="{{ route('admin.icons.show', $icon->id) }}" class="text-rose-600 font-semibold hover:underline">
                            {{ $icon->name }}
                        </a>
                    </td>
                    <td class="border border-rose-300 px-4 py-2">{{ $icon->class }}</td>
                    <td class="border border-rose-300 px-4 py-2">
                        <a href="{{ route('admin.icons.edit', $icon) }}" class="text-rose-500 font-semibold hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.icons.destroy', $icon) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 font-semibold hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
