<?php

namespace App\Http\Middleware;

use App\Models\RequestLog;
use Closure;
use Illuminate\Http\Request;

class MeasureRequestTimeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);

        $response = $next($request);

        $endTime = microtime(true);

        $executionTime = $endTime - $startTime;

        RequestLog::query()->create([
            'url' => $request->url(),
            'execution_time' => $executionTime,
        ]);

        return $response;
    }
}
