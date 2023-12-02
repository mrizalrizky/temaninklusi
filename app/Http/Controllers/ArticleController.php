<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(3);

        return view('pages.blogs.blog', compact('articles'));
    }

    public function show($slug) {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
            ])->get()->first();

        $article->content = preg_replace('~[\r\n]+~', '<br><br>', $article->content);
        return view('pages.blogs.blogDetail', compact('article'));
    }

    // public function edit($slug) {
    //     return view('pages.blog');
    // }

    // public function update($slug) {

    //     return view('pages.blog-detail')->with('success', 'Berhasil edit data!');
    // }
}
