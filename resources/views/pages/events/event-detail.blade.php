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

                    @if($event->eventProposalFile)
                    <button type="submit"
                        class="text-dark badge btn btn-secondary d-flex gap-2 my-2 align-items-center"
                        style="background-color: rgb(125 211 252);">
                        <a href="{{ Storage::disk('public')->url($event->eventProposalFile->file_path . $event->eventProposalFile->file_name) }}"
                            download>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-download" viewBox="0 0 16 16">
                            <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path
                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                        </svg>
                        Download Proposal
                        </a>
                    </button>
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
                    <x-button.pill-button class="{{Session::get('section') != 'comment' ? 'active' : ''}}" id="description-tab" dataBsTarget="#pills-description"
                        ariaControls="description">
                        Description
                    </x-button.pill-button>
                    <x-button.pill-button id="details-tab" dataBsTarget="#pills-details" ariaControls="details">
                        Details
                    </x-button.pill-button>
                    <x-button.pill-button class="{{Session::get('section') == 'comment' ? 'active' : ''}}" id="comments-tab" dataBsTarget="#pills-comments" ariaControls="comments">
                        Comments
                    </x-button.pill-button>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade {{Session::get('section') != 'comment' ? 'active show' : ''}}" id="pills-description" role="tabpanel"
                        aria-labelledby="description-tab">
                        @include('pages.events.includes.event-description', $event)
                    </div>
                    <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="details-tab">
                        @include('pages.events.includes.event-details', $event)
                    </div>
                    <div class="tab-pane fade {{Session::get('section') == 'comment' ? 'active show' : ''}}" id="pills-comments" role="tabpanel" aria-labelledby="comments-tab">
                        @include('pages.events.includes.event-comments', $event)
                    </div>
                </div>
            </div>

            <div class="d-none d-md-flex align-items-start justify-content-center">
                <div class="d-flex justify-content-center">
                    @include('pages.events.includes.event-detail-container', $event)
                </div>
            </div>
        </section>
    </div>


@endsection
