@extends('layouts.app')

@section('content')

<div class="container">
    <section>
        <div class="text-center my-5">
            <h3 class="text-primary">
            Mulai cari event & kegiatan
            </h3>
            <p class="text-primary fw-bold">buat bantu kamu kembangin diri!</p>
        </div>
    </section>

    <section class="mb-5">
        <div class="d-flex gap-4 rounded-4 p-4 m-auto" style="width: fit-content; background-color: #01676c">
            <x-input.base-form-input name="title" placeholder="Cari event"/>
            {{-- <x-input.base-form-input name="date"/> --}}
            {{-- <x-input.base-form-input name="category" placeholder="Kategori"/> --}}
            {{-- <x-input.base-form-input name="location" placeholder="Cari event"/> --}}
            {{-- <div class="form-group">
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
            </div> --}}
        </div>

        <h4 class="text-primary text-center my-5">
            Semua Event
        </h4>

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

