@extends('layouts.app')

@section('content')
<div class="container-lg">
    <section>
        <div class="text-center my-5">
            <h3 class="text-primary">
                Inklusi dalam Setiap Kota
            </h3>
            <p class="text-primary fw-bold">buat bantu kamu terinspirasi!</p>
    </section>

    <section class="d-grid gap-5">
        @foreach ($articles as $article)
            <x-blog-card :article="$article"/>
        @endforeach
    </section>
</div>

@endsection
