@extends('layouts.app')

@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="row mt-5 gx-4 gx-lg-5 align-items-end">
            <div class="col-5 col-lg-4 col-xl-3">
                <h4 class="text-md-center m-b-custom-2">Dashboard</h4>
            </div>
            <div class="col-7 d-none d-md-block">
                <h4 class="text-left">Edit Profil</h4>
                <h5 class="text-left m-b-custom-2 fw-normal">Masukan informasi yang valid</h5>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 gap-4 gap-md-0">
            @include('pages.profile.includes.profile-sidebar', $user)
            <div class="col-12 col-md">
                <div class="d-flex gap-2 flex-column align-items-start justify-content-center border border-1 rounded-4 p-4">
                    <div class="mb-3 d-flex gap-3 align-items-center ms-4">
                        <x-icon.profile-icon height="3rem" />
                        <div class="d-flex flex-column gap-1">
                            <h6 class="m-0">{{ $user->name }}</h6>
                            <small style="font-size: .8rem" class="text-primary">{{ $user->role->type }}</small>
                        </div>
                    </div>
                    <h5 class="mb-0">Informasi Pribadi</h5>
                    <div class="px-4 pt-1 pb-1 mb-4 d-flex w-100">
                        <form action="{{ route('profile.validate') }}" class="w-100" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name" class="text-primary mb-2 profile-label">Nama</label>
                                <input type="text" class="form-control py-2 @error('name') is-invalid @enderror"
                                    id="name" aria-describedby="name" name="name"
                                    value="{{ session()->get('profileModal') ? session()->get('profileModal')['name'] : old('name') ?? $user->name }}" placeholder="Jane Doe">

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
                                    value="{{ session()->get('profileModal') ? session()->get('profileModal')['username'] : old('username') ?? $user->username }}" placeholder="Jane Doe">

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="email" class="text-primary mb-2 profile-label">Alamat Email</label>
                                <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                    id="email" aria-describedby="email" name="email"
                                    value="{{ old('email') ?? $user->email }}" placeholder="{{ $user->email }}" disabled>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="phone_number" class="text-primary mb-2 profile-label">
                                    Nomor TeleponPribadi
                                </label>
                                <input type="text" class="form-control py-2 @error('phone_number') is-invalid @enderror"
                                    id="phone_number" aria-describedby="phone_number" name="phone_number"
                                    value="{{ old('phone_number') ?? $user->phone_number }}"
                                    placeholder="{{ $user->phone_number }}" disabled>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @if ($user->isEO())
                                <div class="form-group mb-2">
                                    <label for="organizer_name" class="text-primary mb-2 profile-label">Nama Perusahaan atau
                                        Organisasi</label>
                                    <input type="text"
                                        class="form-control py-2 @error('organizer_name') is-invalid @enderror"
                                        id="organizer_name" aria-describedby="organizer_name" name="organizer_name"
                                        value="{{ old('organizer_name') ?? $user->organizer->name }}"
                                        placeholder="{{ $user->organizer->name }}" disabled>
                                    @error('organizer_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="organizer_contact_name" class="text-primary mb-2 profile-label">Nama Kontak
                                        Perusahaan atau Organisasi</label>
                                    <input type="text"
                                        class="form-control py-2 @error('organizer_contact_name') is-invalid @enderror"
                                        id="organizer_contact_name" aria-describedby="organizer_contact_name"
                                        name="organizer_contact_name"
                                        value="{{ old('organizer_contact_name') ?? $user->organizer->contact_name }}"
                                        placeholder="{{ $user->organizer->contact_name }}" disabled>
                                    @error('organizer_contact_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="organizer_address" class="text-primary mb-2 profile-label">Alamat Perusahaan
                                        atau Organisasi</label>
                                    <input type="text"
                                        class="form-control py-2 @error('organizer_address') is-invalid @enderror"
                                        id="organizer_address" aria-describedby="organizer_address" name="organizer_address"
                                        value="{{ old('organizer_address') ?? $user->organizer->address }}"
                                        placeholder="{{ $user->organizer->address }}" disabled>

                                    @error('organizer_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="organizer_contact_email" class="text-primary mb-2 profile-label">Alamat
                                        Email Perusahaan atau Organisasi</label>
                                    <input type="text"
                                        class="form-control py-2 @error('organizer_contact_email') is-invalid @enderror"
                                        id="organizer_contact_email" aria-describedby="organizer_contact_email"
                                        name="organizer_contact_email"
                                        value="{{ old('organizer_contact_email') ?? $user->organizer->contact_email }}"
                                        placeholder="{{ $user->organizer->contact_email }}" disabled>

                                    @error('organizer_contact_email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="organizer_contact_phone" class="text-primary mb-2 profile-label">No. Telp
                                        Perusahaan atau Organisasi</label>
                                    <input type="text"
                                        class="form-control py-2 @error('organizer_contact_phone') is-invalid @enderror"
                                        id="organizer_contact_phone" aria-describedby="organizer_contact_phone"
                                        name="organizer_contact_phone"
                                        value="{{ old('organizer_contact_phone') ?? $user->organizer->contact_phone }}"
                                        placeholder="{{ $user->organizer->contact_phone }}" disabled>

                                    @error('organizer_contact_phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group mb-2">
                                <label for="oldPassword" class="text-primary mb-2 profile-label">Kata Sandi Lama</label>
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
                                <label for="newPassword" class="text-primary mb-2 profile-label">Kata Sandi Baru</label>
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
                                <label for="password_confirmation" class="text-primary mb-2 profile-label">
                                    Konfirmasi Kata Sandi Baru
                                </label>
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
                                <button class="btn btn-primary text-bg-primary mt-1 rounded-custom ms-2 px-4"
                                    type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <x-dialog.base-dialog id="profileModal" action="{{ route('profile.update') }}"
            title="Yakin akan edit profil?">
            @if (session()->has('profileModal'))
                @foreach (session()->get('profileModal') as $key => $value)
                    <input name="{{ $key }}" value="{{ $value }}" type="hidden" />
                @endforeach
            @endif
        </x-dialog.base-dialog>

        @if (session()->has('profileModal'))
            @push('after-script')
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const popupModal = document.getElementById('profileModal')
                        popupModal.style.display = 'block'
                        popupModal.classList.add('show')
                        const modalBackdrop = document.createElement('div')
                        modalBackdrop.setAttribute('id', 'modal_backdrop')
                        modalBackdrop.className = 'modal-backdrop fade show'
                        document.body.appendChild(modalBackdrop)
                    });
                </script>
            @endpush
        @endif

    </div>
@endsection
