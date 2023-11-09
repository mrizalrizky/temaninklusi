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
        {{-- <form action="{{ route('event.index')}}" method="GET"> --}}
        <div class="d-flex gap-4 rounded-4 p-4 m-auto" style="width: fit-content; background-color: #01676c">
                <x-form.base-form-input name="title" placeholder="Cari event"/>
                <x-form.base-form-input name="start_date" type="date" />
                <x-form.base-form-select name="disability_category" :options="$disabilityCategories" placeholder="Jenis Disabilitas" id="event_category"/>
            </div>
        {{-- </form> --}}

        <h3 class="text-primary text-center my-5">
            Semua Event
        </h3>

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

{{-- @push('after-script')
<script>
$(document).on('change', '#event_category', function () {
    let category_id = $(this).val();
    console.log('CATEGORY ID', category_id)
    $.ajax({
        type: 'GET',
        url: '{{ route('event.index') }}',
        data: { 'category_id': category_id},
        success: function(data) {
            console.log('SUCCESS, DATA :', data);
        }
    })
})
</script>
@endpush --}}
