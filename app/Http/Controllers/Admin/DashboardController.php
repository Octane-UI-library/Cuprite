<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Component;
use App\Models\RequestLog;
use App\Models\VisitLog;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'user' => auth()->user(),
            'activeCategories' => Category::query()->count(),
            'activeComponents' => Component::query()->count(),
            'allUsage' => VisitLog::query()->count(),
            'avrUpTime' => RequestLog::query()->avg('execution_time'),
            'activityData' => [65, 59, 80, 81, 56, 55],
            'categoryData' => [35, 25, 20, 15, 5],
        ]);
    }
}
