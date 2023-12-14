<div class="col-12 col-md-4">
    <a href="{{ route('event.index') }}/{{ $event->eventDetail->slug }}">
        <div class="card">
            <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="Event Banner">
            <div class="card-body d-grid gap-2">
                <h4 class="mb-0 card-title text-primary">{{ $event->eventDetail->title }}</h4>
                <caption-detail>{{ $event->eventDetail->start_date->format('d M Y') }}</caption-detail>
                <x-tag.organizer-tag :organizer="$event->organizer"/>
            </div>
        </div>
    </a>
</div>
