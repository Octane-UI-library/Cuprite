@extends('admin.elements.elements')

@section('element_title')
    Show Component
@endsection

@section('element_create_link')
    {{ route('admin.components.index') }}
@endsection

@section('element_create_txt')
    Back to Components
@endsection

@section('element_content')
    <div>

        <label>Name</label>
        <p>{{ $component->name }}</p>

        <label>Description</label>
        <p>{{ $component->description }}</p>

        <label>HTML Code</label>
        <pre class="border">{{ $component->code_html }}</pre>

        <label>Vue Code</label>
        <pre class="border">{{ $component->code_vue }}</pre>

        <label>React Code</label>
        <pre class="border">{{ $component->code_react }}</pre>

        <label>Category</label>
        <p>{{ $component->category->name ?? 'No Category' }}</p>
    </div>
@endsection
