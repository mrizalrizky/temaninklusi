@extends('layouts.app')
@section('title', 'Event Detail')

@section('content')
<div class="container-lg">
    <div>
        <img src="{{asset('assets/about/aboutBanner.png')}}" alt="">
    </div>

    <div class="d-flex flex-row">
        <div>
            <h4>
            TEST 1
            </h4>
        </div>
        <div class="border border-1 rounded-4 p-5">
            {{-- EO Name Section --}}
            <div class="d-flex justify-content-center align-items-center bg-warning">
                <div class="p-2 rounded-3 bg-dark">
                    <h5 class="text-center text-white mb-0">TU</h5>
                </div>
                <div class="bg-secondary text-center">
                    <h5 class="text-dark fw-semibold">TernakUang</h5>
                    <p style="font-size: 12px">Verified organizer</p>
                </div>
            </div>

            {{-- Event Details Section --}}
            <div class="col"></div>

            {{-- Register button --}}
        </div>
    </div>
</div>
@endsection
