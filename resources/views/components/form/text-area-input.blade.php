<form action="{{ $action }}" method="POST">
    @csrf
    <div class="d-flex border border-1 rounded-4 w-100">
        <textarea class="form-control border-0" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"></textarea>
        {{ $slot }}
        <span class="input-group-text bg-transparent border-0">
            <button class="bg-transparent border-0" type="submit" {{ $disabled }}>
                <iconify-icon icon="iconamoon:send-fill" height="1.5em" class="text-primary"/>
            </button>
        </span>
    </div>
</form>
