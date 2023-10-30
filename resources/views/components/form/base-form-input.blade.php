<div class="@if ($label) mb-4 @endif">
    <div {{ $attributes->merge(['class' => 'form-group']) }}>
        @if ($label)
        <label for="{{ $name }}" class="text-primary fw-bold mb-2">{{ $title }}</label>
        @endif
        <input {{ $attributes->class(['form-control py-2', 'is-invalid' => $errors->has($name)]) }} type="{{ $type }}" id="{{ $name }}"
               placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">

        {{ $slot }}
    </div>
</div>
