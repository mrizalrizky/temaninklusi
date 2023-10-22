<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticles() {
        $articles = Article::latest()->get();

        return view('pages.blog', compact('articles'));
    }
}
