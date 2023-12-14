<div class="col-5 col-lg-4 col-xl-3">
    <div class="d-flex gap-2 flex-column align-items-center justify-content-center rounded-4 p-4"
        style="background-color: var(--secondary-color)">
        <div class="mb-3 d-flex gap-2 flex-column align-items-center">
            <img class="rounded-4 img-fluid mb-2" src="assets/profile/profile-picture.png" alt=""
                style="max-width: 3rem">
            <h6 class="m-0">{{ Auth::user()->name }}</h6>
            <small style="font-size: .8rem" class="text-primary">{{ Auth::user()->role->type }}</small>
        </div>
        <div class="px-4 py-2 mb-4">
            <ul style="list-style-type: none" class="row gap-3 p-0">
                <li class="p-2 {{ Request::is('profile') ? 'bg-white p-2 rounded-3' : '' }}">
                    <a href="{{ route('profile.index') }}" class="d-flex align-items-center gap-3 text-primary">
                        <div style="width: 1.5rem" class="d-flex align-items-center justify-content-center">
                            <iconify-icon icon="bi:person-fill" height="1.5rem" class="text-primary"></iconify-icon>
                        </div>


                        <small class="fw-bold">Profile</small>
                    </a>
                </li>
                <li class="p-2 {{ Request::is('profile/events') ? 'bg-white p-2 rounded-3' : '' }}">
                    <a href="{{ route('profile.events') }}" class="d-flex align-items-center gap-3 text-primary">
                        <div style="width: 1.5rem" class="d-flex align-items-center justify-content-center">
                            <iconify-icon icon="bi:calendar-event-fill" height="1rem" class="text-primary"></iconify-icon>
                        </div>

                        <small class="fw-bold">Events</small>
                    </a>
                </li>
            </ul>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-no-style text-danger">
                Logout?
            </button>
        </form>
    </div>
</div>
