@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <h4 class="my-4">Add Blog</h4>
        <div class="col-8">
            <form enctype="multipart/form-data" action="{{ route('blog.create') }}" class="ms-2" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label text-primary label-add-blog">Choose Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingInput"
                        name="image">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label text-primary label-add-blog">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput"
                           name="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="form-label text-primary label-add-blog">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="4"></textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label text-primary label-add-blog">Source</label>
                    <input type="text" class="form-control @error('source') is-invalid @enderror" id="floatingInput"
                           name="source">
                    @error('source')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button class="btn btn-primary text-bg-primary mt-1 rounded-3 ms-2 px-4" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
