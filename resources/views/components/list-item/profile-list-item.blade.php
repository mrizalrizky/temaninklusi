<li class="p-3 rounded-3 {{ request()->route()->named($href) ? 'bg-primary' : 'bg-white' }}">
    <a href="{{ route($href) }}" class="d-flex align-items-center gap-3 {{ request()->route()->named($href) ? 'text-white' : 'text-primary' }}">
        <div style="width: 1.5rem" class="d-flex align-items-center justify-content-center">
            <iconify-icon icon="{{ $icon }}" height="1.25rem" class="{{ request()->route()->named($href) ? 'text-white' : 'text-primary' }}"></iconify-icon>
        </div>
        <small class="fw-bold">{{ $label }}</small>
    </a>
</li>


