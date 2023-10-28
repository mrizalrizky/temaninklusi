@extends('layouts.app')
@section('content')
    <div class="container-md px-4 mt-5 d-flex justify-content-center">
        <div class="w-100" style="max-width: 920px;">
            <div class="m-b-custom-2">
                <h4 class="text-primary">Buat akun baru</h4>
                <p class="text-primary">Masukan kredensial pada form</p>
            </div>
            <div class="row g-7 justify-content-center justify-content-md-between">
                <div class="col-12 col-sm-10 col-md-7 col-lg-6">
                    <form enctype="multipart/form-data" action="/register" method="POST"
                          class="border rounded-4 p-4 p-x-custom-2">
                    @csrf
                        <div class="form-group mb-4">
                            <label for="name" class="text-primary fw-bold mb-2">Name</label>
                            <input type="text" class="form-control py-2 @error('full_name') is-invalid @enderror" name="full_name" id="full_name" aria-describedby="emailHelp" placeholder="Enter name">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="username" class="text-primary fw-bold mb-2">Username</label>
                            <input type="text" class="form-control py-2 @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="emailHelp"
                                placeholder="Enter username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="text-primary fw-bold mb-2">Email address</label>
                            <input type="email" class="form-control py-2 @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp"
                                placeholder="Enter email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="text-primary fw-bold mb-2">Password</label>
                            <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="confirm_password" class="text-primary fw-bold mb-2">Confirm Password</label>
                            <input type="password" class="form-control py-2" name="password_confirmation" id="password-confirm" placeholder="Password">
                        </div>
                        <div class="m-b-custom-2">
                            <a href="/sign-up" class="text-decoration-none"><small class="text-primary" style="font-size: .8rem">Terms & Conditions</small></a>
                        </div>
                        <div class="px-4">
                            <button type="submit" class="btn btn-primary w-100 rounded-4">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="col-5 col-lg-6 d-flex align-items-start d-none d-md-flex">
                    <div class="d-flex justify-content-center align-self-center">
                        <img src="assets/authentication/auth.png" class="img-fluid" alt="Auth Banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
