<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;

class CheckArticleAccess
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
        $article = Article::whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $user = $request->user();
        if($article->show_flag) return $next($request);
        if($user && $user->isAdmin() && !$article->show_flag) return $next($request);

        abort(403, 'This action is not authorized.');
    }
}
