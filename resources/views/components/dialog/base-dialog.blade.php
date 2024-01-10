<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border rounded-4">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closePopupModal('{{$id}}')" aria-label="{{ $rejectTitle }}"></button>
            </div>
            <div class="modal-body fw-bold text-primary">
                {{ $title }}
            </div>
            <div class="modal-footer">
                <button type="button" class="badge btn btn-outline-primary" data-bs-dismiss="modal" onclick="closePopupModal('{{$id}}')">{{ $rejectTitle }}</button>

                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method($method)
                    <button type="submit" class="badge btn btn-primary">{{ $submitTitle }}</button>
                    {{ $slot }}
                </form>
            </div>
        </div>
    </div>
</div>

@push('after-script')
    <script>
        const closePopupModal = (id) => {
            const popupModal = document.getElementById(`${id}`)
            popupModal.style.removeProperty('display')
            document.body.removeChild(document.getElementById('modal_backdrop'))
        }
    </script>
@endpush
