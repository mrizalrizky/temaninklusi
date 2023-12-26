<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Nama Event" id type="text" value="{{ old('title') }}" name="title" :label="true">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>

    <div class="col">
        <x-form.base-form-input class="mb-4" title="Organizer" name="organizer_name" type="text" value="{{ Auth::user()->organizer->name }}" :label="true" disabled>
            @error('organizer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>

<div class="row">
    <div class="col">
        <label for="event_category"" class="text-primary fw-bold mb-2">Kategori Event</label>
        <x-form.base-form-select name="event_category" id="event_category" placeholder="Pilih kategori" :options="$eventCategories"/>
    </div>
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Kuota Event" type="number" min="0" name="quota" value="{{ old('quota') }}" :label="true">
            @error('quota')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>

<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Contact Email" type="email" name="contact_email" value="{{ old('contact_email') }}" :label="true">
            @error('contact_email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>

    <div class="col">
        <x-form.base-form-input class="mb-4" title="Contact Phone" type="text" name="contact_phone" value="{{ old('contact_phone') }}" :label="true">
            @error('contact_phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
