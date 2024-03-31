<?php

namespace App\Http\Middleware;

use App\Models\LocationTrackers;
use App\Models\PageTracker;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class TrackerMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $agent = new Agent();

        PageTracker::create([
            'ip_address' => $request->ip(),
            'method' => $request->method(),
            'url' => $request->url(),
            'user_agent' => $request->userAgent(),
            'referrer' => $request->header('referer') !== null ? $request->header('referer') : null,
            'device' => $agent->device(),
            'platform' => $agent->platform(),
            'browser' => $agent->browser(),
        ]);

        return $next($request);
    }
}
