@extends('layouts.app')

@section('content')
<div>

    <form action="{{ route('event.update', $event->eventDetail->slug) }}" method="POST">
        @csrf
        <x-form.base-form-input class="mb-4" title="title" type="text" value="{{ $event->eventDetail->title }}"  placeholder="Janedoe" name="title" :label="true">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </x-form.base-form-input>
        <button type="submit">Edit</button>
    </form>

    @if (session()->has('edit-modal'))
        @push('after-script')
            <script>
                document.addEventListener('DOMContentLoaded', () =>  {
                    const popupModal = document.getElementById('editModal')
                    popupModal.style.display = 'block'
                    popupModal.classList.add('show')
                    const modalBackdrop = document.createElement('div')
                    modalBackdrop.setAttribute('id', 'modal_backdrop')
                    modalBackdrop.className = 'modal-backdrop fade show'
                    document.body.appendChild(modalBackdrop)

                });
            </script>
        @endpush
    @endif
    <x-dialog.base-dialog id="editModal" action="{{ route('event.update', ['slug' => $event->eventdetail->slug, 'editData' => 'save-data' ]) }}"
                          title="Yakin akan edit event?" submitTitle="Ya" rejectTitle="Tidak">

        <input type="hidden" name="editData" value="{{ json_encode(session()->get('edit-modal ')) }}" />
    </x-dialog.base-dialog>

</div>
@endsection
