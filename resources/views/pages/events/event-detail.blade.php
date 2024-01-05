@extends('layouts.app')

@section('content')
<div class="container-lg px-4 px-lg-3">
    @if (Auth::check())
    <div class="d-flex justify-content-end">
        @can('manage-event')
            @if($event->isWaitingApproval())
                <button type="submit" data-bs-toggle="modal" data-bs-target="#approveEventModal">Approve</button>
                <button type="submit" data-bs-toggle="modal" data-bs-target="#rejectEventModal">Reject</button>
            @else
                <a href="{{ route('event.edit', $event->eventDetail->slug) }}">Edit</a>
                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteEventModal">Delete</a>
            @endif
            <x-dialog.base-dialog id="approveEventModal" action="{{ route('event.action',['slug' => $event->eventDetail->slug, 'actionType' => 'APPROVE_EVENT']) }}"
                                  title="Yakin akan approve event?" />
            <x-dialog.base-dialog id="rejectEventModal" action="{{ route('event.action',['slug' => $event->eventDetail->slug, 'actionType' => 'REJECT_EVENT']) }}"
                                  title="Yakin akan reject event?" />
            <x-dialog.base-dialog id="deleteEventModal" action="{{ route('event.delete', $event->eventDetail->slug) }}"
                                  title="Yakin akan hapus event?">
                {{ method_field('DELETE') }}
            </x-dialog.base-dialog>
        @endcan
    </div>
    @endif

    <div class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div style="height: 27.5rem;" class="carousel-item active w-100 overflow-hidden border-0 rounded-4 my-5">
                <img src="{{ Storage::disk('public')->exists($event->eventBanner->file_path . $event->eventBanner->file_name) ? Storage::disk('public')->url($event->eventBanner->file_path . $event->eventBanner->file_name) : $event->eventBanner->file_path }}" class="w-100 h-100 object-fit-cover border-0 rounded" alt="...">
            </div>
        </div>
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
