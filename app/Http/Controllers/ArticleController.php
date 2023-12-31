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

    private $data;

    protected function validateData(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'source' => 'required',
        ]);

        if ($this->data) {
            if ($this->data->email != $request->email) {
                $request->validate([
                    'title' => 'required|unique:articles',
                ]);
            } else {
                $request->validate([
                    'title' => 'required',
                ]);
            }
        } else {

            $request->validate([
                'image' => 'required',
                'title' => 'required|unique:articles',
            ]);
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required|unique:articles',
            'content' => 'required',
            'source' => 'required',
        ]);

        $file = $request->file('image');

        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);

        $data['image'] = $imageName;

        $imageFile = $request->file('image');

        // $imageName = Str::slug($request->title).time().'.'.$imageFile->getClientOriginalExtension();
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
        $file = Storage::putFileAs('public/images/blogs', $imageFile, $imageName);
        if ($file) {
            $fileData = File::create([
                'file_name' => $imageName,
                'file_path' => 'images/blogs/' . $imageName,
                'file_type' => 'article_banner',
            ]);
        }


        Article::create([
            'file_id' => $fileData->id,
            'article_category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'source' => $request->source,
            'show_flag' => 1,
            'created_by' => Auth::user()->username,
            'updated_by' => Auth::user()->username,
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

        $this->data = $article;
        $this->validateData($request);

        $file = $request->file('image');
        $fileId = 0;
        if ($file) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);

            $data['image'] = $imageName;

            $imageFile = $request->file('image');

            // $imageName = Str::slug($request->title).time().'.'.$imageFile->getClientOriginalExtension();
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $file = Storage::putFileAs('public/images/blogs', $imageFile, $imageName);
            $fileData = File::create([
                'file_name' => $imageName,
                'file_path' => 'images/blogs/' . $imageName,
                'file_type' => 'article_banner',
            ]);

            $fileId = $fileData->id;
        }

        $data = [
            'article_category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'source' => $request->source,
            'updated_by' => Auth::user()->username,
            'updated_at' => now()
        ];

        if($fileId) $data['file_id'] = $fileId;

        $article->update($data);

        return redirect()->route('blog.details', $article->slug)->with('success', 'Berhasil edit data!');
    }
}
