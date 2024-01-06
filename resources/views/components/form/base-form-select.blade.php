<select class="form-select form-select-lg @error($name) is-invalid @enderror" aria-label=".form-select-md" name="{{ $name }}">
    <option selected disabled>{{ $placeholder }}</option>
    @foreach ($options as $option)
        <option value="{{ $option->id }}" {!! $selectedValue == $option->id ? 'selected' : '' !!}>{{ $option->label }}</option>
    @endforeach
</select>

@error($name)
    <div class="invalid-feedback" role="alert">
        {{ $message }}
    </div>
@enderror
