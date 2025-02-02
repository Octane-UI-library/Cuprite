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

    public function show(Request $request)
    {

        $cartegory = 'components';

        $component = 'showComponent';

        return Inertia::render('Component', [
            'category' => $cartegory,
            'component' => $component,
        ]);
    }
}
