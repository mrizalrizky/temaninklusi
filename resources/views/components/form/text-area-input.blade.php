<form action="{{ $action }}" method="POST">
    @csrf
    <div class="d-flex border border-1 rounded-4 w-100">
        <textarea class="form-control border-0" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" id="{{ $id }}" oninput="handleSubmitBtn(event, '{{$id}}')"></textarea>
        {{ $slot }}
        <span class="input-group-text bg-transparent border-0">
            <button id="submitButton-{{ $id }}" class="bg-transparent border-0" type="submit" disabled >
                <iconify-icon icon="iconamoon:send-fill" height="1.5em" id="submitIcon-{{ $id }}"/>
            </button>
        </span>
    </div>
</form>

@push('after-script')
    <script>
        const handleSubmitBtn = (event, id) => {
            const inputVal = event.target.value.trim()
            const submitBtn = document.getElementById(`submitButton-${id}`)
            const submitIcon = document.getElementById(`submitIcon-${id}`)
            if(/^\s*$/.test(inputVal)) {
                submitBtn.disabled = true
                submitIcon.classList.remove('text-primary')
            } else {
                submitBtn.disabled = false;
                submitIcon.classList.add('text-primary')
            }
        }
    </script>
@endpush
