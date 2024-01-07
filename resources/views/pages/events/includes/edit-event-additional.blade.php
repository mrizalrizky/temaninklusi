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
                            : ($event->event_license_flag
                                ? ($event->event_license_flag == 0
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
                        : ($event->event_license_flag == 1
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
    style="{{ $data ? ($data['event_license_flag'] != 1 ? 'display: none' : 'display: inline-block') : ($event->event_license_flag != 1 ? 'display: none' : 'display: inline-block') }}">
    <label for="event_license_file" class="text-primary form-label fw-bold @error('event_license_file') is-invalid @enderror">Lisensi atau izin</label>

    @if ($event->eventLicenseFile)
    <button class="d-flex h-100 btn btn-secondary text-dark">
        <a class="d-flex gap-2 salign-items-center text-primary" href="{{ Storage::disk('public')->url($event->eventLicenseFile->file_path . $event->eventLicenseFile->file_name) }}" download>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
            <path
            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
            <path
            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
            </svg>
            <small>
                Download file
            </small>
        </a>
    </button>
    @endif
</div>

<div class="form-group overflow-hidden">
    <label for="event_proposal_file" class="text-primary form-label fw-bold @error('event_proposal_file') is-invalid @enderror">Event Proposal</label>
    @if ($event->eventProposalFile)
        <a href="{{ Storage::disk('public')->url($event->eventProposalFile->file_path . $event->eventProposalFile->file_name) }}" download>{{ $event->eventProposalFile->file_name }}</a>
    @else
    <smallc class="d-block">-</small>
    @endif

</div>

<div class="row gap-4 gap-sm-3">
    <div class="col-12 col-md" id="event_facility">
        <label class="form-label text-primary fw-bold mandatory @error('event_facilities') is-invalid @enderror"
            for="event_facility">Fasilitas Event</label>
        <br />
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_facility')">+ Add</button>
        <div class="d-flex flex-column gap-3 mt-3">
            <input class="form-control py-2"
                style="{{ $data['event_facilities'][0] ?? ($event->eventDetail->event_facilities[0] ?? 'display: none') }}"
                type="text" name="event_facilities[]" id="event_facilities[]"
                value="{{ $data['event_facilities'][0] ?? ($event->eventDetail->event_facilities[0] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_facilities'][1] ?? ($event->eventDetail->event_facilities[1] ?? 'display: none') }}"
                type="text" name="event_facilities[]" id="event_facilities[]"
                value="{{ $data['event_facilities'][1] ?? ($event->eventDetail->event_facilities[1] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_facilities'][2] ?? ($event->eventDetail->event_facilities[2] ?? 'display: none') }}"
                type="text" name="event_facilities[]" id="event_facilities[]"
                value="{{ $data['event_facilities'][2] ?? ($event->eventDetail->event_facilities[2] ?? null) }}">
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
                style="{{ $data['event_benefits'][0] ?? ($event->eventDetail->event_benefits[0] ?? 'display: none') }}"type="text"
                name="event_benefits[]" id="event_benefits[]"
                value="{{ $data['event_benefits'][0] ?? ($event->eventDetail->event_benefits[0] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_benefits'][1] ?? ($event->eventDetail->event_benefits[1] ?? 'display: none') }}"type="text"
                name="event_benefits[]" id="event_benefits[]"
                value="{{ $data['event_benefits'][1] ?? ($event->eventDetail->event_benefits[1] ?? null) }}">
            <input class="form-control py-2"
                style="{{ $data['event_benefits'][2] ?? ($event->eventDetail->event_benefits[2] ?? 'display: none') }}"type="text"
                name="event_benefits[]" id="event_benefits[]"
                value="{{ $data['event_benefits'][2] ?? ($event->eventDetail->event_benefits[2] ?? null) }}">
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
        <x-form.base-form-input class="mb-4" title="Link Media Sosial" name="social_media_link" type="text"
            name="social_media_link" value="{{ $data ? $data['social_media_link'] : $event->eventDetail->social_media_link }}"
            :label="true" placeholder="Instagram" mandatory>
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
