@extends('layouts.app')

@section('content')
<div class="container-lg px-3 px-lg-4">
    <div class="text-center my-5">
        <h3 class="text-primary">Inklusi dalam Setiap Kata</h3>
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
