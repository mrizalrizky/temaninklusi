<div class="d-flex">
    <div class="text-center rounded-3 bg-dark text-white fw-bold" style="width: 2.5rem; height: 2.5rem; line-height: 2.5rem">
        <p class="m-0">{{ $organizer->initial }}</p>
    </div>
    <div class="ms-2 align-self-center">
        <p class="m-0 fw-bold fs-6">{{ $organizer->name }}</p>
        {{ $slot }}
    </div>
</div>
