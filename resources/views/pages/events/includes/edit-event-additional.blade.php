<div class="form-group mb-4">
    <label for="license_flag" class="text-primary fw-bold mb-2">Apakah event kamu sudah memilik izin atau lisensi?</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input py-2" type="radio" name="license_flag" id="" onchange="getUserType()" checked/>
        <label for="license_flag" class="form-check-label text-primary mb-2 @error('license_Flag') is-invalid @enderror">Sudah</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input py-2" type="radio" name="license_flag" value="{{ App\Constants\RoleConstant::EVENT_ORGANIZER }}" id="event_organizer" onchange="getUserType()"/>
        <label for="license_flag" class="form-check-label text-primary mb-2 @error('license_flag') is-invalid @enderror">
            Belum
        </label>
    </div>
    @error('license_flag')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="row">
    <div class="col">
        <label class="form-label text-primary fw-bold" for="facilities">Fasilitas Event</label>
        <textarea class="form-control" name="facilities" id="faq" cols="30" rows="3"
                  placeholder="Fasilitas apa yang disediakan dan dapat mendukung jalannya event dengan baik?"></textarea>
    </div>
</div>
<div class="row">
    <div class="col">
        <label class="form-label text-primary fw-bold" for="benefit">Benefit</label>
        <textarea class="form-control" name="Benefit" id="benefit" cols="30" rows="3"
                  placeholder="Sertakan kebijakan privasi yang menjelaskan event kamu"></textarea>
    </div>
</div>
<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Link media sosial" name="social_media_link" type="text" name="social_media_link" :label="true" placeholder="Instagram">
            @error('organizer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
