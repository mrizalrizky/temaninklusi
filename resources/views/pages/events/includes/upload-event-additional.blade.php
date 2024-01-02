<div class="form-group mb-4">
    <label for="license_flag" class="text-primary fw-bold mb-2">Apakah event kamu sudah memiliki izin atau lisensi?</label>
    <div class="d-block">
        <div class="form-check form-check-inline">
            <input class="form-check-input py-2" type="radio" name="license_flag" value="0" id="license_false" onchange="displayNewField()" {!! old('license_flag') ? old('license_flag') == 0 ? 'checked': '' : 'checked' !!}/>
            <label for="license_false" class="form-check-label text-primary fw-bold mb-2 @error('license_flag') is-invalid @enderror">
                Belum
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input py-2" type="radio" name="license_flag" value="1" id="license_true" onchange="displayNewField()" {!! old('license_flag') == 1 ? 'checked': '' !!}/>
            <label for="license_true" class="form-check-label text-primary fw-bold mb-2 @error('license_flag') is-invalid @enderror">
                Sudah
            </label>
        </div>
    </div>
    @if($errors->has('license_flag'))
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group mb-4" id="license" style="{{ old('license_flag') != 1 ? 'display: none': '' }}">
    <label for="license_file" class="text-primary fw-bold">Upload lisensi atau izin</label>
    <x-button.upload-image-button name="license_file"/>
</div>

<div class="row">
    <div class="col" id="event_facility">
        <label class="form-label text-primary fw-bold @error('event_facilities') is-invalid @enderror" for="event_facility">Fasilitas Event</label>
        <br/>
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_facility')">+ Add</button>
        <div class="d-grid gap-2">
            <input class="form-control py-2" style="{{ old('event_facilities')[0] ?? 'display: none' }}" type="text" name="event_facilities[]" id="event_facilities[]" value="{{ old('event_facilities')[0] ?? null }}">
            <input class="form-control py-2" style="{{ old('event_facilities')[1] ?? 'display: none' }}" type="text" name="event_facilities[]" id="event_facilities[]" value="{{ old('event_facilities')[1] ?? null }}">
            <input class="form-control py-2" style="{{ old('event_facilities')[2] ?? 'display: none' }}" type="text" name="event_facilities[]" id="event_facilities[]" value="{{ old('event_facilities')[2] ?? null }}">
        </div>
        @error('event_facilities')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col" id="event_benefit">
        <label class="form-label text-primary fw-bold @error('event_benefits') is-invalid @enderror" for="event_benefit">Benefit</label>
        <br/>
        <button type="button" class="btn btn-primary rounded-5" onclick="addField('event_benefit')">+ Add</button>
        <div>
            <input class="form-control py-2" style="{{ old('event_benefits')[0] ?? 'display: none' }}"type="text" name="event_benefits[]" id="event_benefits[]" value="{{ old('event_benefits')[0] ?? null }}">
            <input class="form-control py-2" style="{{ old('event_benefits')[1] ?? 'display: none' }}"type="text" name="event_benefits[]" id="event_benefits[]" value="{{ old('event_benefits')[1] ?? null }}">
            <input class="form-control py-2" style="{{ old('event_benefits')[2] ?? 'display: none' }}"type="text" name="event_benefits[]" id="event_benefits[]" value="{{ old('event_benefits')[2] ?? null }}">
        </div>
        @error('event_benefits')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Link media sosial" name="social_media_link" type="text" name="social_media_link" value="{{ $data ? $data['social_media_link'] : old('social_media_link') }}" :label="true" placeholder="Instagram">
            @error('social_media_link')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
{{-- @dd($errors) --}}


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
