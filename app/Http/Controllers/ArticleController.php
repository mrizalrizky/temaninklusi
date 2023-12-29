<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(3);

        return view('pages.blogs.blog', compact('articles'));
    }

    public function showAddBlog() {
        $articleCategories = ArticleCategory::all();
        return view('pages.addBlog', compact('articleCategories'));
    }

    protected function validateData(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required|unique:articles',
            'content' => 'required',
            'source' => 'required',
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            'image' => 'required',
            'title' => 'required|unique:articles',
            'content' => 'required',
            'source' => 'required',
        ]);

        $imageFile = $request->file('image');

        $imageName = Str::slug($request->title).time().'.'.$imageFile->getClientOriginalExtension();
        $file = Storage::putFileAs('public/images/blogs', $imageFile, $imageName);
        if($file) {
            $fileData = File::create([
                'file_name' => $imageName,
                'file_path' => $file,
                'file_type' => 'article_banner',
            ]);
        }

        Article::create([
            'file_id' => $fileData->id,
            'article_category_id' => 1,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'show_flag' => 1,
            'created_by' => Auth::user()->username,
            'updated_by' => Auth::user()->username,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('blog.index');
    }

    public function show($slug) {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
            ])->first();

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
