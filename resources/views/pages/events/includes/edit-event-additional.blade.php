<section class="d-flex flex-column gap-4">
    <div class="form-group">
        <label for="event_license_flag" class="text-primary fw-bold mb-2">
            Apakah event kamu sudah memiliki izin atau lisensi?
        </label>
        <div class="d-block">
            <div class="form-check form-check-inline">
                <input type="text" type="hidden" name="event_license_flag" value="{{ $event->event_license_flag }}">
                <input class="form-check-input py-2" type="radio" name="event_license_flag" value="0"
                    id="license_false" onchange="displayNewField()" {!! $data
                        ? ($data['event_license_flag'] == 0
                            ? 'checked'
                            : ($event->event_license_flag
                                ? ($event->event_license_flag == 0
                                    ? 'checked'
                                    : '')
                                : 'checked'))
                        : 'checked' !!} disabled />
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
                            : '') !!} disabled />
                <label for="license_true"
                    class="form-check-label text-primary fw-bold mb-2 @error('event_license_flag') is-invalid @enderror">
                    Sudah
                </label>
            </div>
        </div>
    </div>

    <div class="form-group overflow-hidden" id="license"
        style="{{ $data ? ($data['event_license_flag'] != 1 ? 'display: none' : 'display: inline-block') : ($event->event_license_flag != 1 ? 'display: none' : 'display: inline-block') }}">
        <label for="event_license_file"
            class="text-primary form-label fw-bold @error('event_license_file') is-invalid @enderror">Lisensi atau
            izin</label>

        @if ($event->eventLicenseFile)
            <button class="d-flex h-100 btn btn-secondary text-dark">
                <a class="d-flex gap-2 align-items-center text-primary"
                    href="{{ Storage::disk('public')->url($event->eventLicenseFile->file_path . $event->eventLicenseFile->file_name) }}"
                    download>
                    <iconify-icon icon="bi:download" height="1rem" class="text-primary"></iconify-icon>
                    <small>
                        Download file
                    </small>
                </a>
            </button>
        @endif
    </div>

    <div class="form-group overflow-hidden">
        <label for="event_proposal_file"
            class="text-primary form-label fw-bold @error('event_proposal_file') is-invalid @enderror">Event
            Proposal</label>
        @if ($event->eventProposalFile)
            <button class="d-flex h-100 btn btn-secondary text-dark">
                <a class="d-flex gap-2 align-items-center text-primary"
                    href="{{ Storage::disk('public')->url($event->eventProposalFile->file_path . $event->eventProposalFile->file_name) }}"
                    download>
                    <iconify-icon icon="bi:download" height="1rem" class="text-primary"></iconify-icon>
                    <small>
                        Download file
                    </small>
                </a>
            </button>
        @endif

    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md" id="event_facility">
            <label
                class="d-block form-label text-primary fw-bold mandatory @error('event_facilities') is-invalid @enderror"
                for="event_facility">Fasilitas Event</label>

            <button type="button" class="position-relative btn btn-primary rounded-5 me-auto"
                style="width: 2.3rem; height: 2.3rem" onclick="removeField('event_facility')">
                <iconify-icon icon="ic:round-minus" height="1rem"
                    class="position-absolute top-50 start-50 translate-middle"></iconify-icon>
            </button>
            <button type="button" class="position-relative btn btn-primary rounded-5 me-auto"
                style="width: 2.3rem; height: 2.3rem" onclick="addField('event_facility')">
                <iconify-icon icon="ic:round-plus" height="1rem"
                    class="position-absolute top-50 start-50 translate-middle"></iconify-icon>
            </button>

            <div class="d-flex flex-column gap-3 mt-3">
                <input
                    class="form-control py-2 {{ !empty($data['event_facilities'][0]) || !empty($event->eventDetail->event_facilities[0]) ? 'd-inline-block' : 'd-none' }}"
                    type="text" name="event_facilities[]" id="event_facilities[]"
                    value="{{ $data['event_facilities'][0] ?? ($event->eventDetail->event_facilities[0] ?? null) }}">

                <input
                    class="form-control py-2 {{ !empty($data['event_facilities'][1]) || !empty($event->eventDetail->event_facilities[1]) ? 'd-inline-block' : 'd-none' }}"
                    type="text" name="event_facilities[]" id="event_facilities[]"
                    value="{{ $data['event_facilities'][1] ?? ($event->eventDetail->event_facilities[1] ?? null) }}">

                <input
                    class="form-control py-2 {{ !empty($data['event_facilities'][2]) || !empty($event->eventDetail->event_facilities[2]) ? 'd-inline-block' : 'd-none' }}"
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
            <label
                class="d-block form-label text-primary fw-bold mandatory @error('event_benefits') is-invalid @enderror"
                for="event_benefit">Benefit Event</label>

            <button type="button" class="position-relative btn btn-primary rounded-5 me-auto"
                style="width: 2.3rem; height: 2.3rem" onclick="removeField('event_benefit')">
                <iconify-icon icon="ic:round-minus" height="1rem"
                    class="position-absolute top-50 start-50 translate-middle"></iconify-icon>
            </button>
            <button type="button" class="position-relative btn btn-primary rounded-5 me-auto"
                style="width: 2.3rem; height: 2.3rem" onclick="addField('event_benefit')">
                <iconify-icon icon="ic:round-plus" height="1rem"
                    class="position-absolute top-50 start-50 translate-middle"></iconify-icon>
            </button>

            <div class="d-flex flex-column gap-3 mt-3">
                <input
                    class="form-control py-2 {{ !empty($data['event_benefits'][0]) || !empty($event->eventDetail->event_benefits[0]) ? 'd-inline-block' : 'd-none' }}"
                    type="text" name="event_benefits[]" id="event_benefits[]"
                    value="{{ $data['event_benefits'][0] ?? ($event->eventDetail->event_benefits[0] ?? null) }}">

                <input
                    class="form-control py-2 {{ !empty($data['event_benefits'][1]) || !empty($event->eventDetail->event_benefits[1]) ? 'd-inline-block' : 'd-none' }}"
                    type="text" name="event_benefits[]" id="event_benefits[]"
                    value="{{ $data['event_benefits'][1] ?? ($event->eventDetail->event_benefits[1] ?? null) }}">

                <input
                    class="form-control py-2 {{ !empty($data['event_benefits'][2]) || !empty($event->eventDetail->event_benefits[2]) ? 'd-inline-block' : 'd-none' }}"
                    type="text" name="event_benefits[]" id="event_benefits[]"
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
                name="social_media_link"
                value="{{ $data['social_media_link'] ?? (old('social_media_link') ?? $event->eventDetail->social_media_link) }}"
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
            const inputEl = divEl.querySelector('input[type="text"][class="form-control py-2 d-none"]')
            if (!inputEl) return
            inputEl.classList.add('d-inline-block')
            inputEl.classList.remove('d-none')
        }

        const removeField = (id) => {
            const divEl = document.getElementById(id)
            const inputEl = divEl.querySelector('input[type="text"][class="form-control py-2 d-inline-block"]')
            if (!inputEl) return
            inputEl.value = null;
            inputEl.classList.add('d-none')
            inputEl.classList.remove('d-inline-block')
        }
    </script>
@endpush
