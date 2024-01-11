<section class="d-flex flex-column gap-4">
    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md">
            <x-form.base-form-input title="Judul Event" name="title" type="text"
                value="{{ $data['title'] ?? old('title') ?? $event->eventDetail->title }}" :label="true" mandatory>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>

        <div class="col-12 col-md">
            <x-form.base-form-input title="Organizer" name="organizer_name" type="text"
                value="{{ $event->organizer->name }}" :label="true" :disabled="$event->organizer->name ? true : false">
                @error('organizer_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>
    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md">
            <label for="event_category" class="text-primary fw-bold mb-2 mandatory">Kategori Event</label>
            <x-form.base-form-select name="event_category" id="event_category" placeholder="Kategori Event"
                :options="$eventCategories" selectedValue="{{ $data['event_category'] ?? old('event_category') ?? $event->eventCategory->id }}" />
        </div>
        <div class="col-12 col-md">
            <x-form.base-form-input title="Kuota Event" type="number" min="1" name="quota"
                value="{{ $data['title'] ?? old('quota') ?? $event->eventDetail->quota }}" :label="true" mandatory>
                @error('quota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>
    </div>

    <div class="row gap-4 gap-sm-3">
        <div class="col-12 col-md">
            <x-form.base-form-input title="Contact Email" type="email" name="contact_email"
                value="{{ $event->organizer->contact_email }}" :label="true" :disabled="$event->organizer->contact_email ? true : false">
                @error('contact_email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>

        <div class="col-12 col-md">
            <x-form.base-form-input title="Contact Phone" type="text" name="contact_phone"
                value="{{ $event->organizer->contact_phone }}" :label="true" :disabled="$event->organizer->contact_phone ? true : false">
                @error('contact_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </x-form.base-form-input>
        </div>
    </div>
</section>
