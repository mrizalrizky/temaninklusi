@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="my-5 text-center text-md-start">
            <h4 class="text-primary">Add Blog</h4>
            <h5 class="text-left m-b-custom-2 fw-normal">buat pengguna lain terinspirasi!</h5>
        </div>
        <div class="d-md-flex justify-content-center">
            <div class="col col-xl-7 border border-1 rounded-4 align-items-center p-5">
                <form enctype="multipart/form-data" action="{{ route('blog.validate') }}" class="d-flex flex-column gap-4"
                      method="POST">
                @csrf
                @if (Session::get('articleModal'))
                    @php
                        $data = Session::get('articleModal');
                    @endphp
                @else
                    @php
                        $data = null;
                    @endphp
                @endif
                <div class="row gap-4 gap-sm-3">
                    <div class="col-12 col-sm">
                        <x-form.base-form-input title="Judul Artikel" name="title" type="text"
                            value="{{ $data ? $data['title'] : old('title') }}" :label="true">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>
                    </div>
                    <div class="col-12 col-sm">
                        <label for="article_category" class="text-primary fw-bold mb-2 mandatory">Kategori Artikel</label>
                        <x-form.base-form-select name="article_category" id="article_category" placeholder="Pilih Kategori"
                            :options="$articleCategories" selectedValue="{{ $data ? $data['article_category'] : old('article_category') }}" />
                    </div>
                </div>

                <div class="row gap-4 gap-sm-3">
                    <div class="col-12 col-sm">
                        <x-form.base-form-input title="Sumber" name="source" type="text"
                            value="{{ $data ? $data['source'] : old('source') }}" :label="true">
                            @error('source')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>
                    </div>
                    <div class="col-12 col-sm">
                        <x-form.base-form-input title="Penulis" name="created_by" type="text"
                            value="{{ Auth::user()->name }}" :label="true" disabled>
                            @error('created_by')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>
                    </div>
                </div>

                <div>
                    <label class="form-label text-primary label-add-blog fw-bold mandatory">Thumbnail</label>
                    <x-button.upload-image-button name="article_banner" />
                </div>
                @if ($data)
                    <input type="hidden" name="article_banner" value="{{ $data['article_banner'] }}">
                {{-- @else
                    <div>
                        <label class="form-label text-primary label-add-blog">Thumbnail</label>
                        <x-button.upload-image-button name="article_banner" />
                    </div> --}}
                @endif

                <div>
                    <label for="content" class="form-label text-primary label-add-blog fw-bold mandatory">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="4">{{ $data ? $data['content'] : old('content') }}</textarea>
                    @error('content')
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
