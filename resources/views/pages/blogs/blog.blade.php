@extends('layouts.app')

@section('content')
<div class="container-lg px-3 px-lg-4">
    @can('is-admin')
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('blog.show-add') }}"
        class="badge btn btn-primary" style="border-radius: 0.35rem !important">+ Add Blog</a>
    </div>
    @endcan
    <div class="text-center my-4">
        <h3 class="text-primary">Inklusi dalam setiap kata</h3>
        <p class="text-primary">buat bantu kamu terinspirasi!</p>
    </div>

    <section class="d-grid gap-5 mb-5">
    @foreach ($articles as $article)
        <x-card.blog-card :article="$article"/>
    @endforeach
    </section>

    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>

@endsection
