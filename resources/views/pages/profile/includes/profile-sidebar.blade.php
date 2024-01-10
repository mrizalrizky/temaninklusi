<div class="col-12 col-md-5 col-lg-4 col-xl-3">
    <div class="d-flex gap-3 flex-column align-items-center justify-content-center border border-1 rounded-4 p-4">
        <div class="mb-3 d-none d-md-flex gap-2 flex-column align-items-center">
            <x-icon.profile-icon height="3rem"/>
            <h6 class="m-0">{{ $user->name }}</h6>
            <small style="font-size: .8rem" class="text-primary">{{ $user->role->type }}</small>
        </div>
        <div class="px-4 py-md-2 mb-md-4 d-flex justify-center col-md-12">
            <div style="list-style-type: none" class="d-flex gap-3 p-0 flex-row flex-md-column col-md-12">
                <x-listitem.profile-list-item label="Profile" icon="bi:person-fill" href="profile.index"/>
                @can('has-events')
                <x-listitem.profile-list-item label="Events" icon="bi:calendar-event-fill" href="profile.events"/>
                @endcan
            </div>
        </div>

            <button type="button" class="border-0 bg-transparent fw-bold text-danger" data-bs-toggle="modal"
                    data-bs-target="#logoutModal">
                Log out
            </button>

        <x-dialog.base-dialog id="logoutModal" action="{{ route('logout') }}" title="Yakin akan logout akun?" />

    </div>
</div>
