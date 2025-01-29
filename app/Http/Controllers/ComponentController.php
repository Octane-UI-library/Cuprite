<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ComponentController extends Controller
{
    public function index()
    {
        return Inertia::render('Components');
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
