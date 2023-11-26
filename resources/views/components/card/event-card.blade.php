<div class="col-12 col-md-4">
    <a href="{{ route('event.index') }}/{{ $event->eventDetails->slug }}">
        <div class="card p-0">
            <img src="{{ asset('assets/img/cardimg.png') }}" class="card-img-top img-fluid" alt="Event Banner">
            <div class="card-body px-3">
                <h4 class="card-title text-primary">{{ $event->eventDetails->title }}</h4>
                <p>{{ $event->eventDetails->start_date->format('d M Y') }}</p>

                <div class="">
                    <div style="width: fit-content" class="p-2 bg-dark rounded-3 align-self-center align-items-center align-content-center">
                        <p class="text-white" >{{ $event->organizer->initial }}</p>
                    </div>
                    {{-- <div>
                        <p>{{ $event->organizer->name }}</p>
                    </div> --}}
                </div>

                {{-- <div class="d-flex gap-2">
                    <div class="p-2 rounded-3 bg-dark">
                        <h5 class="text-white mb-0">{{ $event->organizer->initial }}</h5>
                    </div>
                    <div class="bg-warning d-flex justify-content-center">
                        <p class="text-dark fw-bold">{{ $event->organizer->name }}</p>
                    </div>
                </div> --}}

            </div>
        </div>
    </a>
</div>
