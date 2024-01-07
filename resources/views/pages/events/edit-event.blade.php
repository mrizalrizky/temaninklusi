@extends('layouts.app')

@section('content')
<div class="container-md px-4 px-lg-3">
    <div class="my-5 text-center text-md-start">
        <h4 class="text-primary">Edit Event</h4>
        <h5 class="text-left m-b-custom-2 fw-normal">buat pengguna lain kembangin diri!</h5>
    </div>
    <div class="d-md-flex justify-content-center">
        <div class="col col-xl-7 border border-1 rounded-4 align-items-center p-5">
            <form action="{{ route('event.edit.validate') }}" method="POST" id="eventForm">
                @csrf
                @if (Session::get('eventModal'))
                    @php
                        $data = Session::get('eventModal');
                    @endphp
                @else
                    @php
                        $data = null;
                    @endphp
                @endif
                <input type="hidden" name="slug" value="{{ $event->eventDetail->slug }}" >
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab">
                        @include('pages.events.includes.edit-event-information', $eventCategories)
                    </div>
                    <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @include('pages.events.includes.edit-event-detail', $disabilityCategories)
                    </div>
                    <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @include('pages.events.includes.edit-event-additional')
                    </div>
                </div>
                <div class="d-flex">
                    <button id="prevBtn" type="button"
                        class="position-relative btn btn-primary rounded-5 me-auto mt-5 d-none"
                        style="width: 2.3rem; height: 2.3rem" onclick="navigatePage('prev')">
                        <iconify-icon icon="ep:arrow-left-bold" height="1rem"
                            class="position-absolute top-50 start-50 translate-middle"></iconify-icon>
                    </button>
                    <button id="nextBtn" type="button"
                        class="position-relative btn btn-primary rounded-5 ms-auto mt-5"
                        style="width: 2.3rem; height: 2.3rem" onclick="navigatePage('next')">
                        <iconify-icon icon="ep:arrow-right-bold" height="1rem"
                            class="position-absolute top-50 start-50 translate-middle"></iconify-icon>
                    </button>
                    <button id="submitBtn" type="submit" class="btn btn-primary rounded-5 ms-auto mt-5 d-none"
                        style="width: fit-content">
                        Edit
                    </button>
                </div>
            </form>
        </div>

    </div>
    </div>
    {{-- @dd($errors) --}}
@endsection

@push('after-script')
<script>
    let currentStep = 1;

    const navigatePage = (type) => {
        if(type === 'next') {
            switch (currentStep) {
                case 1:
                    currentStep = 2
                    showStep(2)
                    break;
                case 2:
                    currentStep = 3
                    showStep(3)
                    break;
                case 3:
                    document.getElementById('eventForm').submit()
                    break;
            }
        }
        else {
            switch(currentStep) {
                case 1:
                    break;
                case 2:
                    currentStep = 1;
                    showStep(1)
                    break;
                case 3:
                    currentStep = 2
                    showStep(2)
            }
        }
    };

    const showStep = (step) => {
        const tabContent = document.getElementById('nav-tabContent');
        const tabs = tabContent.getElementsByClassName('tab-pane');

        for (let i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove('show', 'active');
        }

        const selectedStep = document.getElementById(`nav-${step}`);
        selectedStep.classList.add('show', 'active');

        switch(step) {
            case 1:
                prevBtn.classList.add('d-none')
                break;
            case 2:
                prevBtn.classList.remove('d-none')
                nextBtn.classList.remove('d-none')
                submitBtn.classList.add('d-none')
                break;
            case 3:
                nextBtn.classList.add('d-none')
                submitBtn.classList.remove('d-none')

        }

    };
</script>
@endpush
