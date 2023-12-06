@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="d-flex justify-content-center">
            <img src="assets/about/aboutBanner.png" class="img-fluid col-10" style="max-width: 30rem" alt="">
        </div>
        <div class="mt-5 text-center mb-5">
            <h3  class="mb-4">Misi Kami</h3>
            <p>Menjadi solusi untuk menambah wawasan dan membantu anak-anak muda indonesia
                dalam berkolaborasi, baik itu mempromosikan event/kegiatan antar kampus/institusi hingga menjadi platform
                yang mewadahi mereka dalam mengembangkan diri.
                <br>
                <br>
                Menjadi solusi untuk menambah wawasan dan membantu anak-anak muda indonesia
                dalam berkolaborasi, baik itu mempromosikan event/kegiatan antar kampus/institusi hingga menjadi platform
                yang mewadahi mereka dalam mengembangkan diri.
            </p>
        </div>

        <x-banner title="Punya pertanyaan?" image="{{ asset('assets/about/needHelp.png') }}"/>
    </div>
@endsection
