@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="bg-primary">
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

    {{-- Benefit Card Section --}}
    <div class="container-lg px-4 px-lg-3">
        <section>
            <h5 class="text-center text-primary my-5">
                Kenapa TemuInklusi?
            </h5>

            <div class="row gap-3 gap-md-4 justify-content-center">
                <x-benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
                <x-benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
                <x-benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
            </div>
        </section>

        {{-- Event Card Section --}}
        <section class="mb-5">
            <h5 class="text-center text-primary my-5">
                Event Pilihan
            </h5>

            <div class="row px-md-0 justify-content-center gap-3 gap-md-4">
            @foreach ($events as $event)
                <div class="card col-12 col-md p-0">
                    <a href="{{ $event->eventDetails['slug'] }}">
                        <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="event banner">
                        <div class="card-body px-3">
                            <h6 class="card-title text-primary">{{ $event->eventDetails['title']}}</h6>
                            <p class="text-dark" style="font-size: 12px">{{ $event->eventDetails['start_date']->format('d M Y') }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </section>

        <section class="d-flex flex-row justify-content-between px-4 p-5 rounded-4" style="background-color: #01676C;">
            <div class=" align-self-center">
                <h5 class="text-white">
                    Yuk upload event di TemuInklusi!
                </h5>
                <p class="text-white">organize@TemuInklusi.com</p>
            </div>
            <div>
                <img src="{{ asset('assets/img/asd.svg') }}" class="img-fluid" style="max-width: 15rem;" />
            </div>
        </section>
    </div>
@endsection
