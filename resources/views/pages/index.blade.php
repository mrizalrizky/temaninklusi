@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div style="background-color: #CCE1E2">
    <div class="container text-center justify-content-center pt-3 pb-5">
      <h3 style="color: #01676C">
        Cari event yang ramah untuk <strong>Disabilitas?</strong> Temukan
        hanya di <strong>TemuInklusi</strong>
      </h3>
      <div class="my-5">
        <img src="{{ asset('assets/img/hero.svg')}}" style="max-width: 100%" />
      </div>
    </div>
  </div>

{{-- Benefit Card --}}
<div class="card m-5" style="width: 18rem;">
    <div class="d-flex justify-content-center align-items-center py-4">
        <img src="{{ asset('assets/img/benefitimg.svg')}}" class="card-img-top" alt="event banner" style="max-width: 10rem;" >
    </div>
    <div class="card-body text-center px-5">
      <h5 class="card-title" style="color: #01676C">Aksesibilitas</h5>
      <p style="color: black; font-size: 16px">Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place.</p>
    </div>
  </div>

{{-- Event Card --}}
<a href="#" style="text-decoration: none;">
    <div class="card m-5" style="width: 18rem;">
      <img src="{{ asset('assets/img/cardimg.png')}}" class="card-img-top" alt="event banner">
      <div class="card-body">
        <h5 class="card-title" style="color: #01676C">Power of Words</h5>
        <p style="color: black; font-size: 12px">8 Agustus 2024</p>
      </div>
    </div>
  </a>
@endsection
