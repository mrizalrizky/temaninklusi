<div class="image-thumbnail">
    <label for="{{ $name }}" style="width: 11rem; height: 11rem; background-color: #f4f4f4"
        class="d-block rounded-3 position-relative z-10" id="label-image">
        <img src="{{ $src }}" style="max-width: 11rem; max-height: 11rem;"
            class="object-fit-contain position-absolute top-50 start-50 translate-middle"
            id="thumbnail" alt="">
        <img style="max-width: 2.5rem" src="{{ asset('assets/icons/addImage.png') }}"
            class="position-absolute top-50 start-50 translate-middle" alt="">
    </label>
    <input type="file" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
           onchange="imageThumbnail()" name="{{ $name }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    @push('after-script')
        <script>
            const imageThumbnail = () => {
                thumbnail.src = URL.createObjectURL(event.target.files[0])
            }
        </script>
    @endpush
</div>
