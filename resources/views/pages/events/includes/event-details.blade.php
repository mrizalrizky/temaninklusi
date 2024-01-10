<div class="d-grid gap-5">
    <div class="d-flex flex-column gap-3">
        <div class="d-flex flex-column flex-md-row gap-3 gap-md-5">
            <div class="d-flex flex-column align-items-center align-items-md-start gap-2">
                <h5>Organizer Details</h5>
                <ul class="d-grid gap-3 p-0 ps-2 justify-content-center justify-content-md-start">
                    <x-tag.organizer-tag class="py-1 px-2" :organizer="$event->organizer"/>
                    <x-listitem.event-list-item icon="mdi:email-open">
                        {{ $event->organizer->contact_email }}
                    </x-listitem.event-list-item>
                    <x-listitem.event-list-item icon="mingcute:phone-call-fill">
                        {{ $event->organizer->contact_phone }}
                    </x-listitem.event-list-item>
                </ul>
            </div>
            <div class="d-flex flex-column align-items-center align-items-md-start gap-2">
                <div>
                    <h5 class="text-center text-md-start">Fasilitas</h5>
                    <ul>
                        @foreach ($event->eventDetail->event_facilities as $eventFacility)
                            @if ($eventFacility !== null)
                                <li>{{ $eventFacility }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center align-items-md-start gap-2">
            <h5 class="text-center text-md-start">Benefit</h5>
            <ul>
                @foreach ($event->eventDetail->event_benefits as $eventBenefit)
                    @if ($eventBenefit !== null)
                        <li>{{ $eventBenefit }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

</div>
