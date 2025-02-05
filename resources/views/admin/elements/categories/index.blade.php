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

<div class="bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10] overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200/50 dark:border-[#ffffff10] bg-gray-50/30 dark:bg-[#19191a]">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    <i class="ri-folders-line mr-2 text-red-500"></i>
                    Total Categories: {{ $categories->count() }}
                </h3>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200/30 dark:divide-[#ffffff10]">
                <thead class="bg-gray-50/30 dark:bg-[#19191a]">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                            <i class="ri-file-text-line mr-2 text-red-500"></i>
                            Name
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                            <i class="ri-link mr-2 text-red-500"></i>
                            Slug
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                            <i class="ri-tools-line mr-2 text-red-500"></i>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200/30 dark:divide-[#ffffff10]">
                    @foreach($categories as $category)
                        <tr class="hover:bg-gray-50/30 dark:hover:bg-[#19191a] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200 font-medium">
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="flex items-center group">
                                    <i class="{{ $category->icon->class }} mr-3 text-red-500"></i>
                                    <span class="group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                                        {{ $category->name }}
                                    </span>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                                <code class="px-2 py-1 bg-gray-100/50 dark:bg-[#2d2d30] rounded text-sm">/{{ $category->slug }}</code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-4">
                                    <a
                                        href="{{ route('admin.categories.edit', $category) }}"
                                        class="text-gray-600 dark:text-gray-400 hover:text-red-500 transition-colors"
                                        title="Edit"
                                    >
                                        <i class="ri-pencil-line text-lg"></i>
                                    </a>
                                    <form
                                        action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this category?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="text-gray-600 dark:text-gray-400 hover:text-red-500 transition-colors"
                                            title="Delete"
                                        >
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($categories->isEmpty())
            <div class="p-12 text-center text-gray-500 dark:text-gray-400">
                <i class="ri-inbox-line text-4xl mb-4"></i>
                <p class="text-lg">No categories found. Let's create your first one!</p>
            </div>
        @endif
    </div>
@endsection

