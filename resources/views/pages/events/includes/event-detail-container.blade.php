<div class="border rounded-4 p-custom-2 p-md-5 d-grid gap-3" style="max-width: 25rem">
    <div class="d-flex justify-content-center justify-content-md-start align-items-center gap-3">
        <x-tag.organizer-tag class="custom-tag" :organizer="$event->organizer">
            <div class="d-flex gap-1 align-items-center">
                <iconify-icon icon="material-symbols:verified" height="1rem" class="text-primary"></iconify-icon>
                <p class="m-0 fw-bold" style="font-size: 0.75rem">Verified organizer</p>
            </div>
        </x-tag.organizer-tag>
    </div>

    <ul class="d-grid gap-3 p-0 justify-content-center justify-content-md-start">
        <x-listitem.event-list-item icon="iconamoon:category-fill">
            {{ $event->eventCategory->label ?? '-' }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="mdi:location">
            {{ $event->eventDetail->location ??'-' }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="ph:calendar-fill">
            {{ $event->eventDetail->start_date->format('d M Y') ?? '-' }} -
            {{ $event->eventDetail->end_date->format('d M Y') ?? '-'}}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="ph:clock-fill">
            {{ $event->eventDetail->start_date->format('H.i') ?? '-'}} - {{ $event->eventDetail->end_date->format('H.i') ?? '-' }} WIB
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="ph:calendar-x-fill">
            {{ $event->eventDetail->max_register_date->format('d M Y') ?? '-' }}
        </x-listitem.event-list-item>
        <x-listitem.event-list-item icon="bi:people-fill">
            @if (count($event->registeredByUsers) < $event->eventDetail->quota)
                {{ count($event->registeredByUsers) ?? '-' }} / {{ $event->eventDetail->quota ?? '-'}} Peserta
            @else
                <small>Kuota sudah penuh</small>
            @endif
        </x-listitem.event-list-item>
    </ul>

    <span class="d-flex justify-content-center align-items-center flex-column gap-3 w-full">
        @if (!Auth::check())
            <a class="btn btn-sm btn-primary rounded-pill w-full py-2" href="{{ route('login') }}">Daftar Sekarang</a>
        @endif
        @can('register-event', $event)
        @if (count($event->registeredByUsers) < $event->eventDetail->quota)
            <button type="button" class="btn btn-sm rounded-pill py-2 btn-primary" style="max-width: 18rem"
                    data-bs-toggle="modal" data-bs-target="#registerEventModal">
                Daftar Sekarang
            </button>
        @else
            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-title="Kuota sudah penuh! Silahkan pilih event lain">
                <button type="button" class="btn btn-sm border-0 rounded-pill py-2 btn-disabled pe-none" style="max-width: 18rem" disabled>
                    Daftar Sekarang
                </button>
            </span>
        @endif
            <x-dialog.base-dialog id="registerEventModal"
                action="{{ route('event.action', ['actionType' => 'USER_REGISTER_EVENT', 'slug' => $event->eventDetail->slug]) }}"
                title="Yakin akan mendaftar event?" />
        @endcan

        @can('cancel-register-event', $event)
            <button type="button" class="btn btn-sm btn-danger rounded-pill py-2" style="max-width: 18rem" data-bs-toggle="modal"
                    data-bs-target="#cancelRegisterModal">
                Cancel
            </button>
            <x-dialog.base-dialog id="cancelRegisterModal"
                action="{{ route('event.action', ['actionType' => 'USER_CANCEL_REGISTER_EVENT', 'slug' => $event->eventDetail->slug]) }}"
                title="Yakin akan batal registrasi event?" />
        @endcan
    </span>
</div>


@push('after-script')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@endpush
