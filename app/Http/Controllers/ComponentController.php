<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComponentController extends Controller
{
    public function index()
    {
        $categories = Category::with(['components' => function ($query) {
            $query->take(4);
        }])->get();
        return Inertia::render('Components', [
            'categories' => $categories,
        ]);
    }

    public function show(Request $request, string $slug)
    {
        $category = Category::where('slug', $slug)
            ->with('components')
            ->firstOrFail();

        return Inertia::render('Components/Show', [
            'category' => $category,
        ]);
    }
}
