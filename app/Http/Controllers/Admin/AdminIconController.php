<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use Illuminate\Http\Request;

class AdminIconController extends Controller
{
    public function index()
    {
        $icons = Icon::all();

        return view('admin.elements.icons.index', [
            'icons' => $icons,
        ]);
    }

    public function create()
    {
        return view('admin.elements.icons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        Icon::query()->create([
            'name' => $request->name,
            'class' => $request->class,
        ]);

        return redirect()->route('admin.icons.index');
    }

    public function show(int $id)
    {
        $icon = Icon::query()->findOrFail($id);

        return view('admin.elements.icons.show', [
            'icon' => $icon,
        ]);
    }

    public function edit(int $id)
    {
        $icon = Icon::query()->findOrFail($id);

        return view('admin.elements.icons.edit', [
            'icon' => $icon,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        $icon = Icon::query()->findOrFail($id);
        $icon->update([
            'name' => $request->name,
            'class' => $request->class,
        ]);

        return redirect()->route('admin.icons.index');
    }

    public function destroy(int $id)
    {
        Icon::destroy($id);

        return redirect()->route('admin.icons.index');
    }
}
