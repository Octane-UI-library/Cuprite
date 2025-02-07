@extends('admin.elements.elements')

@section('element_title')
    Create Component
@endsection

@section('element_txt')
    Create Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i> Back to Components
@endsection

@push('admin_layout_stack_head')
    <!-- Vue, React, Babel -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CodeMirror стили -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/addon/hint/show-hint.min.css">

    <!-- CodeMirror скрипты -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/codemirror.min.js"></script>
    <!-- Режимы -->
    <!-- Для HTML используем htmlmixed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/mode/htmlmixed/htmlmixed.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/mode/xml/xml.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/mode/javascript/javascript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/mode/jsx/jsx.js"></script>
    <!-- Плагины автодополнения -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/addon/hint/show-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/addon/hint/javascript-hint.min.js"></script>
    <!-- HTML hint -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/addon/hint/html-hint.min.js"></script>
@endpush

@section('element_content')
    <x-admin.components.container>
        <form action="{{ route('admin.components.store') }}" method="POST" class="space-y-8">
            @csrf
            <div class="w-full grid grid-cols-1 gap-6">

                <!-- Поля формы -->
                <div class="col-span-1">
                    <!-- Название компонента -->
                    <x-admin.components.input
                        label-text="Component Name"
                        input-icon-class="ri-text"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Awesome Component"
                        required
                    />

                    <!-- Описание компонента -->
                    <x-admin.components.input
                        label-text="Description"
                        input-icon-class="ri-file-text-line"
                        input-type="textarea"
                        name="description"
                        id="description"
                        placeholder="Describe the component..."
                        required
                    />

                    <!-- Категория -->
                    <x-admin.components.category-field :categories="$categories" />
                </div>

                <!-- Блок редактирования кода -->
                <div class="col-span-1 grid grid-cols-1">
                    @foreach (['HTML' => 'iframe', 'Vue' => 'div', 'React' => 'div'] as $type => $outputTag)
                        <x-admin.components.code-editor
                            label="{{ $type }} Editor"
                            editor-id="{{ strtolower($type) }}-editor"
                            output-id="{{ strtolower($type) }}-output"
                            placeholder="Введите {{ $type }} код здесь..."
                            name="code_{{ strtolower($type) }}"
                            output-type="{{ $outputTag }}"
                        />
                    @endforeach
                </div>
            </div>

            <!-- Кнопка отправки формы -->
            <x-admin.components.submit-btn>
                Create Component
            </x-admin.components.submit-btn>
        </form>
    </x-admin.components.container>
<script src="{{ asset('js/codeMirror.js') }}"></script>
@endsection
