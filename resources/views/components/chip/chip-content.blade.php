<div
    {{-- class="tab-pane fade show active" --}}
    {{ $attributes->merge(['class' => 'tab-pane fade show'])}}
    id="{{ $id }}"
    role="tabpanel"
    aria-labelledby="{{ $ariaLabelledBy }}"
>
    {{ $slot }}
</div>
