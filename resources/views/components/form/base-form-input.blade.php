<div {{ $attributes->merge(['class' => $label ? 'form-group mb-4' : 'form-group']) }} id="{{ $id }}">
    @if ($label)
    <label for="{{ $name }}" class="text-primary fw-bold mb-2">{{ $title }}</label>
    @endif
    <input {{ $attributes->class(['form-control py-2', 'is-invalid' => $errors->has($name)]) }} type="{{ $type }}"
            placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">
    {{ $slot }}
</div>
