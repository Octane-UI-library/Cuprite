<?php

namespace App\Http\Middleware;

use App\Models\VisitLog;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitLogMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        VisitLog::query()->firstOrCreate(
            [
                'ip_address' => $request->ip(),
                'visited_at' => Carbon::today(),
            ],
            [
                'user_agent' => $request->header('User-Agent'),
            ]
        );

        return $next($request);
    }
}
