@extends('admin.elements.elements')

@section('element_title')
    <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">Edit Icon</span>
@endsection

@section('element_txt')
    Edit Icon
@endsection

@section('element_create_link')
    {{ route('admin.icons.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i>Back to Icons
@endsection

@section('element_content')
<div class="max-w-3xl mx-auto p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
    <form action="{{ route('admin.icons.update', $icon->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Icon Name
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-500">
                    <i class="ri-tag-line"></i>
                </div>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    value="{{ $icon->name }}"
                    class="w-full pl-10 pr-4 py-3 outline-none bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                    placeholder="Example: Home Icon"
                >
            </div>
        </div>

        <!-- Class Field -->
        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Icon Class
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-500">
                    <i class="ri-code-line"></i>
                </div>
                <input
                    type="text"
                    name="class"
                    id="class"
                    required
                    value="{{ $icon->class }}"
                    class="w-full pl-10 pr-4 py-3 outline-none bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                    placeholder="Example: ri-home-line"
                    oninput="updateIconPreview()"
                >
            </div>
        </div>

        <!-- Icon Preview -->
        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Icon Preview
            </label>
            <div
                id="icon-preview"
                class="p-8 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10] flex items-center justify-center h-32 transition-all"
            >
                <i class="{{ $icon->class }} text-6xl text-red-500 dark:text-red-400"></i>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-6 border-t border-gray-200/50 dark:border-[#ffffff10]">
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-red-600 to-rose-500 hover:from-red-700 hover:to-rose-600 text-white font-semibold py-3.5 px-6 rounded-lg transition-all transform hover:scale-[1.02] flex items-center justify-center space-x-2"
            >
                <i class="ri-save-line"></i>
                <span>Update Icon</span>
            </button>
        </div>
    </form>
</div>

<script>
    function updateIconPreview() {
        const iconClass = document.getElementById('class').value.trim();
        const iconPreview = document.getElementById('icon-preview');

        iconPreview.innerHTML = '';
        if(iconClass) {
            try {
                const icon = document.createElement('i');
                icon.className = `${iconClass} text-6xl text-red-500 dark:text-red-400 transition-all`;
                iconPreview.appendChild(icon);

                // Добавляем анимацию при изменении
                iconPreview.classList.add('animate-pulse');
                setTimeout(() => iconPreview.classList.remove('animate-pulse'), 200);
            } catch(e) {
                iconPreview.innerHTML = '<i class="ri-error-warning-line text-red-500 text-4xl"></i>';
            }
        } else {
            iconPreview.innerHTML = '<i class="ri-question-line text-6xl text-red-500 opacity-50"></i>';
        }
    }
</script>
@endsection
