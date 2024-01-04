<div class="d-grid gap-5">
    <div class="row">
        <div class="col">
            <h4>Event Details</h4>
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
        </div>
        <div class="col">
            <h4>Fasilitas</h4>
            <ul>
                @foreach ($event->eventDetail->event_facilities as $eventFacility)
                    @if ($eventFacility !== null)
                        <li>{{ $eventFacility}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col">
            <h4>Organizer Details</h4>
            <ul class="d-grid gap-3 p-0 ps-2 justify-content-center justify-content-md-start">
                <x-listitem.event-list-item icon="mdi:email-open">
                    {{ $event->organizer->name }}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="mdi:email-open">
                    {{ $event->organizer->name }}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="mingcute:phone-call-fill">
                    {{ $event->organizer->name }}
                </x-listitem.event-list-item>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>Benefit</h4>
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
