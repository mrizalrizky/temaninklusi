@extends('layouts.app')

@section('content')
    <div class="d-md-flex justify-content-center container-md px-4 px-lg-3">
        <div class="col-lg-6 border border-1 rounded-4 align-items-center p-5">
            <form action="{{ route('event.create') }}" method="POST" id="eventForm">
                @csrf
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab">
                        @include('pages.events.includes.upload-event-information', $eventCategories)
                    </div>
                    <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @include('pages.events.includes.upload-event-detail', $disabilityCategories)
                    </div>
                    <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @include('pages.events.includes.upload-event-additional')
                    </div>
                </div>
                <div class="d-flex">
                    <button id="prevBtn" type="button" class="btn btn-primary rounded-5 me-auto d-none" style="width: fit-content" onclick="navigatePage('prev')">
                        <iconify-icon icon="ep:arrow-left-bold" height="1rem" class="text-white"></iconify-icon>
                    </button>
                    <button id="nextBtn" type="button" class="btn btn-primary rounded-5 ms-auto" style="width: fit-content" onclick="navigatePage('next')">
                        <iconify-icon icon="ep:arrow-right-bold" height="1rem" class="text-white"></iconify-icon>
                    </button>
                    <button id="submitBtn" type="submit" data-bs-toggle="modal" data-bs-target="#uploadEventModal" class="btn btn-primary rounded-5 ms-auto d-none" style="width: fit-content">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
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

        const prevButton = document.getElementById('prevBtn');
        const nextButton = document.getElementById('nextBtn');
        console.log('STEP', step);
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
