@props([
    'type' => 'text',
    'placeholder' => '',
    'label' => false,
])

<div class="form-group">

    @if ($label)
    <label for="name" class="text-primary fw-bold">{{ $name }}</label>
    @endif
    <input type="{{ $type }}" class="form-control" {{ $attributes->merge(['class']) }} id="{{ $name }}" aria-describedby="emailHelp" placeholder="{{ $placeholder }}" name="{{ $name }}">
</div>
