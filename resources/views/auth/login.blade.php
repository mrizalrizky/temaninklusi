@extends('layouts.app')
@section('content')
    <div class="container-md px-4 mt-5 d-flex justify-content-center">
        <div class="w-100" style="max-width: 920px;">
            <div class="m-b-custom-2">
                <h4 class="text-primary">Masuk ke akun kamu</h4>
                <p class="text-primary">Masukan kredensial pada form</p>
            </div>
            <div class="row g-7 justify-content-center justify-content-md-between">
                <div class="col-12 col-sm-10 col-md-7">
                    <form enctype="multipart/form-data" action="{{ route('login') }}" method="POST"
                        class="border rounded-4 p-4 p-x-custom-2">
                        @csrf
                        @if (session()->has('failed'))
                            <div class="alert alert-danger d-flex alert-dismissible fade show">
                                <i data-feather="alert-triangle"style="margin-right: 0.5em; width: 1.2em"></i>
                                <p class="m-0">{{ session()->get('failed') }}</p>
                                <button type="button" class="btn-close ms-auto" style="width: 1.2em !important" data-bs-dismiss="alert"
                                    aria-label="close"></button>
                            </div>
                        @enderror
                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1" class="text-primary fw-bold mb-2">Email address</label>
                            <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" name="email" aria-describedby="emailHelp"
                                value="{{ old('email') }}" placeholder="Janedoe@gmail.com">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1"
                                class="text-primary fw-bold mb-2 @error('password') is-invalid @enderror">Password</label>
                            <input type="password" class="form-control py-2" id="exampleInputPassword1" name="password"
                                placeholder="●●●●●●●●">
                        </div>
                        <div class="text-end mb-5">
                            <a href="/sign-up" class="text-decoration-none"><small class="text-primary">Lupa
                                    Password?</small></a>
                        </div>
                        <div class="px-4 m-b-custom-2">
                            <button type="submit" class="btn btn-primary w-100 rounded-4">Login</button>
                        </div>
                        <div class="px-4 text-center">
                            <a href="/register" class="text-decoration-none text-primary"><small>Belum punya akun?, Yuk
                                    <b>daftar</b> dulu</small></a>
                        </div>
                </form>
            </div>
            <div class="col-5 d-flex align-items-start d-none d-md-flex">
                <div class="d-flex justify-content-center">
                    <img src="assets/authentication/auth.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
