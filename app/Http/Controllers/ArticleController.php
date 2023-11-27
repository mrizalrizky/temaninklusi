<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(3);

        return view('pages.blog', compact('articles'));
    }

    public function show($slug) {
        // $article = Article::find()
        return view('pages.blog-detail');
    }

    public function edit($slug) {
        return view('pages.blog');
    }

    public function update($slug) {

        return view('pages.blog-detail')->with('success', 'Berhasil edit data!');
    }
}
