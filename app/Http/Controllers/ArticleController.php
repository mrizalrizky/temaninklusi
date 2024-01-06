<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            ])->firstOrFail();

            if ($article->title != $request->title) {
                $validation['title'] = 'required|unique:articles';
            } else {
                $validation['title'] = 'required';
            }
        } else {
            $validation['title'] = 'required|unique:articles';
            $validation['article_banner'] = 'required';
        }

        $request->validate($validation);

        $articleBannerFile = $request->file('article_banner');
        $data = $request->all();
        unset($data['article_banner']);
        $titleSlug = Str::slug($request->title);

        if ($articleBannerFile) {
            $imageName = 'article_banner' . '.' . $articleBannerFile->getClientOriginalExtension();
            Storage::putFileAs('public/images/blogs/' . $titleSlug, $articleBannerFile, $imageName);
            $data['article_banner'] = $imageName;
        }
        return redirect()->back()->with('articleModal', $data);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $titleSlug = Str::slug($request->title, '-');
            $fileData = File::create([
                'file_name' => $request->article_banner,
                'file_path' => '/images/blogs/' . $titleSlug . '/',
                'file_type' => 'article_banner',
            ]);

            Article::create([
                'file_id' => $fileData->id,
                'article_category_id' => $request->article_category,
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $titleSlug,
                'source' => $request->source,
                'show_flag' => true,
                'created_by' => Auth::user()->username,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return redirect()->route('blog.index')->with('action-success', 'Tips dan artikel berhasil dibuat!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('action-failed', 'Tips dan artikel gagal dibuat. Silahkan coba lagi!');
        }

    }

    public function show($slug)
    {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
        ])->firstOrFail();

        $article->content = preg_replace('~[\r\n]+~', '<br><br>', $article->content);
        return view('pages.blogs.blogDetail', compact('article'));
    }

    public function edit($slug)
    {
        $article = Article::where([
            ['slug', $slug],
            ['show_flag', True]
        ])->firstOrFail();

        $articleCategories = ArticleCategory::all();
        return view('pages.blogs.editBlog', compact('article', 'articleCategories'));
    }

    public function update(Request $request, $slug)
    {
        DB::beginTransaction();
        try {

            $article = Article::where([
                ['slug', $slug],
                ['show_flag', True]
            ])->firstOrFail();

            $this->validateData($request);

            if ($request->article_banner) {
                $currentFile = File::find($article->file_id);
                $currentFile->update([
                    'file_name' => $request->article_banner,
                    'file_path' => '/images/blogs/' . $slug ,
                ]);
            }

            $data = [
                'article_category_id' => $request->article_category,
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'source' => $request->source,
                'updated_by' => Auth::user()->name,
                'updated_at' => now()
            ];

            $article->update($data);

            DB::commit();
            return redirect()->route('blog.details', $slug)->with('action-success', 'Tips dan artikel berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('action-failed', 'Tips dan artikel gagal diedit. Silahkan coba lagi!');
        }
    }

    public function delete($slug) {
        DB::beginTransaction();
        try {
            $article = Article::where([
                ['slug', $slug],
                ['show_flag', True]
            ])->firstOrFail();

            $article->update([
                'show_flag' => false
            ]);

            DB::commit();
            return redirect()->route('blog.index')->with('action-success', 'Tips dan artikel berhasil dihapus!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('blog.index')->with('action-success', 'Tips dan artikel gagal dihapus. Silahkan coba lagi!');
        }
    }
}
