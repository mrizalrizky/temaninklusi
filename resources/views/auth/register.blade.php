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
                            <label for="exampleInputNama1" class="text-primary fw-bold mb-2">Name</label>
                            <input type="text" class="form-control py-2 @error('name') is-invalid @enderror"
                                id="exampleInputNama1" aria-describedby="usernameHelp" name="name"
                                value="{{ old('name') }}" placeholder="Jane Doe">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputUsernname1" class="text-primary fw-bold mb-2">Username</label>
                            <input type="text" class="form-control py-2 @error('username') is-invalid @enderror"
                                id="exampleInputUsernname1" aria-describedby="usernameHelp" name="username"
                                value="{{ old('username') }}" placeholder="Janedoe">

                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1" class="text-primary fw-bold mb-2">Email address</label>
                            <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                value="{{ old('email') }}" placeholder="Janedoe@gmail.com">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1" class="text-primary fw-bold mb-2">Password</label>
                            <input type="password" class="form-control py-2 @error('password') is-invalid @enderror"
                                id="exampleInputPassword1" name="password" placeholder="●●●●●●●●">

                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputConfirmPassword1" class="text-primary fw-bold mb-2 @error('password_confirmation') is-invalid @enderror">Confirmation
                                Password</label>
                            <input type="password"
                                class="form-control py-2"
                                id="exampleInputConfirmPassword1" name="password_confirmation" placeholder="●●●●●●●●">

                                @if ($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    Confirmation password tidak cocok.
                                </div>
                                @endif
                        </div>

                        <div class="mb-2">
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
