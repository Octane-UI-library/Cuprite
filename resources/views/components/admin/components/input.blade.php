@props([
    'labelText' => 'Default label header',
    'inputIconClass' => 'ri-tag-line',
    'inputType' => 'input',
    'type' => 'text',
    'name' => 'default_name',
    'id' => 'default_id',
    'placeholder' => 'Default placeholder',
    'required' => false,
    'oninput' => ''
])

<div class="space-y-2 mb-5">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $labelText ?: 'Default label header' }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 pt-3 flex items-start pointer-events-none text-red-500">
            <i class="{{ $inputIconClass }}"></i>
        </div>
        @if($inputType === 'textarea')
            <textarea
                name="{{ $name }}"
                id="{{ $id }}"
                @if($required) required @endif
                rows="4"
                class="w-full pl-10 pr-4 py-3 bg-white/50 outline-none dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                placeholder="{{ $placeholder }}"
                @if($oninput) oninput="{{ $oninput }}" @endif
            ></textarea>
        @else
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $id }}"
                @if($required) required @endif
                class="w-full pl-10 pr-4 py-3 outline-none bg-white/50 dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-600 transition-all"
                placeholder="{{ $placeholder }}"
                @if($oninput) oninput="{{ $oninput }}" @endif
            >
        @endif
    </div>
</div>
