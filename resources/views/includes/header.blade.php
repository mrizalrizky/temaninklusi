<nav class="navbar navbar-expand-md bg-primary py-4 position-sticky top-0 position-md-relative z-3">
    <div class="container-lg px-4 px-md-3">
        <a class="navbar-brand fw-bolder" href="{{ route('home') }}">TemuInklusi</a>
        <button class="ms-auto d-md-none" type="button" data-bs-toggle="collapse" style="background: transparent; border-color: transparent !important"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span data-feather="menu" class="text-primary"></span>
        </button>

        <div class="collapse navbar-collapse flex-grow-0 ms-2" id="navbarSupportedContent">
            <ul class="navbar-nav gap-sm-3 mt-2 px-2">
                <li class="nav-item">
                    <a href="" class="nav-link text-primary fw-semibold">Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-primary fw-semibold">Event</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link text-primary fw-semibold">Blog</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link text-primary fw-semibold">About</a>
                </li>

                <li class="nav-item mt-2">
                    <a class="btn btn-sm btn-primary d-flex justify-content-center d-md-none mb-2 rounded-pill" href="">Login</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item">
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary d-flex justify-content-center d-md-none w-100 rounded-3">
                                Login
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>

        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <div class="ms-auto d-flex">
                {{-- @if (Auth::check()) --}}
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary d-none d-md-flex rounded-5 px-5 py-2" style="padding: 0 2.2rem">
                            Login
                        </button>
                    </form>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</nav>
