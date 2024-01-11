<section class="d-flex flex-column gap-4">
    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md form-group">
            <label class="form-label text-primary fw-bold mandatory" for="description">Deskripsi Event</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30"
                rows="5" placeholder="Deskripsikan event kamu...">{{ $data['description'] ?? old('description') ?? $event->eventDetail->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md form-group">
            <label for="disability_categories"
                class="text-primary fw-bold mandatory mb-2 @error('disability_categories') is-invalid @enderror">Eligibility</label>

                @if ($data)
                <x-form.base-form-multi-select name="disability_categories" id="disability_categories" :options="$disabilityCategories"
                            placeholder="Ramah untuk disabilitas apa?"
                            :selectedValues="$data ? $data['disability_categories'] : $event->disabilityCategories ?? null"/>
                @else
                <x-form.base-form-multi-select name="disability_categories" id="disability_categories" :options="$disabilityCategories"
                            placeholder="Ramah untuk disabilitas apa?"
                            :existingValues="$data ? $data['disability_categories'] : $event->disabilityCategories ?? null"/>
                @endif
            @error('disability_categories')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md">
            <x-form.base-form-input title="Lokasi Event" type="text" name="location"
                value="{{ $data['location'] ?? old('location') ?? $event->eventDetail->location }}" :label="true" mandatory>
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>
    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md">
            <x-form.base-form-input title="Tanggal Event Dimulai" type="datetime-local" name="start_date"
                value="{{ $data['start_date'] ?? old('start_date') ?? $event->eventDetail->start_date }}" :label="true" mandatory>
                @error('start_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>
        <div class="col-12 col-md form-group">
            <x-form.base-form-input title="Tanggal Event Selesai" type="datetime-local" name="end_date"
                value="{{ $data['end_date'] ?? old('end_date') ?? $event->eventDetail->end_date }}" :label="true" mandatory>
                @error('end_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>
    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md">
            <label for="event_banner" class="text-primary fw-bold form-label">Banner Event</label>
            <x-button.upload-image-button name="event_banner" src="{{ Storage::disk('public')->exists($event->eventBanner->file_path . $event->eventBanner->file_name) ? Storage::disk('public')->url($event->eventBanner->file_path . $event->eventBanner->file_name) : asset('assets/img/temuinklusi-asset.png') }}"/>
        </div>
        @if ($data)
            <input type="hidden" name="event_banner" value="{{ $data['event_banner'] ?? '' }}">
        @endif
    </div>
</section>
