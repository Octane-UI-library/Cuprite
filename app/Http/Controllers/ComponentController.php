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
        }])->paginate(3);

        return Inertia::render('Components', [
            'categories' => $categories,
            'currentPage' => $categories->currentPage(),
            'lastPage' => $categories->lastPage(),
            'total' => $categories->total(),
            'perPage' => $categories->perPage(),
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
