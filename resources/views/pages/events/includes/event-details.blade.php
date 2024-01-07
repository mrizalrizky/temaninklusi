<div class="d-grid gap-5">
    <div class="d-flex flex-column gap-3">
        <div class="d-flex flex-column flex-md-row gap-3 gap-md-5">
            <div class="d-flex flex-column align-items-center align-items-md-start gap-2">
                <h5>Organizer Details</h5>
                <ul class="d-grid gap-3 p-0 ps-2 justify-content-center justify-content-md-start">
                    <x-listitem.event-list-item icon="material-symbols:verified">
                        {{ $event->organizer->name }}
                    </x-listitem.event-list-item>
                    <x-listitem.event-list-item icon="mdi:email-open">
                        {{ $event->organizer->contact_email }}
                    </x-listitem.event-list-item>
                    <x-listitem.event-list-item icon="mingcute:phone-call-fill">
                        {{ $event->organizer->contact_phone }}
                    </x-listitem.event-list-item>
                </ul>
            </div>

            {{-- <div class="col"> --}}
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
        {{-- <div class="col">
            <h5>Event Details</h5>
            <ul class="d-grid gap-3 p-0 ps-2 justify-content-center justify-content-md-start">
                <x-listitem.event-list-item icon="iconamoon:category-fill">
                    {{ $event->eventCategory->label }}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="bytesize:location">
                    {{ $event->eventDetail->location }}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="fontisto:date">
                    {{ $event->eventDetail->start_date->format('d M Y') ?? '-' }} - {{ $event->eventDetail->end_date->format('d M Y') ?? '-'}}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="ph:clock-fill">
                    {{ $event->eventDetail->start_date->format('H.i') ?? '-' }} - {{ $event->eventDetail->end_date->format('H.i') ?? '-'}} WIB
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="bi:people-fill">
                    {{ $event->eventDetail->quota ?? '-'}} Peserta
                </x-listitem.event-list-item>
            </ul>
        </div> --}}
        {{-- </div> --}}
        {{-- <div class="col"> --}}
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
