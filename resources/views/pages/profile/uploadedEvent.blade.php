@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="row mt-5 gx-4 gx-lg-5 align-items-end">
            <div class="col-5 col-lg-4 col-xl-3">
                <h4 class="text-center m-b-custom-2">Dashboard</h4>
            </div>
            <div class="col-7 col-md">
                <h4 class="text-left">Uploaded Event</h4>
                <h5 class="text-left m-b-custom-2 fw-normal">Daftar event yang sudah kamu upload</h5>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5">
            @include('pages.profile.profile-sidebar')
            <div class="col-7 col-md d-flex flex-column">
                <div class="row align-items mb-5" style="min-height: 25rem">
                    @foreach ($events as $event)
                    <div class="row align-items-center rounded-4 px-2 pb-5">
                        <div class="col gx-4 gt-0" style="max-width: 10rem; max-height: 10rem">
                            <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721"
                                class="w-100 h-100 object-fit-cover border-0 rounded-4" alt="Blog banner">
                        </div>
                        <div class="col">
                            <p class="text-primary mb-1"><small style="font-size: .8rem">Lifestyle</small></p>
                            <h5 class="fw-bold">{{ $event->eventDetail->title }}</h5>
                            <p style="font-size: .9rem" class="mb-0">{{ 'sdjf' }}</p>
                            <p style="font-size: .9rem"><small class="smaller text-secondary">{{ $event->eventDetail->start_date->format('d M Y') }}</small></p>
                            <a class="text-primary fw-bold" style="font-size: 0.75rem" href="{{ route('event.details', $event->eventDetail->slug) }}">
                                Detail Event
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-4"></div>
                    <div class="d-flex justify-content-center mt-auto">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
