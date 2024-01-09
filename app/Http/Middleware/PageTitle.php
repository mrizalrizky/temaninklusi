<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PageTitle
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
        $reqPath = $request->path();
        $pageTitles = [
            '/'        => 'Home',
            'events'   => 'Events',
            'blog'     => 'Blog',
            'about'    => 'About',
            'profile'  => 'Profile',
            'login'    => 'Login',
            'register' => 'Register',
            'forgot'   => 'Forgot Password',
            'reset'    => 'Reset Password',
            'admin'    => 'Admin Dashboard',
        ];

        $matches = array_filter(array_keys($pageTitles), function ($path) use ($reqPath) {
            return strpos($reqPath, $path) === 0;
        });

        $pageTitle = reset($matches) ? $pageTitles[reset($matches)] : '';

        // Ini ngebalikin dulu ke view
        view()->share('pageTitle', $pageTitle);

        return $next($request);
    }
}
