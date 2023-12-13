<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(3);

        return view('pages.blog', compact('articles'));
    }

    public function showAddBlog() {
        return view('pages.addBlog');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required||unique:articles',
            'source' => 'required',
        ]);
    }

    public function add(Request $request) {
        $this->validateLogin($request);

        $file = $request->file('image');

        $imageName = 'blogs/'.time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images/blogs/', $file, $imageName);

        $data['image'] = $imageName;


        // Product::create($data);

        return redirect()->route('blog.index');
    }

    public function show($slug) {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
            ])->get()->first();

        $article->content = preg_replace('~[\r\n]+~', '<br><br>', $article->content);
        return view('pages.blogDetail', compact('article'));
    }

    public function edit($slug) {
        return view('pages.blog');
    }

    public function update($slug) {

        return view('pages.blog-detail')->with('success', 'Berhasil edit data!');
    }
}
