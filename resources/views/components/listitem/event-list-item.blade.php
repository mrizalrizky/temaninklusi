<li class="d-flex align-items-center gap-3" style="width: fit-content">
    @dd('INI ICONNYA KENAPA?', $icon, $icon == '')
    @if ($icon != '')
    <iconify-icon icon="{{ $icon != '' ?? '' }}" height="1.5rem" class="text-primary"></iconify-icon>
    @endif
    {{ $slot }}
</li>
