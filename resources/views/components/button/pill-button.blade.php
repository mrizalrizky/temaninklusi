<li class="nav-item" role="presentation">
    <button {{ $attributes->merge(['class' => ' btn btn-sm btn-primary rounded-pill py-2 px-4']) }} id="{{ $id }}" data-bs-toggle="tab" data-bs-target="{{ $dataBsTarget }}" type="button" role="tab" aria-controls="{{ $ariaControls }}" aria-selected="true">
        {{ $slot }}
    </button>
</li>
