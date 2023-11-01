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
                    <input class="form-check-input" type="checkbox" value="{{ $option->id }}" id="Checkme1" />
                    <label class="form-check-label" for="Checkme1">{{ $option->name}}</label>
                </div>
            </a>
        </li>
        @endforeach
        <!-- <li><hr class="dropdown-divider" /></li>
        <li>
            <a class="dropdown-item" href="#">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Checkme4" checked />
                    <label class="form-check-label" for="Checkme4">Check me</label>
                </div>
            </a>
        </li> -->
    </ul>
</div>