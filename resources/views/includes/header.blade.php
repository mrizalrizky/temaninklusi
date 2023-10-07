<nav class="navbar navbar-expand-md bg-primary py-4">
    <div class="container-lg">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">MaiBoutique</a>
        <button class="ms-auto d-md-none" type="button" data-bs-toggle="collapse" style="background: transparent; border-color: transparent !important"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span data-feather="menu" class="text-primary"></span>
        </button>

        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav gap-md-4">
                <li class="nav-item"><a href="" class="nav-link text-primary fw-semibold">Home</a>
                </li>
                <li class="nav-item"><a href=""
                        class="nav-link text-primary fw-semibold">Search</a></li>

                {{-- @if (Auth::user()->role_id == 2) --}}
                    <li class="nav-item"><a href=""
                            class="nav-link text-primary fw-semibold">Cart</a></li>
                    <li class="nav-item"><a href=""
                            class="nav-link text-primary fw-semibold">History</a></li>
                {{-- @endif --}}

                <li class="nav-item"><a href=""
                        class="nav-link text-primary fw-semibold">Profile</a></li>
                <li class="nav-item mt-2">
                    {{-- @if (Auth::user()->role_id == 1) --}}
                        <a class="btn btn-sm btn-primary d-flex justify-content-center d-md-none mb-2 rounded-3"
                            href="">Add Item</a>
                    {{-- @endif --}}
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
                    <form action="}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary d-none d-md-flex rounded-5" style="padding-left: 2.2rem; padding-right: 2.2rem">
                            Login
                        </button>
                    </form>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</nav>


<nav
        class="navbar navbar-expand-lg py-5"
        style="background-color:#CCE1E2"
      >
        <div class="container">
          <a
            class="navbar-brand"
            href="/"
            style="font-size: 24px; font-weight: bold; color: #01676C"
          >
            TemuInklusi
          </a>

          {{-- Mobile desktop sandwich menu --}}
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarText"
            aria-controls="navbarText"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 list-inline mx-auto">
              <li class="list-inline-item me-5">
                <a
                  class="nav-link fw-bold"
                  aria-current="page"
                  href="#"
                  style="color: #01676C"
                >
                  Home
                </a>
              </li>
              <li class="list-inline-item me-5">
                <a
                  class="nav-link fw-bold"
                  href="#"
                  style="color: #01676C"
                >
                  Event
                </a>
              </li>
              <li class="list-inline-item me-5">
                <a
                  class="nav-link fw-bold"
                  href="#"
                  style="color: #01676C"
                >
                  Blog
                </a>
              </li>
              <li class="list-inline-item">
                <a
                  class="nav-link fw-bold"
                  href="#"
                  style="color:#01676C"
                >
                  About
                </a>
              </li>
            </ul>

            <span>
              <a
                class="btn rounded-pill px-5 text-white"
                style="background-color: #01676C"
                href="#"
                role="button"
              >
                Login
              </a>
            </span>
          </div>
        </div>
      </nav>
