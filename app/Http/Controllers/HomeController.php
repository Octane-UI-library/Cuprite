<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'user' => [
                'name' => 'John Doe',
                'age' => 30,
            ],
        ]);

    }
}
