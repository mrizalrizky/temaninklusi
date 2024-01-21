<li class="d-flex align-items-center gap-3" style="width: fit-content">
    @if ($icon)
    <iconify-icon icon="{{ $icon }}" height="1.5rem" class="text-primary"></iconify-icon>
    @endif
    {{ $slot }}
    {{-- <small class="m-0 fw-bold" >{{ $slot }}</small> --}}
</li>
