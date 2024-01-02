<div class="row">
    <div class="col form-group mb-4">
        <label class="form-label text-primary fw-bold" for="description">Deskripsi Event</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="7" placeholder="Deskripsikan event kamu...">{{ $data ? $data['description'] : old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col form-group mb-4">
        <label for="eligibility" class="text-primary fw-bold mb-2">Eligibility</label>
        <x-form.base-form-multi-select name="disability_category" id="disability_category" :options="$disabilityCategories" placeholder="Event anda ramah untuk disabilitas apa?"/>
    </div>
</div>

<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Tanggal Event Dimulai" type="datetime-local" name="start_date" value="{{ $data ? $data['start_date'] : old('start_date') }}" :label="true">
            @error('start_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
    <div class="col form-group">
        <x-form.base-form-input class="mb-4" title="Tanggal Event Selesai" type="datetime-local" name="end_date" value="{{ $data ? $data['end_date'] : old('end_date') }}" :label="true">
            @error('end_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
    <div class="col form-group"></div>
</div>

<div class="row">
    <div class="col">
        <label for="event_banner" class="text-primary fw-bold">Poster Event</label>
        <x-button.upload-image-button name="event_banner"/>
    </div>
    @if($data)
        <input type="hidden" name="event_banner" value="{{ $data['event_banner'] }}">
    @endif
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Lokasi Event" type="text" name="location" value="{{ $data ? $data['location'] : old('location') }}" :label="true">
            @error('location')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
