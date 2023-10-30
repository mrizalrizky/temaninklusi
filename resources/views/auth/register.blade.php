@extends('layouts.app')
@section('content')
    <div class="container-md px-4 mt-5 d-flex justify-content-center">
        <div class="w-100" style="max-width: 920px;">
            <div class="m-b-custom-2">
                <h4 class="text-primary">Buat akun baru</h4>
                <p class="text-primary">Masukan kredensial pada form</p>
            </div>
            <div class="row g-7 justify-content-center justify-content-md-between">
                <div class="col-12 col-sm-10 col-md-7">
                    <form enctype="multipart/form-data" action="{{ route('register') }}"" method="POST"
                        class="border rounded-4 p-4 p-x-custom-2">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="text-primary fw-bold mb-2">Bagaimana Anda mengidentifikasi diri Anda?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input py-2" type="radio" name="user_type" id="regular_user" checked/>
                                <label for="regular_user" class="form-check-label text-primary fw-bold mb-2">Pengguna Reguler</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input py-2" type="radio" name="user_type" id="event_organizer"/>
                                <label for="event_organizer" class="form-check-label text-primary fw-bold mb-2">Event Organizer</label>
                            </div>
                        </div>
                        {{-- <div class="form-group mb-4">
                            <label for="exampleInputNama1" class="text-primary fw-bold mb-2">Name</label>
                            <input type="text" class="form-control py-2 @error('name') is-invalid @enderror"
                                id="exampleInputNama1" aria-describedby="usernameHelp" name="name"
                                value="{{ old('name') }}" placeholder="Jane Doe">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <x-form.base-form-input title="Nama" type="text" value="{{ old('name') }}" placeholder="Jane Doe" name="name" :label="true">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input title="Username" type="text" value="{{ old('username') }}"  placeholder="Janedoe" name="username" :label="true">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input title="Alamat email" type="email" value="{{ old('email') }}" placeholder="Janedoe@gmail.com" name="email" :label="true">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input title="Password" type="password" name="password" :label="true" placeholder="●●●●●●●●">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input title="Konfirmasi Password" type="password" name="password_confirmation" :label="true" placeholder="●●●●●●●●">
                            @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                Konfirmasi password tidak cocok.
                            </div>
                            @endif
                        </x-form.base-form-input>

                        <div class="px-4">
                            <button type="submit" class="btn btn-primary w-100 rounded-4">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="col-5 d-flex align-items-center d-none d-md-flex">
                    <div class="d-flex justify-content-center">
                        <img src="assets/authentication/auth.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
