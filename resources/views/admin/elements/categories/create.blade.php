@extends('admin.elements.elements')

@section('element_title')
    Create Category
@endsection

@section('element_txt')
    Create Category
@endsection

@section('element_create_link')
    {{ route('admin.categories.index') }}
@endsection

@section('element_create_txt')
    Back to Categories
@endsection

@section('element_content')
    <div class="max-w-3xl mx-auto p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
        <form action="{{ route('admin.categories.store') }}" method="post" class="space-y-8">
            @csrf

            <!-- Name Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">
                    Category Name
                    <span class="text-red-500">*</span>
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
                        class="w-full pl-10 pr-4 py-3 bg-white/50 outline-none dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                        placeholder="Awesome Components">
                </div>
            </div>

            <!-- Slug Field -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="slug">
                        URL Slug
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-500">
                            <i class="ri-link"></i>
                        </div>
                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            required
                            class="w-full pl-10 pr-4 py-3 bg-white/50 outline-none dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                            placeholder="awesome-components">
                    </div>
                </div>

                <!-- Icon Field -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="icon">
                        Select Icon
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div id="icon-preview" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-500">
                                        <i class=""></i>
                                    </div>
                        <select
                            name="icon_id"
                            id="icon_id"
                            required
                            class="w-full pl-10 pr-4 py-3 bg-white/50 outline-none dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none transition-all"
                            onchange="updateIconPreview()">
                            @foreach($icons as $icon)
                                <option value="{{ $icon->id }}" data-icon-class="{{ $icon->class }}">{{ $icon->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">
                    Description
                    <span class="text-red-500">*</span>
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
                        class="w-full pl-10 pr-4 py-3 bg-white/50 outline-none dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                        placeholder="Describe the category..."></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-6 border-t border-gray-200/50 dark:border-[#ffffff10]">
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-red-600 to-rose-500 hover:from-red-700 hover:to-rose-600 text-white font-semibold py-3 px-6 rounded-lg transition-all transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                    <i class="ri-add-circle-line"></i>
                    <span>Create Category</span>
                </button>
            </div>
        </form>
    </div>

<script>
    function updateIconPreview() {
        const select = document.getElementById('icon_id');
        const selectedOption = select.options[select.selectedIndex];
        const iconClass = selectedOption.getAttribute('data-icon-class');
        const iconPreview = document.getElementById('icon-preview');

        // Обновляем превью
        iconPreview.innerHTML = iconClass
            ? `<i class="${iconClass}"></i>`
            : '<i class="ri-question-line"></i>';
    }

    // Обновляем превью при загрузке страницы
    document.addEventListener('DOMContentLoaded', function() {
        updateIconPreview();
    });
</script>
@endsection
