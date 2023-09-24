@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div style="background-color: #CCE1E2">
    <div class="container text-center pt-3 pb-5">
      <h3 style="color: #01676C">
        Cari event yang ramah untuk <strong>Disabilitas?</strong> Temukan
        hanya di <strong>TemuInklusi</strong>
      </h3>
      <div class="my-5">
        <img src="{{ asset('assets/img/hero.svg')}}" style="max-width: 100%" />
      </div>
    </div>
  </div>

<section class="container py-5">
  <h3 class="text-center" style="color: #01676C">
   Kenapa TemuInklusi?
  </h3>

  {{-- Benefit Card --}}
  <div class="d-flex pt-5">
    <div class="card" style="width: 18rem;">
        <div class="d-flex justify-content-center align-items-center py-4">
        <img src="{{ asset('assets/img/benefitimg.svg')}}" class="card-img-top" alt="event banner" style="max-width: 10rem;" >
        </div>
        <div class="card-body text-center px-5">
        <h5 class="card-title" style="color: #01676C">Aksesibilitas</h5>
        <p style="color: black; font-size: 16px">Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place.</p>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="d-flex justify-content-center align-items-center py-4">
        <img src="{{ asset('assets/img/benefitimg.svg')}}" class="card-img-top" alt="event banner" style="max-width: 10rem;" >
        </div>
        <div class="card-body text-center px-5">
        <h5 class="card-title" style="color: #01676C">Aksesibilitas</h5>
        <p style="color: black; font-size: 16px">Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place.</p>
        </div>
    </div>
  </div>
</section>

<section class="container py-5">
  <h3 class="text-center" style="color: #01676C">
    Event Pilihan
  </h3>

  {{-- Event Card --}}
  <div class="d-flex pt-5">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('assets/img/cardimg.png')}}" class="card-img-top" alt="event banner">
        <div class="card-body">
            <h5 class="card-title" style="color: #01676C">Power of Words</h5>
            <p style="color: black; font-size: 12px">8 Agustus 2024</p>
        </div>
    </div>

    <div class="card " style="width: 18rem;">
        <img src="{{ asset('assets/img/cardimg.png')}}" class="card-img-top" alt="event banner">
        <div class="card-body">
            <h5 class="card-title" style="color: #01676C">Power of Words</h5>
            <p style="color: black; font-size: 12px">8 Agustus 2024</p>
        </div>
    </div>
  </div>
</section>

<section class="container d-flex justify-content-center">
    <img src="{{ asset('assets/img/ctabanner1.png') }}" style="width: 100%;"/>
</section>
@endsection
