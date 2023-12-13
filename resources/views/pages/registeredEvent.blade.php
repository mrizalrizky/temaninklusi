@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="row mt-5 gx-4 gx-lg-5 align-items-end">
            <div class="col-5 col-lg-4 col-xl-3">
                <h4 class="text-center m-b-custom-2">Dashboard</h4>
            </div>
            <div class="col-7">
                <h4 class="text-left">Edit Profile</h4>
                <h5 class="text-left m-b-custom-2 fw-normal">Masukan informasi yang valid</h5>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-5 col-lg-4 col-xl-3">
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
                            <li class="p-2 {{ Request::is('profile/events')  ? 'bg-white p-2 rounded-3' : '' }}">
                                <a href="{{ route('profile.events') }}" class="d-flex align-items-center gap-3 text-primary">
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
            </div>
            <div class="col-7">
                <div class="d-flex gap-2 flex-column align-items-start justify-content-center rounded-4 p-4"
                    style="background-color: var(--secondary-color)">
                    <div class="mb-3 d-flex gap-3 align-items-center ms-4">
                        <img class="rounded-4 img-fluid mb-2" src="assets/profile/profile-picture.png" alt=""
                            style="max-width: 3rem">
                        <div class="d-flex flex-column gap-1">
                            <h6 class="m-0">{{ Auth::user()->name }}</h6>
                            <small style="font-size: .8rem" class="text-primary">{{ Auth::user()->role->type }}</small>
                        </div>
                    </div>
                    <h5 class="mb-0">Infomasi Pribadi</h5>
                    <div class="px-4 pt-1 pb-1 mb-4 d-flex w-100">
                        <form action="{{ route('profile.update') }}" class="w-100" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name" class="text-primary mb-2 profile-label">Name</label>
                                <input type="text" class="form-control py-2 @error('name') is-invalid @enderror"
                                    id="name" aria-describedby="name" name="name"
                                    value="{{ old('name') ?? Auth::user()->name }}" placeholder="Jane Doe">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="username" class="text-primary mb-2 profile-label">Username</label>
                                <input type="text" class="form-control py-2 @error('username') is-invalid @enderror"
                                    id="username" aria-describedby="username" name="username"
                                    value="{{ old('username') ?? Auth::user()->username }}" placeholder="Jane Doe">

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="text-primary mb-2 profile-label">Email Address</label>
                                <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                    id="email" aria-describedby="email" name="email"
                                    value="{{ old('email') ?? Auth::user()->email }}" placeholder="Jane Doe">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="oldPassword" class="text-primary mb-2 profile-label">Old Password</label>
                                <input type="password"
                                    class="form-control py-2 @error('oldPassword') is-invalid @enderror" id="oldPassword"
                                    aria-describedby="oldPassword" name="oldPassword" placeholder="●●●●●●●●">

                                @error('oldPassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="newPassword" class="text-primary mb-2 profile-label">New Password</label>
                                <input type="password"
                                    class="form-control py-2 @error('newPassword') is-invalid @enderror" id="newPassword"
                                    aria-describedby="newPassword" name="newPassword" placeholder="●●●●●●●●">

                                @error('newPassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="password_confirmation" class="text-primary mb-2 profile-label">Confirmation
                                    Password</label>
                                <input type="password"
                                    class="form-control py-2 @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" aria-describedby="password_confirmation"
                                    name="password_confirmation" placeholder="●●●●●●●●">

                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-start mt-4">
                                <button class="btn btn-primary text-bg-primary mt-1 rounded-3 ms-2 px-4"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
