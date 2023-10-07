@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div style="background-color: #CCE1E2">
        <div class="container-lg text-center pt-4 pb-4">
            <h5 class="text-primary mb-2">
                Cari event yang ramah untuk <strong>Disabilitas?</strong> Temukan
                hanya di <strong>TemuInklusi</strong>
            </h5>
            <div class="mt-5 mb-4">
                <img class="w-75" src="{{ asset('assets/img/hero.svg') }}" style="max-width: 25.5rem" />
            </div>
        </div>
    </div>

    <div class="container-lg px-4 px-lg-3">
        <section>
            <h5 class="text-center text-primary my-5">
                Kenapa TemuInklusi?
            </h5>

            {{-- Benefit Card --}}
            <div class="row gap-3 gap-md-4 justify-content-center">
                <x-benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
                <x-benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
                <x-benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
            </div>
        </section>

        <section class="mb-5">
            <h5 class="text-center text-primary my-5">
                Event Pilihan
            </h5>

            {{-- Event Card --}}
            <div class="row px-md-0 justify-content-center gap-3 gap-md-4">
                <div class="card col-12 col-md p-0">
                    <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="event banner">
                    <div class="card-body px-3">
                        <h6 class="card-title text-primary">Power of Words</h6>
                        <p style="color: black; font-size: 12px">8 Agustus 2024</p>
                    </div>
                </div>

                <div class="card col-12 col-md p-0">
                    <a class="text-decoration-none" href="#">
                        <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="event banner">
                        <div class="card-body px-3">
                            <h6 class="card-title text-primary">Power of Words</h6>
                            <p style="color: black; font-size: 12px">8 Agustus 2024</p>
                        </div>
                    </a>
                </div>

                <div class="card col-12 col-md p-0">
                    <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="event banner">
                    <div class="card-body px-3">
                        <h6 class="card-title text-primary">Power of Words</h6>
                        <p style="color: black; font-size: 12px">8 Agustus 2024</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-flex flex-row justify-content-between px-4 p-5 rounded-4" style="background-color: #01676C;">
            <div class=" align-self-center">
                <h5 style="color: #ffffff">
                    Yuk upload event di TemuInklusi!
                </h5>
                <p style="color: #ffffff">organize@TemuInklusi.com</p>
            </div>
            <div>
                <img src="{{ asset('assets/img/asd.svg') }}" class="img-fluid" style="max-width: 15rem;" />
            </div>
        </section>
    </div>
@endsection
