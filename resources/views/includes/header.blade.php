<nav class="navbar navbar-expand-md py-4 top-0 position-md-relative z-3 {{ request()->route()->named('index') ? 'bg-primary' : ''}}">
    <div class="container-lg px-4 px-md-3">
        <a class="navbar-brand fw-bolder" href="{{ route('index') }}">{{ config('app.name') }}</a>
        <button class="ms-auto d-md-none" type="button" data-bs-toggle="collapse" style="background: transparent; border-color: transparent !important"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i data-feather="menu" class="text-primary w-75 icon"></i>
        </button>

        <div class="collapse navbar-collapse flex-grow-0 ms-2" id="navbarSupportedContent">
            <ul class="navbar-nav gap-sm-3 mt-2 px-2">
                <x-navbar-item href="{{ route('index') }}">
                    Home
                </x-navbar-item>
                <x-navbar-item href="{{ route('event.index')}}">
                    Event
                </x-navbar-item>
                <x-navbar-item href="{{ route('blog.index') }}">
                    Blog
                </x-navbar-item>
                <x-navbar-item href="{{ route('about') }}">
                    About
                </x-navbar-item>

                <li class="nav-item mt-2">
                    <a class="btn btn-sm btn-primary d-flex justify-content-center d-md-none mb-2 rounded-pill" href="{{ route('login') }}">Login</a>
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
                <a href="{{ route('login') }}" class="btn btn-sm btn-primary d-none d-md-flex rounded-5 px-5 py-2" style="padding: 0 2.2rem">
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>
