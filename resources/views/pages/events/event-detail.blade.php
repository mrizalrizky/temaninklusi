@extends('layouts.app')

@section('content')
    <div class="container-lg px-4 px-lg-3">
        <div class="d-flex justify-content-end gap-2 my-4">
            @if (Auth::check())
                @can('is-admin')
                    @if ($event->isWaitingApproval())
                        <div class="d-flex gap-2 my-2">
                            <button type="button" class="badge btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#approveEventModal">Approve</button>
                            <button type="button" class="badge btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#rejectEventModal">Reject</button>
                        </div>
                    @else
                        <div class="d-flex gap-2 my-2">
                            <a href="{{ route('event.edit', $event->eventDetail->slug) }}"
                                class="badge btn btn-primary">Edit</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteEventModal"
                                class="badge btn btn-danger">Delete</button>
                        </div>
                    @endif

                    @if ($event->eventProposalFile)
                        <a class="badge btn d-flex gap-1 my-2 align-items-center border rounded-custom text-primary" href="{{ Storage::disk('public')->url($event->eventProposalFile->file_path . $event->eventProposalFile->file_name) }}"
                            download>
                            <iconify-icon icon="bi:download" height="1rem"class="text-primary"></iconify-icon>
                            Download Proposal
                        </a>
                    @endif

                    <x-dialog.base-dialog id="approveEventModal"
                        action="{{ route('event.action', ['slug' => $event->eventDetail->slug, 'actionType' => 'APPROVE_EVENT']) }}"
                        title="Yakin akan approve event?" />
                    <x-dialog.base-dialog id="rejectEventModal"
                        action="{{ route('event.action', ['slug' => $event->eventDetail->slug, 'actionType' => 'REJECT_EVENT']) }}"
                        title="Yakin akan reject event?" />
                    <x-dialog.base-dialog id="deleteEventModal" action="{{ route('event.delete', $event->eventDetail->slug) }}"
                        title="Yakin akan hapus event?">
                        {{ method_field('DELETE') }}
                    </x-dialog.base-dialog>
                @endcan
            @endif
        </div>

        <div class="d-flex justify-content-center mb-5">
            <img src="{{ Storage::disk('public')->exists($event->eventBanner->file_path . $event->eventBanner->file_name) ? Storage::disk('public')->url($event->eventBanner->file_path . $event->eventBanner->file_name) : asset('assets/img/temuinklusi-asset.png') }}"
                class="img-fluid col-10 object-fit-contain rounded-4" style="max-width: 30rem; max-height: 20rem"
                alt="">
        </div>

        <section class="d-flex flex-column flex-md-row justify-content-between p-1 gap-5">
            <div class="col">
                <h3 class="text-center text-md-start mb-3">{{ $event->eventDetail['title'] }}</h3>
                <div class="d-flex align-items-start justify-content-center">
                    <div class="d-flex d-md-none justify-content-center mb-4">
                        @include('pages.events.includes.event-detail-container', $event)
                    </div>
                </div>
                <ul class="nav d-flex gap-3 mb-4 justify-content-center justify-content-md-start flex-nowrap" id="pills-tab"
                    role="tablist">
                    <x-button.pill-button class="{{ Session::get('section') != 'comment' ? 'active' : '' }}"
                        id="description-tab" dataBsTarget="#pills-description" ariaControls="description">
                        Description
                    </x-button.pill-button>
                    <x-button.pill-button id="details-tab" dataBsTarget="#pills-details" ariaControls="details">
                        Details
                    </x-button.pill-button>
                    <x-button.pill-button class="{{ Session::get('section') == 'comment' ? 'active' : '' }}"
                        id="comments-tab" dataBsTarget="#pills-comments" ariaControls="comments">
                        Comments
                    </x-button.pill-button>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade {{ Session::get('section') != 'comment' ? 'active show' : '' }}"
                        id="pills-description" role="tabpanel" aria-labelledby="description-tab">
                        @include('pages.events.includes.event-description', $event)
                    </div>
                    <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="details-tab">
                        @include('pages.events.includes.event-details', $event)
                    </div>
                    <div class="tab-pane fade {{ Session::get('section') == 'comment' ? 'active show' : '' }}"
                        id="pills-comments" role="tabpanel" aria-labelledby="comments-tab">
                        @include('pages.events.includes.event-comments', $event)
                    </div>
                </div>
            </div>

            <div class="d-none d-md-flex align-items-start justify-content-center">
                <div class="d-flex justify-content-center">
                    @include('pages.events.includes.event-detail-container', $event)
                </div>
            </div>
            @can('register-event', $event)
            <x-dialog.base-dialog id="registerEventModal"
                action="{{ route('event.action', ['actionType' => 'USER_REGISTER_EVENT', 'slug' => $event->eventDetail->slug]) }}"
                title="Yakin akan mendaftar event?" />
        @endcan

        @can('cancel-register-event', $event)
            <x-dialog.base-dialog id="cancelRegisterModal"
                action="{{ route('event.action', ['actionType' => 'USER_CANCEL_REGISTER_EVENT', 'slug' => $event->eventDetail->slug]) }}"
                title="Yakin akan batal registrasi event?" />
        @endcan
        </section>
    </div>


@endsection
