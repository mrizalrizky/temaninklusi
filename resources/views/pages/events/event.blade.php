@extends('layouts.app')

@section('content')
<div class="container-lg px-4 px-lg-3">
    <div class="text-center my-5">
        <h3 class="text-primary">Mulai cari event & kegiatan</h3>
        <p class="text-primary">buat bantu kamu kembangin diri!</p>
    </div>

    <section class="mb-5">
        <form action="{{ route('event.index')}}" method="GET">
            <div class="d-flex gap-4 rounded-4 p-4 m-auto" style="width: fit-content; background-color: #01676c">
                <x-form.base-form-input name="title" type="text" placeholder="Cari event" value="{{ old('title') }}"/>
                <x-form.base-form-input name="start_date" type="date" placeholder="DD/MM/YYYY" value="{{ old('start_date') }}" />
                <x-form.base-form-select name="event_category" id="event_category" placeholder="Kategori Event" :options="$eventCategories" selectedValue="{{ old('event_category') }}" />
                <x-form.base-form-multi-select name="disability_categories" :options="$disabilityCategories" placeholder="Jenis Disabilitas" id="disability_categories"/>
                <button class="d-flex align-self-center bg-transparent border-0" type="submit">
                    <iconify-icon icon="mingcute:search-line" height="2.25rem" class="text-white"></iconify-icon>
                </button>
                @can('upload-event')
                    <a class="d-flex align-self-center bg-transparent border-0" href="{{ route('event.upload')}}">
                        <iconify-icon icon="carbon:add-alt" height="2.25rem" class="text-white"></iconify-icon>
                    </a>
                @endcan
            </div>
        </form>

        <h3 class="text-primary text-center my-5">Semua Event</h3>
        @if(count($events) > 0)
        <div class="row px-md-0 justify-content-center g-3 g-md-4">
        @foreach ($events as $event)
            <x-card.event-card :event="$event"/>
        @endforeach
        </div>
        @else
            <p class="text-center">Tidak ada event...</p>
        @endif
    </section>

    <div class="d-flex justify-content-center">
        {{ $events->links() }}
    </div>
</div>
{{-- @dd($events) --}}
@endsection

@push('after-script')
<script>
    const getEventByCategory = (select) => {
        const selectedOption = select.options[select.selectedIndex];
        const categoryId = selectedOption.value;

        if (select.checked) {
            selectedCategories.push(categoryId);
        } else {
            const index = selectedCategories.indexOf(categoryId);
            if (index !== -1) {
                selectedCategories.splice(index, 1);
            }
        }

        console.log("Selected Categories:", selectedCategories);

        // fetch(env('APP_URL')/events)
    }
</script>
@endpush
