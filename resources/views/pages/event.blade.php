@extends('layouts.app')

@section('content')

<div class="container-lg px-4 px-lg-3">
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
            <x-form.base-form-input name="title" placeholder="Cari event"/>
            <x-form.base-form-input name="start_date" type="date" name="disability_category" placeholder="Jenis Disabilitas"/>
            <x-form.base-form-select :options="$disabilityCategories" name="disability_category"/>
            {{-- <x-form.base-form-select name="event_category"/> --}}
        </div>

        <h4 class="text-primary text-center my-5">
            Semua Event
        </h4>

        @if($events)
            <div class="row px-md-0 justify-content-center g-3 g-md-4">
                @foreach ($events as $event)
                    <x-card.event-card :event="$event"/>
                @endforeach
            </div>
        @endif

    </section>
    <div class="d-flex justify-content-center">
        {{ $events->links() }}
    </div>
</div>

@endsection

