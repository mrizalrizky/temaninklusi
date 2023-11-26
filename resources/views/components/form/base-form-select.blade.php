<div class="dropdown">
    <button class="form-control py-2 dropdown-toggle" type="button" id="dropdownMenuButton"
    data-mdb-toggle="dropdown" aria-expanded="false">
    {{ $placeholder }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($options as $option)
        <li>
            <a class="dropdown-item" href="#">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $option->id }}" name="{{ $name }}" id="{{ $id }}" />
                    <label class="form-check-label" for="{{ $id }}">{{ $option->name}}</label>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
