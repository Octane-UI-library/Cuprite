@extends('admin.elements.elements')

@section('element_title')
    Create Icon
@endsection

@section('element_txt')
    Create Icon
@endsection

@section('element_create_link')
    {{ route('admin.icons.index') }}
@endsection

@section('element_create_txt')
    Back to Icons
@endsection

@section('element_content')

    <form action="{{ route('admin.icons.store') }}" method="POST" class="bg-rose-50 p-6 rounded-lg">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-rose-600 font-semibold">Name</label>
            <input class="border border-rose-300 p-2 w-full rounded-lg" type="text" name="name" id="name" required>
        </div>

        <div class="mb-4">
            <label for="class" class="block text-rose-600 font-semibold">Icon Class (Remix Icon)</label>
            <input class="border border-rose-300 p-2 w-full rounded-lg" type="text" name="class" id="class" placeholder="Example: ri-home-line" required oninput="updateIconPreview()">
        </div>

        <div class="mb-4">
            <label class="block text-rose-600 font-semibold">Icon Preview</label>
            <div id="icon-preview" class="text-rose-500 text-5xl mt-2">
                <i class="ri-question-line"></i>
            </div>
        </div>

        <button type="submit" class="bg-rose-500 text-white px-4 py-2 rounded-lg hover:bg-rose-600">
            Create
        </button>
    </form>

    <script>
        function updateIconPreview() {
            const iconClass = document.getElementById('class').value.trim();
            const iconPreview = document.getElementById('icon-preview');

            iconPreview.innerHTML = '';
            if (iconClass) {
                const iconElement = document.createElement('i');
                iconElement.className = iconClass;
                iconPreview.appendChild(iconElement);
            } else {
                iconPreview.innerHTML = '<i class="ri-question-line"></i>';
            }
        }
    </script>

@endsection
