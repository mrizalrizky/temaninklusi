<div class="form-group">
    <select name="" id="" class="form-select">
        @foreach ($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>
