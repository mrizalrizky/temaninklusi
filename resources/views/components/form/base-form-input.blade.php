<div {{ $attributes->merge(['class' => 'form-group']) }}>

    @if ($label)
    <label for="{{ $name }}" class="text-primary fw-bold mb-2">{{ $name }}</label>
    @endif
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'form-control py-2']) }} id="{{ $name }}" aria-describedby="emailHelp"
            placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">

    {{ $slot }}
</div>
