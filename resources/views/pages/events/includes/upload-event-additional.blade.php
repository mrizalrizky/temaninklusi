<section class="d-flex flex-column gap-4">
    <div class="form-group">
        <label for="event_license_flag" class="text-primary fw-bold mb-2">Apakah event kamu sudah memiliki izin atau
            lisensi?</label>
        <div class="d-block">
            <div class="form-check form-check-inline">
                <input class="form-check-input py-2" type="radio" name="event_license_flag" value="0"
                    id="license_false" onchange="displayNewField()" {!! $data
                        ? ($data['event_license_flag'] == 0
                            ? 'checked'
                            : (old('event_license_flag')
                                ? (old('event_license_flag') == 0
                                    ? 'checked'
                                    : '')
                                : 'checked'))
                        : 'checked' !!} />
                <label for="license_false"
                    class="form-check-label text-primary fw-bold mb-2 @error('event_license_flag') is-invalid @enderror">
                    Belum
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input py-2" type="radio" name="event_license_flag" value="1"
                    id="license_true" onchange="displayNewField()" {!! $data
                        ? ($data['event_license_flag'] == 1
                            ? 'checked'
                            : '')
                        : (old('event_license_flag') == 1
                            ? 'checked'
                            : '') !!} />
                <label for="license_true"
                    class="form-check-label text-primary fw-bold mb-2 @error('event_license_flag') is-invalid @enderror">
                    Sudah
                </label>
            </div>
        </div>

        @if ($errors->has('event_license_flag'))
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
</div>

<div class="form-group overflow-hidden" id="license"
    style="{{ $data ? ($data['event_license_flag'] != 1 ? 'display: none' : 'display: inline-block') : (old('event_license_flag') != 1 ? 'display: none' : 'display: inline-block') }}">
    <label for="event_license_file" class="text-primary form-label fw-bold @error('event_license_file') is-invalid @enderror">Upload lisensi atau izin</label>
    <br/>
    <input type="file" name="event_license_file" id="event_license_file" accept="application/pdf">
    @error('event_license_file')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group overflow-hidden">
    <label for="event_proposal_file" class="text-primary form-label fw-bold mandatory @error('event_proposal_file') is-invalid @enderror">Upload event proposal</label>
    <br/>
    <input type="file" name="event_proposal_file" id="event_proposal_file" accept="application/pdf">
    @error('event_proposal_file')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="row gap-4 gap-sm-3">
    <div class="col-12 col-md" id="event_facility">
        <label class="form-label text-primary fw-bold mandatory @error('event_facilities') is-invalid @enderror"
            for="event_facility">Fasilitas Event</label>
        <br />
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_facility')">+ Add</button>
        <div class="d-flex flex-column gap-3 mt-3">
            <input class="form-control py-2"
                style="{{ $data['event_facilities'][0] ?? (old('event_facilities')[0] ?? 'display: none') }}"
                type="text" name="event_facilities[]" id="event_facilities[]"
                value="{{ $data['event_facilities'][0] ?? (old('event_facilities')[0] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_facilities'][1] ?? (old('event_facilities')[1] ?? 'display: none') }}"
                type="text" name="event_facilities[]" id="event_facilities[]"
                value="{{ $data['event_facilities'][1] ?? (old('event_facilities')[1] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_facilities'][2] ?? (old('event_facilities')[2] ?? 'display: none') }}"
                type="text" name="event_facilities[]" id="event_facilities[]"
                value="{{ $data['event_facilities'][2] ?? (old('event_facilities')[2] ?? null) }}">
        </div>
        @error('event_facilities')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="row gap-4 gap-sm-3">
    <div class="col-12 col-md" id="event_benefit">
        <label class="form-label text-primary fw-bold mandatory @error('event_benefits') is-invalid @enderror"
            for="event_benefit">Benefit</label>
        <br />
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_benefit')">+ Add</button>
        <div class="d-flex flex-column gap-3 mt-3">
            <input class="form-control py-2"
                style="{{ $data['event_benefits'][0] ?? (old('event_benefits')[0] ?? 'display: none') }}"type="text"
                name="event_benefits[]" id="event_benefits[]"
                value="{{ $data['event_benefits'][0] ?? (old('event_benefits')[0] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_benefits'][1] ?? (old('event_benefits')[1] ?? 'display: none') }}"type="text"
                name="event_benefits[]" id="event_benefits[]"
                value="{{ $data['event_benefits'][1] ?? (old('event_benefits')[1] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_benefits'][2] ?? (old('event_benefits')[2] ?? 'display: none') }}"type="text"
                name="event_benefits[]" id="event_benefits[]"
                value="{{ $data['event_benefits'][2] ?? (old('event_benefits')[2] ?? null) }}">
        </div>
        @error('event_benefits')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="row gap-4 gap-sm-3">
    <div class="col-12 col-md">
        <x-form.base-form-input class="mb-4" title="Link media sosial" name="social_media_link" type="text"
            name="social_media_link" value="{{ $data ? $data['social_media_link'] : old('social_media_link') }}"
            :label="true" placeholder="Instagram">
            @error('social_media_link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
</section>


@push('after-script')
<script>
    const displayNewField = () => {
        const getClickedRadio = event.target.id === 'license_true';
        const divStyle = document.getElementById('license')
        getClickedRadio ? divStyle.style.display = 'inline-block' : divStyle.style.display = 'none'
    }

    const addField = (id) => {
        const divEl = document.getElementById(id)
        const inputEl = divEl.querySelector('input[type="text"][style="display: none"]')
        inputEl.style.display = 'inline-block'
    }
</script>
@endpush
