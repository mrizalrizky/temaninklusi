@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        @can('is-admin')
            <div class="d-flex justify-content-end my-2">
                <div class="d-flex gap-2 my-2">
                    <a href="{{ route('blog.edit', $article->slug) }}" class="badge btn btn-primary">Edit</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteArticleModal"
                        class="badge btn btn-danger">Delete</button>
                </div>

                <x-dialog.base-dialog id="deleteArticleModal" action="{{ route('blog.delete', $article->slug) }}"
                    title="Yakin akan hapus artikel?">
                    {{ method_field('DELETE') }}
                </x-dialog.base-dialog>
            </div>
        @endcan
        <div class="d-flex flex-column align-items-center p-4 my-2">
            <h4 class="mb-2 text-center">{{ $article->title }}</h4>
            <small style="color: #515B60;">Source : {{ $article->source ?? '-' }}</small>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <img src={{ Storage::disk('public')->exists($article->articleBanner->file_path) ? Storage::disk('public')->url($article->articleBanner->file_path . $article->articleBanner->file_name) : asset('assets/img/temuinklusi-asset.png') }}
                class="img-fluid col-10 object-fit-contain rounded-4" style="max-width: 30rem; max-height: 20rem"
                alt="">
        </div>
        <div class="text-left">
            {!! $article->content !!}
        </div>
    </div>
@endsection
