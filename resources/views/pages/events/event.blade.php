@extends('layouts.app')

@section('content')
    <div class="container-lg px-4 px-lg-3">
        <div class="text-center my-5">
            <h3 class="text-primary">Mulai cari event & kegiatan</h3>
            <p class="text-primary">buat bantu kamu kembangin diri!</p>
        </div>
        <section class="mb-5">
            <div class="d-flex gap-3 flex-column flex-md-row justify-center justify-content-md-between rounded-4 p-4 m-auto "
                style="background-color: #01676c; max-width: 920px;">
                <form action="{{ route('event.index') }}" class="d-flex gap-3 w-100" style="max-width: 700px" method="GET">
                    <x-form.base-form-input name="title" class="w-100" type="text" placeholder="Cari event"
                        value="{{ Session::get('searchKeyword') }}" />
                    <button class="d-flex align-self-center btn btn-secondary border-0" type="submit">
                        Search
                    </button>
                </form>
                <div class="d-flex gap-3 col-12 col-md">
                    <button type="button" style="min-width: 10rem" class="col-11 col-md btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-bs-whatever="@mdo">Advance Search</button>
                    @can('upload-event')
                        <div class="col d-flex align-items-center">
                            <a class="d-flex align-self-center bg-transparent border-0" href="{{ route('event.upload') }}">
                                <iconify-icon icon="carbon:add-alt" height="1.5rem" width="1.5rem" class="text-white"></iconify-icon>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>

            <h4 class="text-primary text-center my-5">Semua Event</h4>
            @if (count($events) > 0)
                <div class="row px-md-0 justify-content-center g-3 g-md-4">
                    @foreach ($events as $event)
                        <x-card.event-card :event="$event" />
                    @endforeach
                </div>
            @else
                <p class="text-center">Tidak ada event...</p>
            @endif
        </section>

        <div class="d-flex justify-content-center">
            {{ $events->withQueryString()->links() }}
        </div>
    </div>
    {{-- @dd($events) --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advanced Search</h5>
                    <button t
                    ype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('event.index') }}" class="d-flex flex-column gap-4 mt-3" method="GET">
                        <x-form.base-form-input name="title" type="text" placeholder="Cari event"
                            value="{{ old('title') }}" />
                        <x-form.base-form-input name="start_date" type="date" placeholder="DD/MM/YYYY"
                            value="{{ old('start_date') }}" />
                        <x-form.base-form-select name="event_category" id="event_category" placeholder="Kategori Event"
                            :options="$eventCategories" selectedValue="{{ old('event_category') }}" />
                        <x-form.base-form-multi-select name="disability_categories" :options="$disabilityCategories"
                            placeholder="Jenis Disabilitas" id="disability_categories" />
                        <button class="d-flex align-self-center bg-transparent border-0" type="submit">
                            <iconify-icon icon="mingcute:search-line" height="2.25rem" class="text-white"></iconify-icon>
                        </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
            </div>
        </div>
    </div>
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
