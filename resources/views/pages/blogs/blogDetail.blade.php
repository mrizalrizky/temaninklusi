@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="d-flex flex-column align-items-center p-4 my-2">
            <h4 class="mb-1">{{ $article->title }}</h4>
            <small style="color: #515B60;">Source: {{ $article->created_by }}</small>
        </div>
        <div class="d-flex justify-content-center">
            <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721" class="img-fluid col-10 object-fit-cover rounded-4" style="max-width: 30rem; max-height: 20rem" alt="">
        </div>
        <div class="mt-5 text-left">
            {!! $article->content !!}
        </div>
    </div>
@endsection
