<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        return Inertia::render('Examples/Laravel');
    }

    public function show(Request $request)
    {

        $category = '123';

        $example = '123';

        return Inertia::render('Examples/Show', [
            'category' => $category,
            'example' => $example,
        ]);
    }
}
