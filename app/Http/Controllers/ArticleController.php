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
            $validation['image'] = 'required';
            $validation['title'] = 'required|unique:articles';
        }

        $request->validate($validation);

        $file = $request->file('image');
        $fileId = 0;
        $data = $request->all();
        unset($data['image']);

        if ($file) {
            // $imageName = time() . '.' . $file->getClientOriginalExtension();
            // Storage::putFileAs('public/images', $file, $imageName);

            $imageFile = $request->file('image');

            // $imageName = Str::slug($request->title).time().'.'.$imageFile->getClientOriginalExtension();
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $file = Storage::putFileAs('public/images/blogs', $imageFile, $imageName);

            $data['imageUploaded'] = 'images/blogs/' . $imageName;
        }
        return redirect()->back()->with('uploadArticleModal', $data);
    }

    public function create(Request $request)
    {
        // $fileType = 'article_banner';
        // $imageFile = $request->file('image');
        // $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
        // Storage::putFileAs('public/images/blogs/' . $fileType, $imageFile, $imageName);
        // $data['image'] = $imageName;
        $temp = explode('/', $request->imageUploaded);
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

        $this->validateData($request);

        // $file = $request->file('image');
        $fileId = 0;
        // if ($file) {
        //     $imageName = time() . '.' . $file->getClientOriginalExtension();
        //     // Storage::putFileAs('public/images', $file, $imageName);

        //     $imageFile = $request->file('image');

        //     // $imageName = Str::slug($request->title).time().'.'.$imageFile->getClientOriginalExtension();
        //     $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
        //     $file = Storage::putFileAs('public/images/blogs', $imageFile, $imageName);
        // dd($request);
        if ($request->imageUploaded) {
            $temp = explode('/', $request->imageUploaded);
            $fileData = File::create([
                'file_name' => $temp[count($temp) - 1],
                'file_path' => 'images/blogs/' . $temp[count($temp) - 1],
                'file_type' => 'article_banner',
            ]);

            $fileId = $fileData->id;
        }
        // }

        $data = [
            'article_category_id' => $request->article_category,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'source' => $request->source,
            'updated_by' => Auth::user()->username,
            'updated_at' => now()
        ];

        if ($fileId) $data['file_id'] = $fileId;

        $article->update($data);

        return redirect()->route('blog.details', $article->slug)->with('success', 'Berhasil edit data!');
    }
}
