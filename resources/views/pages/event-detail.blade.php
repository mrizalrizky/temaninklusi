@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div id="carouselFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($event->eventFiles as $eventBanner)
            <div style="height: 27.5rem;" class="carousel-item active w-100 overflow-hidden border-0 rounded-4 my-5">
                <img src="{{ $eventBanner->files['file_path']}}" class="w-100 h-100 object-fit-cover border-0 rounded" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="d-md-flex justify-content-between">
        <div class="text-center text-md-start">
            <p style="font-size: 0.85rem">{{ $event->eventDetails['start_date']->format('d M Y') }}</p>
            <h3>{{ $event->eventDetails['title'] }}</h3>
        </div>
        <x-event-detail-box :event="$event"/>
    </div>
</div>
@endsection
