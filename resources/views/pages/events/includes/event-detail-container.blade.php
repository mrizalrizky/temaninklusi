
<div class="border rounded-4 p-5 d-grid gap-5">
    <div class="d-flex justify-content-center justify-content-md-start align-items-center gap-3">
        <x-tag.organizer-tag :organizer="$event->organizer">
            <div class="d-flex gap-1 align-items-center">
                <iconify-icon icon="material-symbols:verified" height="1rem" class="text-primary"></iconify-icon>
                <p class="m-0 fw-bold" style="font-size: 0.75rem">Verified organizer</p>
            </div>
        </x-tag.organizer-tag>
    </div>

    <ul class="d-grid gap-4 p-0 justify-content-center justify-content-md-start">
        <x-listitem.event-list-item icon="bytesize:location">
            {{ $event->eventDetail->location }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="fontisto:date">
            {{ $event->eventDetail->start_date->format('d M Y') }} - {{ $event->eventDetail->end_date->format('d M Y') }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="ph:clock-fill">
            {{ $event->eventDetail->start_date->format('H.i') }} - {{ $event->eventDetail->end_date->format('H.i') }} WIB
        </x-listitem.event-list-item>
    </ul>

    <span class="d-flex justify-content-center">
        @if (!Auth::check())
            <a class="btn btn-sm btn-primary rounded-pill w-full py-2" href="{{ route('login') }}">
                Daftar Sekarang
            </a>
        @endif
        @can('register-event', $event)
            <button type="button" class="btn btn-sm btn-primary rounded-pill w-full py-2" data-bs-toggle="modal" data-bs-target="#registerEventModal">
                Daftar Sekarang
            </button>
        @endcan
        @can('cancel-register-event', $event)
            <button type="button" class="btn btn-sm btn-danger rounded-pill w-full py-2" data-bs-toggle="modal" data-bs-target="#cancelRegisterModal">
                Cancel
            </button>
        @endcan
    </span>

    <x-dialog.base-dialog id="registerEventModal" action="{{ route('event.action',['actionType' => 'REGISTER_EVENT', 'slug' => $event->eventDetail->slug]) }}"
                          title="Yakin akan mendaftar event?" submitTitle="Ya" rejectTitle="Tidak"/>
    <x-dialog.base-dialog id="cancelRegisterModal" action="{{ route('event.action',['actionType' => 'REGISTER_EVENT', 'slug' => $event->eventDetail->slug]) }}"
                          title="Yakin akan batal registrasi event?" submitTitle="Ya" rejectTitle="Tidak"/>

</div>
