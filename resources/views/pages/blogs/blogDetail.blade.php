@extends('layouts.app')
@section('content')
<div class="container-md px-4 px-lg-3">
    <div>
        @can('manage-article')
            <a href="{{ route('blog.edit') }}/{{ $article->slug }}">Edit</a>
            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteArticleModal">Delete</a>

            <x-dialog.base-dialog id="deleteEventModal" action="{{ route('blog.delete', $article->slug) }}"
                                    title="Yakin akan hapus artikel?">
                {{ method_field('DELETE') }}
            </x-dialog.base-dialog>
        @endcan
    </div>
    </div>
    <div class="d-flex flex-column align-items-center p-4 my-2">
        <h4 class="mb-2">{{ $article->title }}</h4>
        <small style="color: #515B60;">Source: {{ $article->source ?? '-'}}</small>
    </div>
    <div class="d-flex justify-content-center">
        <img src={{ Storage::disk('public')->exists($article->articleBanner->file_path) ? Storage::disk('public')->url($article->articleBanner->file_path . $article->articleBanner->file_name) : $article->articleBanner->file_path }} class="img-fluid col-10 object-fit-contain rounded-4" style="max-width: 30rem; max-height: 20rem" alt="">
    </div>
    <div class="mt-5 text-left">
        {!! $article->content !!}
    </div>
</div>
@endsection
