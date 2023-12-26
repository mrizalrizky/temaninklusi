<div class="row">
    <div class="col form-group mb-4">
        <label class="form-label text-primary fw-bold" for="description">Deskripsi Event</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="7" placeholder="Deskripsikan event kamu..."></textarea>
    </div>
</div>

<div class="row">
    <div class="col form-group mb-4">
        <label for="eligibility" class="text-primary fw-bold mb-2">Eligibility</label>
        <x-form.base-form-multi-select name="disability_category" id="disability_category" :options="$disabilityCategories" placeholder="Event anda ramah untuk disabilitas apa?"/>
    </div>
</div>

<div class="row">
    <div class="col form-group">
        <label for="start_date" class="text-primary fw-bold">Tanggal Event Dimulai</label>
        <input class="form-control" type="datetime-local" name="start_date" id="start_date" value="{{ old('start_date') }}" placeholder="dd/mm/yyyy" />
    </div>
    <div class="col form-group">
        <label for="end_date" class="text-primary fw-bold">Tanggal Event Berakhir</label>
        <input class="form-control" type="datetime-local" name="end_date" id="end_date" value="{{ old('end_date') }}" placeholder="dd/mm/yyyy" />
    </div>
    <div class="col form-group"></div>
</div>

<div class="row">
    <div class="col">
        <label for="event_banner" class="text-primary fw-bold">Poster Event</label>
        <div>
            <input type="hidden" name="event_banner">
        </div>
    </div>
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Lokasi Event" type="text" name="location" value="{{ old('location') }}" :label="true">
            @error('location')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
