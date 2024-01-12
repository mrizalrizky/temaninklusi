@extends('layouts.app')
@section('content')
    <div class="container-md px-4 mt-5 d-flex justify-content-center">
        <div class="w-100" style="max-width: 920px;">
            <div class="m-b-custom-2">
                <h4 class="text-primary">Lupa password?</h4>
                <p class="text-primary">Jangan khawatir, kami akan mengirimkan panduan reset</p>
            </div>
            <div class="row g-7 justify-content-center justify-content-md-between">
                <div class="col-12 col-sm-10 col-md-7 d-flex align-items-center">
                    <form enctype="multipart/form-data" action="{{ route('generate.forgot-password') }}" method="POST"
                        class="border rounded-4 p-4 p-x-custom-2 w-100">
                        @csrf
                        @if (session()->has('failed'))
                            <div class="alert alert-danger d-flex alert-dismissible fade show">
                                <i data-feather="alert-triangle"style="margin-right: 0.5em; width: 1.2em"></i>
                                <p class="m-0">{{ session()->get('failed') }}</p>
                                <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
                                    data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        @enderror

                        <x-form.base-form-input class="mb-4" title="Email Address" type="email" value="{{ old('email') }}" name="email" :label="true" placeholder="Janedoe@gmail.com">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <div class="px-4 m-b-custom-2">
                            <button type="submit" class="btn btn-primary w-100 rounded-4">Kirim</button>
                        </div>

                </form>
            </div>
            <div class="col-5 d-flex align-items-center d-none d-md-flex">
                <div class="d-flex justify-content-center">
                    <img src="assets/authentication/forgot-password.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
