@extends('admin.elements.elements')

@section('element_title')
    <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">Icon Details</span>
@endsection

@section('element_txt')
    Show Icon
@endsection

@section('element_create_link')
    {{ route('admin.icons.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i>Back to Icons
@endsection

@section('element_content')
<div class="max-w-3xl mx-auto p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
    <div class="space-y-8">
        <!-- Name Card -->
        <div class="space-y-2">
            <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                <i class="ri-tag-line mr-2 text-red-500"></i>
                Icon Name
            </div>
            <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                <p class="text-gray-800 dark:text-gray-200 font-medium">{{ $icon->name }}</p>
            </div>
        </div>

        <!-- Class Card -->
        <div class="space-y-2">
            <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                <i class="ri-code-line mr-2 text-red-500"></i>
                Icon Class
            </div>
            <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                <code class="text-gray-800 dark:text-gray-200">{{ $icon->class }}</code>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="space-y-2">
            <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                <i class="ri-eye-line mr-2 text-red-500"></i>
                Live Preview
            </div>
            <div class="p-8 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10] flex items-center justify-center">
                <i class="{{ $icon->class }} text-6xl text-red-500 dark:text-red-400 animate-pulse"></i>
            </div>
        </div>

        <!-- Meta Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-calendar-event-line mr-2 text-red-500"></i>
                    Created At
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <time class="text-gray-800 dark:text-gray-200">{{ $icon->created_at->format('M d, Y H:i') }}</time>
                </div>
            </div>

            <div class="space-y-2">
                <div class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300">
                    <i class="ri-refresh-line mr-2 text-red-500"></i>
                    Last Updated
                </div>
                <div class="p-4 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10]">
                    <time class="text-gray-800 dark:text-gray-200">{{ $icon->updated_at->format('M d, Y H:i') }}</time>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
