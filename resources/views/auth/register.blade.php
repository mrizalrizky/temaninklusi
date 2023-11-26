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
                    <form enctype="multipart/form-data" action="{{ route('register') }}" method="POST"
                        class="border rounded-4 p-4 p-x-custom-2">
                        @csrf

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

                        <div class="form-group mb-4">
                            <label for="user_type" class="text-primary fw-bold mb-2">Bagaimana Anda mengidentifikasi diri Anda?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input py-2" type="radio" name="user_type" value="4" id="regular_user" onchange="getUserType()" checked/>
                                <label for="regular_user" class="form-check-label text-primary fw-bold mb-2 @error('user_type') is-invalid @enderror">Pengguna Reguler</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input py-2" type="radio" name="user_type" value="{{ App\Constants\RoleConstant::EVENT_ORGANIZER }}" id="event_organizer" onchange="getUserType()"/>
                                <label for="event_organizer" class="form-check-label text-primary fw-bold mb-2 @error('user_type') is-invalid @enderror">
                                    Event Organizer
                                </label>
                            </div>
                            @error('user_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <x-form.base-form-input title="Nama Perusahaan" class="d-none" type="text" name="organizer_name" id="organizer_name" :label="true">
                        {{-- <x-form.base-form-input title="Nama Perusahaan" type="text" name="organizer_name" id="organizer_name" :label="true" :hidden="true"> --}}
                            @error('organizer_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

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

@push('after-script')
<script>
    const getUserType = () => {
        const getClickedRadio = event.target.id === 'event_organizer';
        const organizerNameEl = document.getElementById('organizer_name');
        getClickedRadio ? organizerNameEl.classList.remove('d-none') : organizerNameEl.classList.add('d-none')
    }
</script>

@endpush
