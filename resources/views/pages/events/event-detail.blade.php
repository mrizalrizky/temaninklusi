@extends('layouts.app')

@section('content')
<div class="container-lg px-4 px-lg-3">
    @if (session()->has('success'))
        <div class="alert alert-success d-flex alert-dismissible fade show">
            <p class="m-0">{{ session()->get('success') }}</p>
            <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
                data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @enderror
    @if (session()->has('failed'))
        <div class="alert alert-danger d-flex alert-dismissible fade show">
            <i data-feather="alert-triangle"style="margin-right: 0.5em; width: 1.2em"></i>
            <p class="m-0">{{ session()->get('failed') }}</p>
            <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
                data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @enderror

    @if (Auth::check())
    <div class="d-flex justify-content-end">
        @can('manage-event')
            @if($event->isWaitingApproval())
                <button type="submit" data-bs-toggle="modal" data-bs-target="#approveEventModal">Approve</button>
                <button type="submit" data-bs-toggle="modal" data-bs-target="#rejectEventModal">Reject</button>
            @else
                <a href="{{ route('event.edit', $event->eventDetail->slug) }}">Edit</a>
                <button type="butto" data-bs-toggle="modal" data-bs-target="#deleteEventModal">Delete</a>
            @endif
        @endcan
    </div>
    @endif

    <x-dialog.base-dialog id="deleteEventModal" action="{{ route('event.delete', $event->eventDetail->slug) }}"
                          title="Yakin akan hapus event?">
        {{ method_field('DELETE') }}
    </x-dialog.base-dialog>
    <x-dialog.base-dialog id="approveEventModal" action="{{ route('event.action',['slug' => $event->eventDetail->slug, 'actionType' => 'APPROVE_EVENT']) }}"
                          title="Yakin akan approve event?" />
    <x-dialog.base-dialog id="rejectEventModal" action="{{ route('event.action',['slug' => $event->eventDetail->slug, 'actionType' => 'REJECT_EVENT']) }}"
        title="Yakin akan reject event?" />

    <div id="carouselFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div style="height: 27.5rem;" class="carousel-item active w-100 overflow-hidden border-0 rounded-4 my-5">
                <img src="{{ Storage::url($event->eventBanner->file_path) }}" class="w-100 h-100 object-fit-cover border-0 rounded" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <div class="d-md-flex justify-content-between">
        <div class="col-md-6">
            <h2 class="text-center text-md-start mb-3">{{ $event->eventDetail['title'] }}</h2>
            <ul class="nav d-flex gap-3 mb-3 justify-content-center justify-content-md-start flex-nowrap" id="pills-tab" role="tablist">
                <x-button.pill-button class="active" id="description-tab" dataBsTarget="#pills-description" ariaControls="description">
                    Description
                </x-button.pill-button>
                <x-button.pill-button id="details-tab" dataBsTarget="#pills-details" ariaControls="details">
                    Details
                </x-button.pill-button>
                <x-button.pill-button id="comments-tab" dataBsTarget="#pills-comments" ariaControls="comments">
                    Comments
                </x-button.pill-button>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="description-tab">
                    @include('pages.events.includes.event-description', $event)
                </div>
                <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="details-tab">
                    @include('pages.events.includes.event-details', $event)
                </div>
                <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="comments-tab">
                    @include('pages.events.includes.event-comments', $event)
                </div>
            </div>
        </div>

        <div>
            @include('pages.events.includes.event-detail-container', $event)
        </div>
    </div>
</div>
@endsection
