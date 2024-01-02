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
    public function index()
    {
        $articles = Article::latest()->paginate(3);

        return view('pages.blogs.blog', compact('articles'));
    }

    public function showAddBlog()
    {
        $articleCategories = ArticleCategory::all();
        return view('pages.addBlog', compact('articleCategories'));
    }

    protected function validateData(Request $request)
    {
        $validation = [
            'content' => 'required',
            'source' => 'required',
            'article_category' => 'required',
        ];

        if ($request->slug) {
            $article = Article::where([
                ['slug', $request->slug],
                ['show_flag', True]
            ])->first();

            if ($article->title != $request->title) {
                $validation['title'] = 'required|unique:articles';
            } else {
                $validation['title'] = 'required';
            }
        } else {
            $validation['article_banner'] = 'required';
            $validation['title'] = 'required|unique:articles';
        }

        $request->validate($validation);

        $imageFile = $request->file('article_banner');
        $data = $request->all();
        unset($data['article_banner']);

        if ($imageFile) {
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            Storage::putFileAs('public/images/blogs', $imageFile, $imageName);

            $data['article_banner'] = 'images/blogs/' . $imageName;
        }
        return redirect()->back()->with('articleModal', $data);
    }

    public function create(Request $request)
    {
        $temp = explode('/', $request->article_banner);
        $fileData = File::create([
            'file_name' => $temp[count($temp) - 1],
            'file_path' => 'images/blogs/' . $temp[count($temp) - 1],
            'file_type' => 'article_banner',
        ]);

        Article::create([
            'file_id' => $fileData->id,
            'article_category_id' => $request->article_category,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'source' => $request->source,
            'show_flag' => true,
            'created_by' => Auth::user()->username,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('blog.index');
    }

    public function show($slug)
    {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
        ])->first();

        $article->content = preg_replace('~[\r\n]+~', '<br><br>', $article->content);
        return view('pages.blogs.blogDetail', compact('article'));
    }

    public function edit($slug)
    {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
        ])->first();

        $articleCategories = ArticleCategory::all();
        return view('pages.blogs.editBlog', compact('article', 'articleCategories'));
    }

    public function update(Request $request, $slug)
    {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
        ])->first();

        $this->validateData($request);

        // $fileId = 0;
        if ($request->article_banner) {
            $currentFile = File::find($article->file_id);
            $temp = explode('/', $request->article_banner);
            $currentFile->update([
                'file_name' => $temp[count($temp) - 1],
                'file_path' => 'images/blogs/' . $temp[count($temp) - 1],
            ]);
        }

        $data = [
            'article_category_id' => $request->article_category,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'source' => $request->source,
            'updated_by' => Auth::user()->name,
            'updated_at' => now()
        ];

        // dd($data);

        $article->update($data);

        return redirect()->route('blog.details', $article->slug)->with('success', 'Berhasil edit data!');
    }
}
