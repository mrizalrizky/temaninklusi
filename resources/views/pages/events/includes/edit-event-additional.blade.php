<div class="form-group mb-4">
    <label for="event_license_flag" class="text-primary fw-bold mb-2">Apakah event kamu sudah memiliki izin atau lisensi?</label>
    <div class="d-block">
        <div class="form-check form-check-inline">
            <input class="form-check-input py-2" type="radio" name="event_license_flag" value="0" id="license_false" onchange="displayNewField()" {!! (old('event_license_flag') ? (old('event_license_flag') == 0 ? 'checked': '') : ($event->event_license_flag == 0 ? 'checked' : '')) !!}/>
            <label for="license_false" class="form-check-label text-primary fw-bold mb-2 @error('event_license_flag') is-invalid @enderror">
                Belum
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input py-2" type="radio" name="event_license_flag" value="1" id="license_true" onchange="displayNewField()" {!! (old('event_license_flag') ? (old('event_license_flag') == 1 ? 'checked': '') : ($event->event_license_flag == 1 ? 'checked' : '')) !!}/>
            <label for="license_true" class="form-check-label text-primary fw-bold mb-2 @error('event_license_flag') is-invalid @enderror">
                Sudah
            </label>
        </div>
    </div>
    @if($errors->has('event_license_flag'))
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group mb-4" id="license" style="{{ old('event_license_flag') ? (old('event_license_flag') != 1 ? 'display: none' : 'display: inline-block') : ($event->event_license_flag != 1 ? 'display: none' : 'display: inline-block') }}">
    <label for="event_license_file" class="text-primary fw-bold">Upload lisensi atau izin</label>
    <x-button.upload-image-button name="event_license_file"/>
</div>

<div class="row">
    <div class="col" id="event_facilities">
        <label class="form-label text-primary fw-bold" for="event_facilities">Fasilitas Event</label>
        <br/>
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_facilities', 'event_facility')">+ Add</button>

        <div>
            @foreach ($event->eventDetail->event_facilities as $eventFacility)
                <input type="text" class="form-control py-2" name="event_facility" value="{{ $eventFacility }}"/>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="event_benefits">
        <label class="form-label text-primary fw-bold" for="event_benefits">Benefit</label>
        <br/>
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_benefits', 'event_benefit')">+ Add</button>
        <div>
            @foreach ($event->eventDetail->event_benefits as $eventBenefit)
                <input type="text" class="form-control py-2" name="event_benefit" value="{{ $eventBenefit }}"/>
            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Link media sosial" name="social_media_link" type="text" value="{{ old('social_media_link') ?? $event->eventDetail->social_media_link }}" :label="true" placeholder="Instagram">
            @error('organizer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>


@push('after-script')
    <script>
        const displayNewField = () => {
            const getClickedRadio = event.target.id === 'license_true';
            const divStyle = document.getElementById('license')
            getClickedRadio ? divStyle.style.display = 'inline-block' : divStyle.style.display = 'none'
        }

        const addField = (type, fieldName) => {
            const eventFacilityEl = document.getElementById(type)
            const fragment = document.createDocumentFragment()
            let inputEl = document.createElement('input')
            inputEl.className = 'form-control py-2'
            inputEl.type = 'text'
            inputEl.name = fieldName

            fragment.appendChild(inputEl)
            eventFacilityEl.children[3].append(fragment)
        }
    </script>
@endpush
