@extends('layouts.util')
@section('content')
    <div class="screen justify-content-start">
        <main class="mb-5 p-2" style="max-width: 1920px;">
            <div class="container-md px-4 mt-5 d-flex justify-content-center">
                <div class="w-100" style="max-width: 920px;">
                    <div class="mb-3">
                        <h4 class="text-primary text-center">TemuInklusi</h4>
                        <p class="text-primary text-center">Update password</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-7">
                            <form enctype="multipart/form-data" action="{{ route('update.password') }}" method="POST"
                                class="border rounded-3 p-4 p-x-custom-2">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="resetToken" value="{{ $resetToken }}">
                                <x-form.base-form-input title="Password" type="password" name="password" :label="true"
                                    placeholder="●●●●●●●●">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </x-form.base-form-input>

                                <x-form.base-form-input title="Konfirmasi Password" type="password"
                                    name="password_confirmation" :label="true" placeholder="●●●●●●●●">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            Konfirmasi password tidak cocok.
                                        </div>
                                    @endif
                                </x-form.base-form-input>
                                <div class="m-t-custom-2">
                                    <button type="submit" class="btn btn-primary w-100 rounded-2">Ganti Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
