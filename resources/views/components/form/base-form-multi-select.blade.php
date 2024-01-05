<div class="dropdown">
    <button class="form-control py-2 dropdown-toggle" type="button" name="{{ $name }}[]" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
    {{ $placeholder }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($options as $option)
        <li>
            <a class="dropdown-item">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $option->id }}" name="{{ $name }}[]" id="{{ $id }}" {!! $selectedValues ? (in_array($option->id, $selectedValues) ? 'checked' : '') : null !!}  />
                    <label class="form-check-label" for="{{ $id }}">{{ $option->label}}</label>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

