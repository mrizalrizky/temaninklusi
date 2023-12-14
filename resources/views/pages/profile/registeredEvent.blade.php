@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="row mt-5 gx-4 gx-lg-5 align-items-end">
            <div class="col-5 col-lg-4 col-xl-3">
                <h4 class="text-center m-b-custom-2">Dashboard</h4>
            </div>
            <div class="col-7 col-md">
                <h4 class="text-left">Registered Event</h4>
                <h5 class="text-left m-b-custom-2 fw-normal">Daftar event yang sudah kamu daftar</h5>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5">
            @include('pages.profile.profile-sidebar')
            {{-- <div class="col-5 col-lg-4 col-xl-3">
                <div class="d-flex gap-2 flex-column align-items-center justify-content-center rounded-4 p-4"
                    style="background-color: var(--secondary-color)">
                    <div class="mb-3 d-flex gap-2 flex-column align-items-center">
                        <img class="rounded-4 img-fluid mb-2" src="assets/profile/profile-picture.png" alt=""
                            style="max-width: 3rem">
                        <h6 class="m-0">{{ Auth::user()->name }}</h6>
                        <small style="font-size: .8rem" class="text-primary">{{ Auth::user()->role->type }}</small>
                    </div>
                    <div class="px-4 py-2 mb-4">
                        <ul style="list-style-type: none" class="row gap-3 p-0">
                            <li class="p-2 {{ Request::is('profile') ? 'bg-white p-2 rounded-3' : '' }}">
                                <a href="{{ route('profile.index') }}" class="d-flex align-items-center gap-3 text-primary">
                                    <div style="width: 1.5rem" class="d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        </svg>
                                    </div>

                                    <small>Profile</small>
                                </a>
                            </li>
                            <li class="p-2 {{ Request::is('profile/events') ? 'bg-white p-2 rounded-3' : '' }}">
                                <a href="{{ route('profile.events') }}"
                                    class="d-flex align-items-center gap-3 text-primary">
                                    <div style="width: 1.5rem" class="d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </div>

                                    <small>Events</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-no-style text-danger">
                            Logout?
                        </button>
                    </form>
                </div>
            </div> --}}
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
