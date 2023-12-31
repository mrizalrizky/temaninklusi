<select class="form-select form-select-md" aria-label=".form-select-md" name="category">
    <option selected disabled>{{ $placeholder }}</option>
    @foreach ($options as $option)
        <option value="{{ $option->id }}" {!! $value == $option->label ? 'selected' : '' !!}>{{ $option->label }}</option>
    @endforeach
</select>
