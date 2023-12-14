<div class="d-grid gap-5">
    <div class="row">
        <div class="col">
            <h4>Event Details</h4>
            <ul class="d-grid gap-4 p-0 justify-content-center justify-content-md-start">
                <x-listitem.event-list-item icon="bytesize:location">
                    {{ $event->eventDetail['location'] }}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="fontisto:date">
                    {{ $event->eventDetail['start_date']->format('d M Y') }} - {{ $event->eventDetail['end_date']->format('d M Y') }}
                </x-listitem.event-list-item>
                <x-listitem.event-list-item icon="ph:clock-fill">
                    {{ $event->eventDetail['start_date']->format('H.i') }} - {{ $event->eventDetail['end_date']->format('H.i') }} WIB
                </x-listitem.event-list-item>
            </ul>
        </div>
        <div class="col">
            <h4>Fasilitas</h4>
            <ul>
                <li>Memberdayakan Komunikasi</li>
                <li>Menginspirasi Pemikiran Kritis</li>
                <li>Meningkatkan Kesadaran Emosional</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>Benefit</h4>
            <ul>
                <li>Memberdayakan Komunikasi</li>
                <li>Menginspirasi Pemikiran Kritis</li>
                <li>Meningkatkan Kesadaran Emosional</li>
            </ul>
        </div>
        <div class="col">
            <h4>Goals</h4>
            <ul>
                <li>Memberdayakan Komunikasi</li>
                <li>Menginspirasi Pemikiran Kritis</li>
                <li>Meningkatkan Kesadaran Emosional</li>
            </ul>
        </div>
    </div>
</div>
