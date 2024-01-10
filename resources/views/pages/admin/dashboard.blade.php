@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3 mt-4">
        <ul class="d-flex gap-3 flex-column" style="font-size: 1.1rem">
            <li class="d-flex gap-3 align-items-center">
                <iconify-icon icon="bxs:right-arrow" class="text-primary"></iconify-icon>
                <a class="fw-bold text-primary" href="{{ route('admin.manage-user') }}">Manage User</a>
            </li>
            <li class="d-flex gap-3 align-items-center">
                <iconify-icon icon="bxs:right-arrow" class="text-primary"></iconify-icon>
                <a class="fw-bold text-primary" href="{{ route('admin.manage-event') }}">Manage Event</a>
            </li>
        </ul>
    </div>
@endsection
