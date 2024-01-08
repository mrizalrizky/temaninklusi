<label for="{{ $name }}" class="d-block btn btn-secondary d-flex gap-2 align-items-center text-primary" style="width: fit-content">
    <input type="file" name="{{ $name }}" id="{{ $name }}" accept="{{ $accept }}" style="display:none;" onchange="setFilePreview(event,'{{$name}}')">
    <iconify-icon icon="bi:upload" height="1rem" class="text-primary"></iconify-icon>
    <small class="text-primary">Upload file</small>
</label>

<div id="{{ $name }}-fileDetail" style="display: none">
    <label for="{{ $name }}-file_preview" class="d-flex gap-2" >
        <iconify-icon icon="tabler:pdf" height="2rem" class="text-danger"></iconify-icon>
        <small class="align-self-center">
            <span id="{{ $name }}-fileName"></span>
        </small>
    </label>
    <a class="text-primary ps-4" id="{{ $name }}-downloadBtn" style="display: none" download>
        <small class="fw-bold ps-3">Download file</small>
    </a>
</div>


@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

@push('after-script')
<script>
    const setFilePreview = (event, id) => {
        const fileName = event.target.files[0].name;
        document.getElementById(`${id}-fileName`).textContent = fileName;
        document.getElementById(`${id}-fileDetail`).style.display = 'block';
        document.getElementById(`${id}-downloadBtn`).style.display = 'block';

        const downloadLink = document.getElementById(`${id}-downloadBtn`);
        downloadLink.href = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endpush
