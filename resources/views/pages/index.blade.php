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
  <div class="d-md-flex flex-row pt-5 gap-3 justify-content-center">
    <x-benefit-card title="Aksesibilitas" description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place."/>
    <x-benefit-card title="Aksesibilitas" description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place."/>
    <x-benefit-card title="Aksesibilitas" description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place."/>
  </div>
</section>

<section class="container py-5">
  <h3 class="text-center" style="color: #01676C">
    Event Pilihan
  </h3>

  {{-- Event Card --}}
  <div class="d-md-flex flex-row pt-5 justify-content-center gap-3">
    <div class="card col-12 col-md-4 p-0">
        <img src="{{ asset('assets/img/cardimg.png')}}" class="card-img-top img-fluid" alt="event banner">
        <div class="card-body px-3">
            <h5 class="card-title" style="color: #01676C">Power of Words</h5>
            <p style="color: black; font-size: 12px">8 Agustus 2024</p>
        </div>
    </div>

    <div class="card col-12 col-md-4 p-0">
        <a class="text-decoration-none" href="#">
            <img src="{{ asset('assets/img/cardimg.png')}}" class="card-img-top img-fluid" alt="event banner">
            <div class="card-body px-3">
                <h5 class="card-title" style="color: #01676C">Power of Words</h5>
                <p style="color: black; font-size: 12px">8 Agustus 2024</p>
            </div>
        </a>
    </div>

    <div class="card col-12 col-md-4 p-0">
        <img src="{{ asset('assets/img/cardimg.png')}}" class="card-img-top img-fluid" alt="event banner">
        <div class="card-body px-3">
            <h5 class="card-title" style="color: #01676C">Power of Words</h5>
            <p style="color: black; font-size: 12px">8 Agustus 2024</p>
        </div>
    </div>
  </div>
</section>

<section class="container d-flex flex-row justify-content-between p-5" style="background-color: #01676C; border-radius: 20px">
    <div class=" align-self-center">
        <h3 style="color: #ffffff">
            Yuk upload event di TemuInklusi!
        </h3>
        <p style="color: #ffffff">organize@TemuInklusi.com</p>
    </div>
    <div>
        <img src="{{ asset('assets/img/asd.svg') }}" class="img-fluid" style="width: 25rem;"/>
    </div>
</section>
@endsection
