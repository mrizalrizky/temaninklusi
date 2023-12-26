<select class="form-select form-select-md" aria-label=".form-select-md">
    <option selected disabled>{{ $placeholder }}</option>
    @foreach ($options as $option)
        <option value="{{ $option }}">{{ $option->label }}</option>
    @endforeach
</select>
