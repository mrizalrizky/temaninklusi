@extends('layouts.app')

@section('content')
<div class="container-lg">
    @if (session()->has('success'))
    <div class="alert alert-success d-flex alert-dismissible fade show">
        <p class="m-0">{{ session()->get('success') }}</p>
        <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
            data-bs-dismiss="alert" aria-label="close"></button>
    </div>

    @if (Auth::check() && Auth::user()->isAdmin())
        <div class="align-content-end">
            <a href="#">Edit</a>
        </div>
    @endif


</div>
@endsection
