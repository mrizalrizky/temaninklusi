@extends('layouts.app')

@section('content')
<div class="container-lg">
    @if (session()->has('success'))
    <div class="alert alert-success d-flex alert-dismissible fade show">
        <p class="m-0">{{ session()->get('success') }}</p>
        <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
            data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@enderror
    @if (Auth::check() && Auth::user()->isAdmin())
    <div class="d-flex justify-content-end">
        <button type="submit" data-bs-toggle="modal" data-bs-target="#confirmApproveModal">Approve</button>
        <button type="submit" data-bs-toggle="modal" data-bs-target="#confirmRejectModal">Reject</button>
        <a href="">Edit</a>
    </div>
    @endif

    <x-dialog.base-dialog id="confirmApproveModal" action="{{ route('event.action',['slug' => $event->eventDetails->slug, 'actionType' => 'approve']) }}"
                          title="Yakin akan approve event?" submitTitle="Ya" rejectTitle="Tidak"/>
    <x-dialog.base-dialog id="confirmRejectModal" action="{{ route('event.action',['slug' => $event->eventDetails->slug, 'actionType' => 'reject']) }}"
                          title="Yakin akan reject event?" submitTitle="Ya" rejectTitle="Tidak"/>
    <div id="carouselFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($event->eventFiles as $eventBanner)
            <div style="height: 27.5rem;" class="carousel-item active w-100 overflow-hidden border-0 rounded-4 my-5">
                <img src="{{ $eventBanner->files['file_path']}}" class="w-100 h-100 object-fit-cover border-0 rounded" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <div class="d-md-flex justify-content-between">
        <div>
            <h2 class="text-center text-md-start mb-3">{{ $event->eventDetails['title'] }}</h2>
            {{-- </div> --}}
            <ul class="nav d-flex gap-3 mb-3 justify-content-center justify-content-md-start" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-sm btn-primary rounded-pill py-2 px-4 text-white active" id="description-tab" data-bs-toggle="tab" data-bs-target="#pills-description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-sm btn-primary rounded-pill py-2 px-4 text-white" id="details-tab" data-bs-toggle="tab" data-bs-target="#pills-details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-sm btn-primary rounded-pill py-2 px-4 text-white" id="comments-tab" data-bs-toggle="tab" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="description-tab">
                    <p>{{ $event->eventDetails->description }}</p>
                </div>
                <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="details-tab">
                    <x-container.event-details :event="$event"/>
                </div>
                <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="comments-tab">
                    <x-container.event-comments :comments="$event->comments" eventId="{{ $event->id }}"/>
                </div>
              </div>
        </div>

        <div>
            <x-event-detail-container :event="$event"/>
        </div>
    </div>
</div>
@endsection
