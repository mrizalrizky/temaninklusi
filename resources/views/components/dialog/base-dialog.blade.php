{{-- Confirmation Modal --}}
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> --}}
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ $rejectTitle }}"></button>
        </div>
        <div class="modal-body">
            {{ $title }}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $rejectTitle }}</button>

            <form action="{{ $action }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">{{ $submitTitle }}</button>
            </form>

        </div>
        </div>
    </div>
</div>
