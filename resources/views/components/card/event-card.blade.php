<div class="col-12 col-md-4">
    <a href="{{ route('event.index') }}/{{ $event->eventDetails->slug }}">
        <div class="card p-0">
            <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="Event Banner">
            <div class="card-body px-3">
                <h4 class="card-title text-primary">{{ $event->eventDetails->title }}</h4>
                <p>{{ $event->eventDetails->start_date->format('d M Y') }}</p>
            </div>
        </div>
    </a>
</div>
