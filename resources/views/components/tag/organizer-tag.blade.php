<div class="d-flex align-items-center">
    <div class="text-center rounded-3 bg-dark text-white fw-bold" style="width: 2rem; height: 2rem; line-height: 2rem">
        <small class="m-0">{{ $organizer->initial }}</small>
    </div>
    <div class="ms-2 align-self-center">
        <small class="m-0 fw-bold">{{ $organizer->name }}</small>
        {{ $slot }}
    </div>
</div>
