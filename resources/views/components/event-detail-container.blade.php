
<div class="border border-1 rounded-4 p-5 d-grid gap-5">
    {{-- EO Name Section --}}
    <div class="d-flex justify-content-center justify-content-md-start align-items-center gap-3">
    {{-- <div class="d-flex align-items-center gap-3"> --}}
        <div class="p-2 rounded-3 bg-dark">
            <h4 class="text-center text-white mb-0">TU</h4>
        </div>
        <div>
            <h5 class="mb-1 text-dark fw-bold">TernakUang</h5>
            <p class="m-0" style="font-size: 0.75rem">Verified organizer</p>
        </div>
    </div>

    <ul class="d-grid gap-4 p-0 justify-content-center justify-content-md-start">
    {{-- <ul class="d-grid gap-4 p-0"> --}}
        <x-listitem.event-list-item icon="bytesize:location">
            {{ $event->eventDetails['location'] }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="fontisto:date">
            {{ $event->eventDetails['start_date']->format('d M Y') }} - {{ $event->eventDetails['end_date']->format('d M Y') }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="ph:clock-fill">
            {{ $event->eventDetails['start_date']->format('H.i') }} - {{ $event->eventDetails['end_date']->format('H.i') }} WIB
        </x-listitem.event-list-item>
    </ul>

    @if (Auth::check())
    <div class="d-flex justify-content-center">
        <button class="btn btn-sm btn-primary rounded-pill w-75 py-2" href="#">Daftar Sekarang</button>
    </div>
    @endif
</div>
