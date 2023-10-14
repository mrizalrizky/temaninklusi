<div class="form-group pb-2">
    <label class="text-primary fw-bold" for="{{ $name }}">{{$label}}</label>
    <input class="form-control rounded-3 @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" />
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
