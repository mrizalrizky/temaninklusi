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
                    <form id="form_container" enctype="multipart/form-data" action="{{ route('register') }}" method="POST"
                        class="border rounded-4 p-4 p-x-custom-2">
                        @csrf
                        <div id="roles" class="form-group mb-4">
                            <label for="user_type" class="text-primary fw-bold mb-2">Bagaimana Anda mengidentifikasi diri Anda?</label>
                            <div class="d-block">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input py-2" type="radio" name="user_type" value="2" id="regular_user" onchange="displayNewField()" {!! old('user_type') ? old('user_type') == 2 ? 'checked': '' : 'checked' !!}/>
                                <label for="regular_user" class="form-check-label text-primary fw-bold mb-2 @error('user_type') is-invalid @enderror">Pengguna Reguler</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input py-2" type="radio" name="user_type" value="3" id="event_organizer" onchange="displayNewField()" {!! old('user_type') == 3 ? 'checked': '' !!}/>
                                <label for="event_organizer" class="form-check-label text-primary fw-bold mb-2 @error('user_type') is-invalid @enderror">
                                    Event Organizer
                                </label>
                            </div>
                            </div>
                            @if($errors->has('user_type'))
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <x-form.base-form-input class="mb-4" title="Nama" type="text" value="{{ old('name') }}" placeholder="Jane Doe" name="name" :label="true">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input class="mb-4" title="Username" type="text" value="{{ old('username') }}"  placeholder="Janedoe" name="username" :label="true">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input class="mb-4" title="Alamat email" type="email" value="{{ old('email') }}" placeholder="Janedoe@gmail.com" name="email" :label="true">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>


                        <x-form.base-form-input class="mb-4" title="Password" type="password" name="password" :label="true" placeholder="●●●●●●●●">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input class="mb-4" title="Konfirmasi Password" type="password" name="password_confirmation" :label="true" placeholder="●●●●●●●●">
                            @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                Konfirmasi password tidak cocok.
                            </div>
                            @endif
                        </x-form.base-form-input>

                        <div id="organizer" style="{{ old('user_type') != 3 ? 'display: none': '' }}">
                        <x-form.base-form-input class="mb-4" title="Nama Perusahaan atau Organisasi" type="text" value="{{ old('organizer_name') }}"
                            placeholder="Nama Perusahaan atau Organisasi" name="organizer_name" :label="true">
                            @error('organizer_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input class="mb-4" title="Alamat Perusahaan atau Organisasi" type="text" value="{{ old('organizer_address') }}"
                            placeholder="Alamat Perusahaan atau Organisasi" name="organizer_address" :label="true">
                            @error('organizer_address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input class="mb-4" title="Nama Kontak Perusahaan atau Organisasi" type="text" value="{{ old('organizer_contact_name') }}"
                            placeholder="Nama Kontak Perusahaan atau Organisasi" name="organizer_contact_name" :label="true">
                            @error('organizer_contact_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>

                        <x-form.base-form-input class="mb-4" title="No. Telp Perusahaan atau Organisasi" type="text" value="{{ old('organizer_contact_phone') }}"
                            placeholder="No. Telp Perusahaan atau Organisasi" name="organizer_contact_phone" :label="true">
                            @error('organizer_contact_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </x-form.base-form-input>
                        </div>

                        <div class="px-4" id="">
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
        const displayNewField = () => {
            const getClickedRadio = event.target.id === 'event_organizer';
            const divStyle = document.getElementById('organizer')
            getClickedRadio ? divStyle.style.display = 'inline-block' : divStyle.style.display = 'none'
            // console.log('Test')
            // const formEl = document.getElementById('form_container')
            // const fieldsToAdd = [
            //     {
            //         title: 'Nama Perusahaan atau Organisasi',
            //         type: 'text',
            //         name: 'organizer_name',
            //         id: 'organizer_name',
            //     },
            //     {
            //         title: 'Alamat Perusahaan atau Organisasi',
            //         type: 'text',
            //         name: 'organizer_address',
            //         id: 'organizer_address'
            //     },
            //     {
            //         title: 'Nama Kontak Perusahaan atau Organisasi',
            //         type: 'text',
            //         name: 'organizer_contact_name',
            //         id: 'organizer_contact_name'
            //     },
            //     {
            //         title: 'No. Telp Perusahaan atau Organisasi',
            //         type: 'text',
            //         name: 'organizer_contact_phone',
            //         id: 'organizer_contact_phone'
            //     },
            // ]

            // for (const field of fieldsToAdd) {
            //     const existEl = document.getElementById(field.id)
            //     if(existEl) {
            //         formEl.removeChild(existEl)
            //     }
            // console.log(field.id)
            // }

            // const getClickedRadio = event.target.id === 'event_organizer';
            // if (getClickedRadio) {
            //     console.log(100)
            //     const fragment = document.createDocumentFragment()

            //     const newFields = fieldsToAdd.map(item => {
            //         let newEl = document.createElement('div');
            //         newEl.className = 'form-group mb-4'
            //         newEl.setAttribute('id', `${item.id}`)
            //         newEl.innerHTML = `
            //             <label for="${item.name}" class="text-primary fw-bold mb-2">${item.title}</label>
            //             <input type="${item.type}" class="form-control py-2 @error('${item.name}') is-invalid @enderror"
            //                    id="${item.id}" name="${item.name}" value="{{ old('${item.name}') }}" placeholder="${item.title}">

            //             @error('${item.name}')
            //                 <div class="invalid-feedback">
            //                     {{ $message }}
            //                 </div>
            //             @enderror
            //         `

            //         fragment.appendChild(newEl)
            //     })
            //     formEl.insertBefore(fragment, formEl.children[7]);
            // }
        }
        // window.onload = displayNewField();
    </script>
@endpush
