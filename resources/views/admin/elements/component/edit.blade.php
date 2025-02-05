@extends('admin.elements.elements')

@section('element_title')
    <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">Edit Component</span>
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i>Back to Components
@endsection

@section('element_content')
    <div class="max-w-3xl mx-auto p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
        <form action="{{ route('admin.components.update', $component->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Component Name Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">
                    Component Name <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-500">
                        <i class="ri-text"></i>
                    </div>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        required
                        value="{{ $component->name }}"
                        class="w-full pl-10 pr-4 py-3 bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                        placeholder="Awesome Component">
                </div>
            </div>

            <!-- Description Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">
                    Description <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 flex items-start pointer-events-none text-red-500">
                        <i class="ri-file-text-line"></i>
                    </div>
                    <textarea
                        name="description"
                        id="description"
                        required
                        rows="4"
                        class="w-full pl-10 pr-4 py-3 bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                        placeholder="Describe the component...">{{ $component->description }}</textarea>
                </div>
            </div>

            <!-- Code Fields -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- HTML Code Field -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="code_html">
                        HTML Code
                    </label>
                    <textarea
                        name="code_html"
                        id="code_html"
                        rows="4"
                        class="w-full p-3 bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                        placeholder="HTML code...">{{ $component->code_html }}</textarea>
                </div>

                <!-- Vue Code Field -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="code_vue">
                        Vue Code
                    </label>
                    <textarea
                        name="code_vue"
                        id="code_vue"
                        rows="4"
                        class="w-full p-3 bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                        placeholder="Vue code...">{{ $component->code_vue }}</textarea>
                </div>

                <!-- React Code Field -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="code_react">
                        React Code
                    </label>
                    <textarea
                        name="code_react"
                        id="code_react"
                        rows="4"
                        class="w-full p-3 bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                        placeholder="React code...">{{ $component->code_react }}</textarea>
                </div>
            </div>

            <!-- Category Selection Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="category_id">
                    Category
                </label>
                <div class="relative">
                    <select
                        name="category_id"
                        id="category_id"
                        class="w-full pl-3 pr-10 py-3 bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none transition-all">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $component->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-6 border-t border-gray-200/50 dark:border-[#ffffff10]">
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-red-600 to-rose-500 hover:from-red-700 hover:to-rose-600 text-white font-semibold py-3 px-6 rounded-lg transition-all transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                    <i class="ri-save-line"></i>
                    <span>Update Component</span>
                </button>
            </div>
        </form>
    </div>
@endsection
