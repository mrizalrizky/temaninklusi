<li class="nav-item" role="presentation">
    <a
    {{-- class="nav-link active" --}}
      {{ $attributes->merge(['class' => 'nav-link btn-primary rounded-pill']) }}
      id="{{ $id }}"
      data-mdb-toggle="pill"
      href="{{ $href }}"
      role="tab"
      aria-controls="{{ $ariaControls }}"
      >{{ $label }}</a
    >
  </li>

