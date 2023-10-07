@extends('layouts.app')
@section('content')
    <div class="container-lg">
        <div class="row justify-content-center my-5">
            <div class="col-9 col-sm-7 col-md-5 col-lg-4 p-4 rounded-3 d-flex flex-column form-sign-in">
                <form enctype="multipart/form-data" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h4 class="mt-3 mb-4 fw-semibold text-center">Login</h4>

                    @error('failed')
                        <div class="alert alert-danger d-flex alert-dismissible fade show">
                            <i data-feather="alert-triangle"style="margin-right: 0.5em; width: 1.5em"></i>
                            {{ $message }}
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                                aria-label="close"></button>
                        </div>
                    @enderror

                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control rounded-3 @error('email') is-invalid @enderror" id="floatingInput"
                            placeholder="Email" autofocus value="{{ Cookie::get('emailCookie') !== null ? Cookie::get('emailCookie') : old('email') }}">
                        <label for="floatingInput">Email address</label>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-3 password @error('password') is-invalid @enderror"
                            id="floatingPassword" placeholder="Password" value="{{ Cookie::get('passwordCookie') !== null ? Cookie::get('passwordCookie') : "" }}">
                        <label for="floatingPassword">Password</label>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between remember-forgot">
                        <div class="checkbox mb-3">
                            <div class="remember-me d-flex">
                                <input class="me-1" name="remember" type="checkbox" @if(Cookie::get('passwordCookie') !== null && Cookie::get('emailCookie') !== null) checked @endif>
                                <label>Remember me</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-center">
                        <button type="submit" class="w-75 btn btn-primary mt-5 rounded-3">Login</a>
                    </div>

                    <div class="mt-1 mb-3 to-register text-center">
                        <label>Not register Yet?</label>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
