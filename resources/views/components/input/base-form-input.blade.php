@props([
    'type' => 'text',
    'placeholder' => '',
])

<div class="form-group">
    <input type="{{ $type }}" class="form-control" {{ $attributes->merge(['class']) }} id="{{ $name }}" aria-describedby="emailHelp" placeholder="{{ $placeholder }}" name="{{ $name }}">
</div>
