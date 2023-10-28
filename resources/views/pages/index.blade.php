@extends('layouts.app')

@section('content')
    <div class="bg-primary">
        <div class="container-lg text-center pt-4 pb-4">
            <h3 class="text-primary mb-2">
                Cari event yang ramah untuk <strong>Disabilitas?</strong> Temukan
                hanya di <strong>{{ config('app.name') }}</strong>
            </h3>
            <div class="mt-5 mb-4">
                <img class="w-75" src="{{ asset('assets/img/hero.svg') }}" style="max-width: 25.5rem" />
            </div>
        </div>
    </div>

    {{-- Benefit Card Section --}}
    <div class="container-lg px-4 px-lg-3">
        <section>
            <h4 class="text-primary text-center my-5">
                Kenapa {{ config('app.name') }}?
            </h4>

            {{-- Benefit Card --}}
            <div class="row g-3 g-md-4 justify-content-center">
                <x-card.benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
                <x-card.benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
                <x-card.benefit-card title="Aksesibilitas"
                    description="Discover sustainable options effortlessly. Our platform offers convenient access to sustainable options all in one place." />
            </div>
        </section>

        {{-- Event Card Section --}}
        <section class="mb-5">
            <h4 class="text-primary text-center my-5">
                Event Pilihan
            </h4>

            {{-- Event Card --}}
            @if($events)
            <div class="row px-md-0 justify-content-center g-3 g-md-4">
            {{-- <div class="row px-md-0 justify-content-center g-3 g-md-4 owl-carousel owl-theme"> --}}
                @foreach ($events as $event)
                    <x-card.event-card :event="$event"/>
                @endforeach
            </div>
            @endif
        </section>

        <section class="d-flex flex-row justify-content-between px-4 p-5 rounded-4" style="background-color: #01676C;">
            <div class=" align-self-center">
                <h4 class="text-white">
                    Yuk upload event di {{ config('app.name') }}!
                </h4>
                <p class="text-white">organize@TemuInklusi.com</p>
            </div>
            <div class="d-none d-md-flex">
                <img src="{{ asset('assets/img/asd.svg') }}" class="img-fluid" style="max-width: 15rem;" />
            </div>
        </section>
    </div>
@endsection
