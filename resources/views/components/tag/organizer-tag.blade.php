<div class="d-flex align-items-center">
    <div {{ $attributes->merge(['class' => "d-flex justify-content-center text-center rounded-3 bg-dark text-white fw-bold"]) }}>
        <small class="m-0">{{ $organizer->initial }}</small>
    </div>
    <div class="ms-2 align-self-center">
        <small class="m-0 fw-bold">{{ $organizer->name }}</small>
        {{ $slot }}
    </div>
</div>
