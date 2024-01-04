<div class="row">
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Nama Event" name="title" type="text" value="{{ $data ? $data['title'] : old('title') }}" :label="true">
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
        <label for="event_category" class="text-primary fw-bold mb-2">Kategori Event</label>
        <x-form.base-form-select name="event_category" id="event_category" placeholder="Pilih Kategori" :options="$eventCategories" selectedValue="{{ $data ? $data['event_category'] : old('event_category') }}" />
    </div>
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Jumlah Tiket" type="number" min="1" name="quota" value="{{ $data ? $data['quota'] : old('quota') }}" :label="true">
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
        <x-form.base-form-input class="mb-4" title="Contact Email" type="email" name="contact_email" value="{{ $data ? $data['contact_email'] : old('contact_email') }}" :label="true">
            @error('contact_email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>

    <div class="col">
        <x-form.base-form-input class="mb-4" title="Contact Phone" type="text" name="contact_phone" value="{{ $data ? $data['contact_phone'] : old('contact_phone') }}" :label="true">
            @error('contact_phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
