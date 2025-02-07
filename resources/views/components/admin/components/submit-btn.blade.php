@props(['iconClass' => 'ri-add-circle-line'])

<div class="pt-6 border-t border-gray-200/50 dark:border-[#ffffff10]">
    <button
        type="submit"
        class="w-full bg-gradient-to-r from-red-600 to-rose-500 hover:from-red-700 hover:to-rose-600 text-white font-semibold py-3.5 px-6 rounded-lg transition-all transform hover:scale-[1.02] flex items-center justify-center space-x-2"
    >
        <i class="{{ $iconClass }}"></i>
        <span>
            {{ $slot }}
        </span>
    </button>
</div>
