<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class AdminComponentController extends Controller
{
    public function index()
    {
        $components = Component::with('category')->get();

        return view('admin.elements.component.index', [
            'components' => $components,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.elements.component.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'code_html' => 'nullable|string',
            'code_vue' => 'nullable|string',
            'code_react' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Component::query()->create($request->only([
            'name', 'description', 'code_html', 'code_vue', 'code_react', 'category_id',
        ]));

        return redirect()->route('admin.components.index');
    }

    public function show(int $id)
    {
        $component = Component::with('category')->findOrFail($id);

        return view('admin.elements.component.show', [
            'component' => $component,
        ]);
    }

    public function edit(int $id)
    {
        $component = Component::query()->findOrFail($id);
        $categories = Category::all();

        return view('admin.elements.component.edit', [
            'component' => $component,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'code_html' => 'nullable|string',
            'code_vue' => 'nullable|string',
            'code_react' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $component = Component::query()->findOrFail($id);

        $component->update($request->only([
            'name', 'description', 'code_html', 'code_vue', 'code_react', 'category_id',
        ]));

        return redirect()->route('admin.components.index');
    }

    public function destroy(int $id)
    {
        Component::destroy($id);

        return redirect()->route('admin.components.index');
    }
}
