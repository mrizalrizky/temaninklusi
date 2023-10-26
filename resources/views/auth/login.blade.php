@extends('layouts.app')
@section('content')
    <div class="container-md px-4 mt-5 d-flex justify-content-center">
        <div class="w-100" style="max-width: 920px;">
            <div class="m-b-custom-2">
                <h4 class="text-primary">Masuk ke akun kamu</h4>
                <p class="text-primary">Masukan kredensial pada form</p>
            </div>
            <div class="row g-7 justify-content-center justify-content-md-between">
                <div class="col-12 col-sm-10 col-md-7 col-lg-6">
                    <form enctype="multipart/form-data" action="{{ route('login') }}" method="POST"
                        class="border rounded-4 p-4 p-x-custom-2">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1" class="text-primary fw-bold mb-2">Email address</label>
                            <input type="email" class="form-control py-2" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1" class="text-primary fw-bold mb-2">Password</label>
                            <input type="password" class="form-control py-2" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="text-end mb-5">
                            <a href="/sign-up" class="text-decoration-none"><small class="text-primary"
                                    style="font-size: .8rem">Lupa Password?</small></a>
                        </div>
                        <div class="px-4 m-b-custom-2">
                            <button type="submit" class="btn btn-primary w-100 rounded-4">Login</button>
                        </div>
                        <div class="px-4 text-center">
                            <a href="{{ route('register') }}" class="text-decoration-none text-primary"><small
                                    style="font-size: .8rem">Belum punya akun?, Yuk <b>daftar</b> dulu</small></a>
                        </div>
                    </form>
                </div>
                <div class="col-5 col-lg-6 d-flex align-items-start d-none d-md-flex">
                    <div class="d-flex justify-content-center">
                        <img src="assets/authentication/auth.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
