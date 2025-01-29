<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = '123';

        return Inertia::render('Categories/Index', [
            'categories' => $categories,
        ]);
    }

    public function show(Request $request)
    {
        $category = '123';

        return Inertia::render('Categories/Show', [
            'category' => $category,
        ]);
    }
}
