@extends('layouts.app')

@section('content')
    <div class="bg-primary-2">
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
            <h3 class="text-primary text-center my-4 py-3">
                Kenapa {{ config('app.name') }}?
            </h3>

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
            <h3 class="text-primary text-center my-4 py-3">
                Event Pilihan
            </h3>

            {{-- Event Card --}}
            @if($events)
            <div class="row px-md-0 justify-content-center g-3 g-md-4">
                @foreach ($events as $event)
                    <x-card.event-card :event="$event"/>
                @endforeach
            </div>
            @endif
        </section>


        <x-banner title="Yuk upload event di {{ config('app.name') }}!" image="{{ asset('assets/img/asd.svg') }}"/>
    </div>
@endsection
