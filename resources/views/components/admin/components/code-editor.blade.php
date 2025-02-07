<div class="editor-container">
    <h2 class="text-2xl font-bold text-white">{{ $label }}</h2>
    <div class="grid grid-cols-2 gap-6">
        <!-- Текстовое поле для ввода кода -->
        <div class="col-span-1">
            <textarea id="{{ $editorId }}"
                      name="{{ $name }}"
                      placeholder="{{ $placeholder }}"
                      class="w-full h-80 p-2 border rounded"></textarea>
        </div>

        <!-- Вывод результата -->
        <div class="col-span-1">
            @if ($outputType === 'iframe')
                <iframe id="{{ $outputId }}" class="bg-white w-full h-80"></iframe>
            @else
                <div id="{{ $outputId }}" class="bg-white w-full h-80"></div>
            @endif
        </div>
    </div>
</div>
