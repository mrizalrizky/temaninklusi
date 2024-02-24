<div class="col-12 col-md-4 position-relative">
    @if ($event->disability_event_flag)
        <img src="{{ asset($event->disabilityCategories[0]->icon_path) ?? '' }}" class="disability-icon position-absolute" alt="">
    @endif
    <a href="{{ route('event.index') }}/{{ $event->eventDetail->slug }}">
        <div class="card">
            {{ Storage::disk('public')->url($event->eventBanner->file_path . $event->eventBanner->file_name) }}
            {{ Storage::disk('public')->exists($event->eventBanner->file_path) ? 'true' : 'false'}}
            <img src="{{ Storage::disk('public')->exists($event->eventBanner->file_path) ? Storage::disk('public')->url($event->eventBanner->file_path . $event->eventBanner->file_name) : asset('assets/img/temuinklusi-asset.png') }}" class="card-img-top img-fluid object-fit-cover" style="height: 12rem" alt="Event Banner">
            <div class="card-body d-grid gap-2">
                <h5 class="mb-0 card-title text-primary elipsis-title">{{ $event->eventDetail->title }}</h5>
                <caption-detail>{{ $event->eventDetail->start_date->format('d M Y') }}</caption-detail>
                <x-tag.organizer-tag class="custom-tag" :organizer="$event->organizer"/>
            </div>
        </div>
    </a>
</div>
