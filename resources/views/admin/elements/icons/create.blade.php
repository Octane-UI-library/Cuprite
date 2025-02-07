@extends('admin.elements.elements')

@section('element_title')
    Create New Icon
@endsection

@section('element_txt')
    Create Icon
@endsection

@section('element_create_link')
    {{ route('admin.icons.index') }}
@endsection

@section('element_create_txt')
    <i class="ri-arrow-left-line mr-2"></i>Back to Icons
@endsection

@section('element_content')

    <x-admin.components.container>
        <form action="{{ route('admin.icons.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Name Field -->
            <x-admin.components.input
                label-text="Name"
                input-icon-class="ri-home-line"
                type="text"
                name="name"
                id="name"
                placeholder="Example: Home Icon"
                required
            />
            <!-- Class Field -->
            <x-admin.components.input
                label-text="Icon Class"
                input-icon-class="ri-code-line"
                type="text"
                name="class"
                id="class"
                placeholder="Example: ri-home-line"
                required
                oninput="updateIconPreview()"
            />

            <!-- Icon Preview -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Icon Preview
                </label>
                <div
                    id="icon-preview"
                    class="p-8 bg-gray-50/30 dark:bg-[#19191a] rounded-lg border border-gray-200/30 dark:border-[#ffffff10] flex items-center justify-center h-32 transition-all"
                >
                    <i class="ri-question-line text-6xl text-red-500 dark:text-red-400 opacity-50"></i>
                </div>
            </div>

            <!-- Submit Button -->
            <x-admin.components.submit-btn>
                Create Icon
            </x-admin.components.submit-btn>
        </form>
    </x-admin.components.container>

@push('admin_layout_stack_scripts')
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
@endpush
@endsection
