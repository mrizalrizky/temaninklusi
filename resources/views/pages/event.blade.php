@extends('layouts.app')

@section('content')

<div class="container">
    <section class="">
        <div class="text-center my-5">
            <h3 class="text-primary">
            Mulai cari event & kegiatan
            </h3>
            <p class="text-primary fw-bold">buat bantu kamu kembangin diri!</p>
        </div>

        <div class="d-flex gap-4 rounded-4 p-4 align-self-center" style="width: fit-content; background-color: #01676c">
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari event" name="title">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari event"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari event">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kategori">
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="text-center my-5">
            <h4 class="text-primary">
                Semua Event
            </h4>
        </div>

        @if($events)
            <div class="row px-md-0 justify-content-center g-3 g-md-4">
                @foreach ($events as $event)
                    <x-event-card :event="$event"/>
                @endforeach
            </div>
        @endif

    </section>
    <div class="d-flex justify-content-center">
        {{ $events->links() }}
    </div>
</div>

@endsection

