<?php

namespace App\Http\Controllers;

use App\Actions\Git\GitAction;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(GitAction $action)
    {
        return Inertia::render('Home', [
            'stars' => $action->handle(),
        ]);

    }
}
