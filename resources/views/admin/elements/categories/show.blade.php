@extends('admin.elements.elements')

@section('element_title')
    <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">Category Details</span>
@endsection

@section('element_txt')
    Show Category
@endsection

@section('element_create_link')
    {{ route('admin.categories.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i>Back to Categories
@endsection

@section('element_content')
    <div class="max-w-3xl mx-auto p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
        <div class="space-y-8">
            <!-- Name Card -->
            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-tag-line mr-2 text-red-500"></i>
                    Category Name
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <p class="text-gray-800 dark:text-gray-200 font-medium">{{ $category->name }}</p>
                </div>
            </div>

            <!-- Description Card -->
            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-file-text-line mr-2 text-red-500"></i>
                    Description
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <p class="text-gray-800 dark:text-gray-200 whitespace-pre-line">{{ $category->description }}</p>
                </div>
            </div>

            <!-- Slug & Icon Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Slug -->
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-link mr-2 text-red-500"></i>
                        URL Slug
                    </div>
                    <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                        <code class="text-gray-800 dark:text-gray-200">/{{ $category->slug }}</code>
                    </div>
                </div>

                <!-- Icon -->
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-palette-line mr-2 text-red-500"></i>
                        Selected Icon
                    </div>
                    <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                        <div class="flex items-center space-x-3">
                            @if($category->icon)
                                <i class="{{ $category->icon->class }} text-2xl text-red-500"></i>
                                <span class="text-gray-800 dark:text-gray-200">{{ $category->icon->name }}</span>
                            @else
                                <i class="ri-close-circle-line text-2xl text-gray-400"></i>
                                <span class="text-gray-400">No Icon Selected</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dates Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Created At -->
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-calendar-event-line mr-2 text-red-500"></i>
                        Created At
                    </div>
                    <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                        <time class="text-gray-800 dark:text-gray-200">{{ $category->created_at->format('M d, Y H:i') }}</time>
                    </div>
                </div>

                <!-- Updated At -->
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-refresh-line mr-2 text-red-500"></i>
                        Last Updated
                    </div>
                    <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                        <time class="text-gray-800 dark:text-gray-200">{{ $category->updated_at->format('M d, Y H:i') }}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
