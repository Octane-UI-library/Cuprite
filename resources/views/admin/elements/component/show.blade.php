@extends('admin.elements.elements')

@section('element_title')
    <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">Component Details</span>
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i>Back to Components
@endsection

@section('element_content')
    <div class="max-w-3xl mx-auto p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
        <div class="space-y-8">
            <!-- Name Card -->
            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-tag-line mr-2 text-red-500"></i>
                    Component Name
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <p class="text-gray-800 dark:text-gray-200 font-medium">{{ $component->name }}</p>
                </div>
            </div>

            <!-- Description Card -->
            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-file-text-line mr-2 text-red-500"></i>
                    Description
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <p class="text-gray-800 dark:text-gray-200 whitespace-pre-line">{{ $component->description }}</p>
                </div>
            </div>

            <!-- Code Blocks -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-code-box-line mr-2 text-red-500"></i>
                        HTML Code
                    </div>
                    <pre class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10] text-gray-800 dark:text-gray-200 overflow-x-auto">{{ $component->code_html }}</pre>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-vuejs-line mr-2 text-green-500"></i>
                        Vue Code
                    </div>
                    <pre class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10] text-gray-800 dark:text-gray-200 overflow-x-auto">{{ $component->code_vue }}</pre>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="ri-reactjs-line mr-2 text-blue-500"></i>
                        React Code
                    </div>
                    <pre class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10] text-gray-800 dark:text-gray-200 overflow-x-auto">{{ $component->code_react }}</pre>
                </div>
            </div>

            <!-- Category Card -->
            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-folder-line mr-2 text-red-500"></i>
                    Category
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <p class="text-gray-800 dark:text-gray-200">{{ $component->category->name ?? 'No Category' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
