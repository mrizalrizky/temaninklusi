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
        <x-form.base-form-input class="mb-4" title="Organizer" name="organizer_name" type="text" value="{{ Auth::user()->organizer->name }}" :label="true" :disabled="Auth::user()->organizer->name ? true : false">
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
        <x-form.base-form-select name="event_category" id="event_category" placeholder="Kategori Event" :options="$eventCategories" selectedValue="{{ $data ? $data['event_category'] : old('event_category') }}" />
    </div>
    <div class="col">
        <x-form.base-form-input class="mb-4" title="Kuota Event" type="number" min="1" name="quota" value="{{ $data ? $data['quota'] : old('quota') }}" :label="true">
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
        <x-form.base-form-input class="mb-4" title="Contact Email" type="email" name="contact_email" value="{{ Auth::user()->organizer->contact_email }}" :label="true" :disabled="Auth::user()->organizer->contact_email ? true : false">
            @error('contact_email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>

    <div class="col">
        <x-form.base-form-input class="mb-4" title="Contact Phone" type="text" name="contact_phone" value="{{ Auth::user()->organizer->contact_phone }}" :label="true" :disabled="Auth::user()->organizer->contact_phone ? true : false">
            @error('contact_phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
    </div>
</div>
