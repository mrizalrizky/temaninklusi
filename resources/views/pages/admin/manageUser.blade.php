@extends('layouts.app')
@section('content')
    <div class="container-lg px-4 px-lg-3 mt-4">
        <h5 class="mb-4 text-dark">Manage User</h5>
        <section class="table-responsive mb-5">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center" style="width: 45%"><small>Username</small></th>
                        <th class="text-center" style="width: 25%"><small>Email</small></th>
                        <th class="text-center" style="width: 20%"><small>Role</small></th>
                        <th class="text-center" style="width: 10%"><small>Action</small></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">
                                <small class="fw-bold mb-1">{{ $user->username }}</small>
                            </td>
                            <td class="text-center">
                                <small class="fw-normal text-secondary mb-1">{{ $user->email }}</small>
                            </td>
                            <td class="text-center"><small class="badge mb-0"
                                    style="background: var(--main-color)">{{ $user->role->type }}</small>
                            </td>
                            @if ($user->ban_flag)
                            <td class="text-center">
                                <button type="button" class="badge btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#unbanUserModal-{{$user->id}}">Unban</button>

                            </td>
                            @else
                            <td class="text-center">
                                <button type="button" class="badge btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#banUserModal-{{$user->id}}">Ban</button>

                            </td>
                            @endif
                        </tr>

                        <x-dialog.base-dialog id="banUserModal-{{$user->id}}" action="{{ route('admin.banned-user', $user->id) }}"
                            title="Yakin akan ban user?">
                            {{ method_field('PUT') }}
                        </x-dialog.base-dialog>

                        <x-dialog.base-dialog id="unbanUserModal-{{$user->id}}" action="{{ route('admin.unbanned-user', $user->id) }}"
                            title="Yakin akan unban user?">
                            {{ method_field('PUT') }}
                        </x-dialog.base-dialog>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
