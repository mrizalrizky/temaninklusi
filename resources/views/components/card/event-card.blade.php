<div class="col-12 col-md-4">
    <a href="{{ route('event.index') }}/{{ $event->eventDetail->slug }}">
        <div class="card">
            <img src="{{ Storage::disk('public')->exists($event->eventBanner->file_path) ? Storage::disk('public')->url($event->eventBanner->file_path . $event->eventBanner->file_name) : $event->eventBanner->file_path }}" class="card-img-top img-fluid" style="max-height: 15rem" alt="Event Banner">
            <div class="card-body d-grid gap-2">
                <h4 class="mb-0 card-title text-primary">{{ $event->eventDetail->title }}</h4>
                <caption-detail>{{ $event->eventDetail->start_date->format('d M Y') }}</caption-detail>
                <x-tag.organizer-tag :organizer="$event->organizer"/>
            </div>
        </div>
    </a>
</div>
