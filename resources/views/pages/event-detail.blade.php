@extends('layouts.app')
@section('title', 'Event Detail')

@section('content')
<div class="container-lg">
    <div>
        <img src="{{asset('assets/about/aboutBanner.png')}}" alt="">
    </div>

    <div class="d-flex flex-row">
        <div>
            <p>8 Agustus 2024</p>
            <h4>
            Power of Words
            </h4>
        </div>

        <div class="border border-1 rounded-4 p-5 d-grid gap-5">
            {{-- EO Name Section --}}
            <div class="d-flex justify-content-center align-items-center gap-3">
                <div class="p-2 rounded-3 bg-dark">
                    <h5 class="text-center text-white mb-0">TU</h5>
                </div>
                <div>
                    <h5 class="mb-1 text-dark fw-bold text-center">TernakUang</h5>
                    <p class="m-0" style="font-size: 12px">Verified organizer</p>
                </div>
            </div>

            {{-- Event Details Section --}}
            <ul class="d-grid gap-4">
                <li class="d-flex align-items-center gap-3" style="width: fit-content">
                    <iconify-icon icon="bytesize:location" height="1.5em" class="text-primary"></iconify-icon>
                    <p class="m-0">Sahid Sudirman Center</p>
                </li>
                <li class="d-flex align-items-center gap-3" style="width: fit-content">
                    <iconify-icon icon="fontisto:date" height="1.5em" class="text-primary"></iconify-icon>
                    <p class="m-0">Rabu, 8 Agustus 2024</p>
                </li>
                <li class="d-flex align-items-center gap-3" style="width: fit-content">
                    <iconify-icon icon="ph:clock-fill" height="1.5em" class="text-primary "></iconify-icon>
                    <p class="m-0">07.00 - 14.00 WIB</p>
                </li>
            </ul>

            {{-- Register button --}}
            <div class="d-flex justify-content-center">
                <button class="btn btn-sm btn-primary rounded-pill w-75 py-2" href="#">Daftar Sekarang</button>
            </div>
        </div>
    </div>
</div>
@endsection
