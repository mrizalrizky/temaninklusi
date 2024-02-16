@extends('layouts.app')

@section('content')
    <div class="container-lg px-4 px-lg-3">
        <div class="text-center my-5">
            <h3 class="text-primary">Mulai cari event & kegiatan</h3>
            <p class="text-primary">buat bantu kamu kembangin diri!</p>
        </div>
        <section class="mb-5">
            <div class="d-flex gap-3 flex-column flex-md-row justify-center justify-content-md-between rounded-4 p-4 m-auto bg-primary"
                style="max-width: 920px;">
                <form action="{{ route('event.index') }}" class="d-flex gap-3 w-100" style="max-width: 700px" method="GET">
                    <x-form.base-form-input name="title" class="w-100" type="text" placeholder="Cari event"
                        value="{{ Session::get('searchKeyword') }}" />
                    <button class="d-flex align-self-center btn btn-secondary border-0" type="submit">
                        Search
                    </button>
                </form>
                <div class="d-flex gap-3 col-12 col-md">
                    <button type="button" style="min-width: 10rem" class="flex-grow-1 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#advSearchModal"
                        data-bs-whatever="@mdo">Advanced Search</button>
                    @can('upload-event')
                        <div class="d-flex align-items-center">
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

    <div class="modal fade" id="advSearchModal" tabindex="-1" aria-labelledby="advSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="advSearchModalLabel">Advanced Search</h5>
                    <button t
                    ype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('event.index') }}" class="d-flex flex-column gap-4 mt-3" method="GET">
                        <x-form.base-form-input title="Judul Event" name="title" type="text" placeholder="Cari event"
                            value="{{ old('title') }}" :label="true" />
                        <x-form.base-form-input title="Tanggal Event Dimulai" name="start_date" type="date" placeholder="DD/MM/YYYY"
                            value="{{ old('start_date') }}" :label="true"/>
                        <div class="form-group">
                            <label for="event_category" class="text-primary fw-bold mb-2">Kategori Event</label>
                            <x-form.base-form-select title="Kategori Event" name="event_category" id="event_category" placeholder="Kategori Event"
                                                     :options="$eventCategories" selectedValue="{{ old('event_category') }}" :label="true" />
                        </div>

                        <div class="form-group">
                            <label for="eligibility" class="text-primary fw-bold mb-2">Eligibility</label>
                            <x-form.base-form-multi-select title="Eligibility" name="disability_categories" :options="$disabilityCategories"
                            placeholder="Jenis Disabilitas" id="disability_categories" :label="true" />
                        </div>
                        <button class="d-flex align-self-center bg-transparent border-0" type="submit">
                            <iconify-icon icon="mingcute:search-line" height="2.25rem" class="text-white"></iconify-icon>
                        </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="border-radius: 0.35rem !important">Search</button>
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
