<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Illuminate\Http\Request;

class CheckEventAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('slug');
        $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $user = $request->user();
        if($event->show_flag) return $next($request);
        if($user && $user->isAdmin() && !$event->show_flag) return $next($request);

        abort(403, 'This action is not authorized.');
    }
}
