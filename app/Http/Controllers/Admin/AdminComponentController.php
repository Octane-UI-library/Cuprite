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
        $components = Component::with('category')->select('id', 'name', 'slug')->get();

        return view('admin.elements.component.components', [
            'components' => $components,
        ]);
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.elements.component.create',[
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'code' => 'required',
        ]);

        $slug = str_replace(' ', '-', strtolower($request->slug));

        Component::create([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'code' => $request->code,
        ]);

        return redirect()->back();
    }

    public function show(string $id)
    {
        $component = Component::with('category')->findOrFail($id);

        return view('admin.elements.component.show', [
            'component' => $component,
        ]);
    }

    public function edit(string $id)
    {
        $categories = Category::all()->pluck('name', 'id');

        $component = Component::with('category')->findOrFail($id);

        return view('admin.elements.component.edit', [
            'component' => $component,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'code' => 'required',
        ]);

        $slug = str_replace(' ', '-', strtolower($request->slug));

        $component = Component::findOrFail($id);

        $component->update([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'code' => $request->code,
        ]);

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        Component::destroy($id);

        return redirect()->back();
    }

//    public function publish(string $id)
//    {
//        //
//    }
//
//    /**
//     * Archive the specified resource.
//     */
//    public function archive(string $id)
//    {
//        //
//    }
}
