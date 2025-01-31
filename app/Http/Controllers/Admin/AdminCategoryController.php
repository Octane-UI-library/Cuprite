<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.elements.categories.categories', [
            'categories' => $categories,
        ]);
    }


    public function create()
    {
        return view('admin.elements.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $slug = str_replace(' ', '-', strtolower($request->slug));

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'icon' => $request->icon,
        ]);

        return redirect()->back();
    }


    public function show(string $id)
    {
        $category = Category::find($id);

        return view('admin.elements.categories.show', [
            'category' => $category,
        ]);
    }

    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.elements.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $category = Category::find($id);

        $category->update($request->all());

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        Category::destroy($id);

        return redirect()->back();
    }
}
