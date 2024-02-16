@extends('layouts.app')
@section('content')
    <div class="container-lg px-4 px-lg-3 mt-4">
        <h5 class="mb-4 text-dark">Manage Event</h5>
        <section class="table-responsive mb-5">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center" style="width: 36%"><small>Nama Event</small></th>
                        <th class="text-center" style="width: 17%"><small>Organizer Name</small></th>
                        <th class="text-center" style="width: 17%"><small>Organizer Email</small></th>
                        <th class="text-center" style="width: 10%"><small>Proposal</small></th>
                        <th class="text-center" style="width: 10%"><small>License</small></th>
                        <th class="text-center" style="width: 10%"><small>Action</small></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="text-center">
                                <small class="fw-normal text-secondary mb-1">{{ $event->eventDetail->title }}</small>
                            </td>
                            <td class="text-center">
                                <small class="fw-normal text-secondary mb-1">{{ $event->organizer->name }}</small>
                            </td>
                            <td class="text-center">
                                <small class="fw-normal text-secondary mb-1">{{ $event->organizer->user->email }}</small>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center" style="height: 100%">
                                    @if ($event->eventProposalFile)
                                        <a href="{{ Storage::disk('public')->url($event->eventProposalFile->file_path . $event->eventProposalFile->file_name) }}"
                                            download>
                                            <button class="d-flex h-100 btn btn-secondary text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                </svg>
                                            </button>
                                        </a>
                                    @else
                                        <small class="fw-normal text-secondary mb-1">-</small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center" style="height: 100%">
                                    @if ($event->eventLicenseFile)
                                    <a href="{{ Storage::disk('public')->url($event->eventLicenseFile->file_path . $event->eventLicenseFile->file_name) }}" download>
                                        <button class="d-flex h-100 btn btn-secondary text-dark" >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                <path
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                            </svg>
                                        </button>
                                    </a>
                                @else
                                    <small class="fw-normal text-secondary mb-1">-</small>
                                @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('event.details', $event->eventDetail->slug) }}"
                                    class="badge btn btn-secondary">Detail</a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>
    </div>
@endsection
