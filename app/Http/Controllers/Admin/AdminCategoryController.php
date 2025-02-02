<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Icon;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('icon')->get();

        return view('admin.elements.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $icons = Icon::all();

        return view('admin.elements.categories.create', [
            'icons' => $icons,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'icon_id' => 'required|exists:icons,id',
        ]);

        $slug = str_replace(' ', '-', strtolower($request->slug));

        Category::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'icon_id' => $request->icon_id,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function show(string $id)
    {
        $category = Category::with('icon')->findOrFail($id);

        return view('admin.elements.categories.show', [
            'category' => $category,
        ]);
    }

    public function edit(string $id)
    {
        $category = Category::query()->where('id', $id)->firstOrFail();

        $icons = Icon::all();

        return view('admin.elements.categories.edit', [
            'category' => $category,
            'icons' => $icons,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-zA-Z0-9-]+$/',
            'icon_id' => 'required|exists:icons,id',
        ]);

        $category = Category::query()->where('id', $id)->firstOrFail();

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_replace(' ', '-', strtolower($request->slug)),
            'icon_id' => $request->icon_id,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(string $id)
    {
        Category::destroy($id);

        return redirect()->route('admin.categories.index');
    }
}
